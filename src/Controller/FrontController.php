<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use App\Repository\ForumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/news",name="news")
     */

    public function news(ActualityRepository $actualityRepository){
        $news = $actualityRepository->findAll();
        return $this->render('front/news.html.twig',['news'=>$news]);
    }

    /**
     * @Route("/new/{id}",name="new")
     */

    public function new($id, ActualityRepository $actualityRepository){
        $new = $actualityRepository->find($id);
        return $this->render('front/new.html.twig',['new'=>$new]);
    }

    /**
     * @Route("/forums",name="forums")
     */

    public function forums(ForumRepository $forumRepository){
        $forums = $forumRepository->findAll();
        return $this->render('front/forums.html.twig',['forums'=>$forums]);
    }

    /**
     * @Route("/forum/{id}",name="forum")
     */

    public function forum($id, ForumRepository $forumRepository){
        $forum = $forumRepository->find($id);
        return $this->render('front/forum.html.twig',['forum'=>$forum]);
    }
}