<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\AdminLiveManager;

class AdminLiveController extends AbstractController
{
    public function show()
    {
        $adminLiveManager = new AdminLiveManager();
        $tabLive = $adminLiveManager->selectAll();
        return $this->twig->render(
            'AdminLive/AdminLiveForm.html.twig',
            ['liveAll'=> $tabLive,
            'method'=>'add',
            'buttonName' => 'Nouveau',
            'title2' => 'Flux live']
        );
    }
    public function edit(int $id): string
    {
        $adminLiveManager = new AdminLiveManager();
        $live = $adminLiveManager->selectOneById($id);
        $tabLive = $adminLiveManager->selectAll();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $live['content'] = $_POST['content'];
            $adminLiveManager->update($live);
            header('Location: /adminLive/show');
        }

        return $this->twig->render(
            'AdminLive/AdminLiveForm.html.twig',
            ['liveAll'=> $tabLive,
             'values' => $live,'method'=>'edit/'.$live['id'],
             'buttonName' => 'Modifier',
            'title2' => 'Modifier flux']
        );
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminLiveManager = new AdminLiveManager();
            $addLive = ['content' => $_POST['content'],'articleDate' => $_POST['articleDate']];
            $idLive = $adminLiveManager -> insert($addLive);
            header('Location:/adminLive/show');
        }

        return $this->twig->render('AdminLive/AdminLiveForm.html.twig');
    }
    public function delete(int $id)
    {
        $adminLiveManager = new AdminLiveManager();
        $adminLiveManager->delete($id);
        header('Location:/adminLive/show');
    }
}
