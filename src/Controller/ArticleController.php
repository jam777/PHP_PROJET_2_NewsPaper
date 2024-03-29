<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\ArticleManager;

/**
 * Class ItemController
 *
 */
class ArticleController extends AbstractController
{


    /**
     * Display item listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();
        //var_dump($articles);
        return $this->twig->render('Home/index.html.twig', ['articles' => $articles]);
    }


    // *
    //  * Display item informations specified by $id
    //  *
    //  * @param int $id
    //  * @return string
    //  * @throws \Twig\Error\LoaderError
    //  * @throws \Twig\Error\RuntimeError
    //  * @throws \Twig\Error\SyntaxError
     
    // public function show(int $id)
    // {
    //     $itemManager = new ItemManager();
    //     $item = $itemManager->selectOneById($id);

    //     return $this->twig->render('Item/show.html.twig', ['item' => $item]);
    // }


    // /**
    //  * Display item edition page specified by $id
    //  *
    //  * @param int $id
    //  * @return string
    //  * @throws \Twig\Error\LoaderError
    //  * @throws \Twig\Error\RuntimeError
    //  * @throws \Twig\Error\SyntaxError
    //  */
    // public function edit(int $id): string
    // {
    //     $itemManager = new ItemManager();
    //     $item = $itemManager->selectOneById($id);

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $item['title'] = $_POST['title'];
    //         $itemManager->update($item);
    //     }

    //     return $this->twig->render('Item/edit.html.twig', ['item' => $item]);
    // }


    // /**
    //  * Display item creation page
    //  *
    //  * @return string
    //  * @throws \Twig\Error\LoaderError
    //  * @throws \Twig\Error\RuntimeError
    //  * @throws \Twig\Error\SyntaxError
    //  */
    // public function add()
    // {

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $itemManager = new ItemManager();
    //         $item = [
    //             'title' => $_POST['title'],
    //         ];
    //         $id = $itemManager->insert($item);
    //         header('Location:/item/show/' . $id);
    //     }

    //     return $this->twig->render('Item/add.html.twig');
    // }


    // /**
    //  * Handle item deletion
    //  *
    //  * @param int $id
    //  */
    // public function delete(int $id)
    // {
    //     $itemManager = new ItemManager();
    //     $itemManager->delete($id);
    //     header('Location:/adminArticle/index');
    // }
}
