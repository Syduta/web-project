<?php

namespace App\Controller;

use App\Entity\Actuality;
use App\Entity\Forum;
use App\Entity\User;
use App\Form\ActualityType;
use App\Form\ForumType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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

    public function adminNew($id){
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

    /**
     * @Route("/admin/new-actu",name="admin-new_actu")
     */

    public function newActu(EntityManagerInterface $entityManager, Request $request, SluggerInterface $slugger){
        $actu = new Actuality();
        $actu->setUser($this->getUser());
        $form = $this->createForm(ActualityType::class, $actu);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $entityManager->persist($actu);
            $entityManager->flush();
            $this->addFlash('success','news added');
        }
        return $this->render("/admin/new-actu.html.twig",
        ['form'=>$form->createView()]);
    }

    /**
     * @Route("/admin/new-forum",name="admin-new-forum")
     */

    public function newForum(EntityManagerInterface $entityManager, Request $request, SluggerInterface $slugger){
        $forum = new Forum();
        $forum->setUser($this->getUser());
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $entityManager->persist($forum);
            $entityManager->flush();
            $this->addFlash('success','forum created');
        }
        return $this->render("/admin/new-forum.html.twig",
            ['form'=>$form->createView()]);
    }
}