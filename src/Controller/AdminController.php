<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/news",name="admin-news")
     */

    public function adminNews(){
        return $this->render('admin/news.html.twig');
    }

    /**
     * @Route("/admin/new/{id}",name="admin-new")
     */

    public function adminNew($id,){
        return $this->render('admin/new.html.twig');
    }

    /**
     * @Route("/admin/games",name="admin-games")
     */

    public function adminGames(){
        return $this->render('admin/games.html.twig');
    }

    /**
     * @Route("/admin/game/{id}",name="admin-game")
     */

    public function adminGame($id){
        return $this->render('admin/game.html.twig');
    }

    /**
     * @Route("/admin/forums",name="admin-forums")
     */

    public function adminForums(){
        return $this->render('admin/forums.html.twig');
    }

    /**
     * @Route("/admin/forum/{id}",name="admin-forum")
     */

    public function adminForum($id,){
        return $this->render('admin/forum.html.twig');
    }
}