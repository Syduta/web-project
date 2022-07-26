<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/news",name="news")
     */

    public function news(){
        return $this->render('front/news.html.twig');
    }

    /**
     * @Route("/new/{id}",name="new")
     */

    public function new($id,){
        return $this->render('front/new.html.twig');
    }

    /**
     * @Route("/games",name="games")
     */

    public function games(){
        return $this->render('front/games.html.twig');
    }

    /**
     * @Route("/game/{id}",name="game")
     */

    public function game($id){
        return $this->render('front/game.html.twig');
    }

    /**
     * @Route("/forums",name="forums")
     */

    public function forums(){
        return $this->render('front/forums.html.twig');
    }

    /**
     * @Route("/forum/{id}",name="forum")
     */

    public function forum($id,){
        return $this->render('front/forum.html.twig');
    }
}