<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Form\SubjectType;
use App\Repository\ActualityRepository;
use App\Repository\ForumRepository;
use App\Repository\SubjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    public function forum($id, ForumRepository $forumRepository, EntityManagerInterface $entityManager, Request $request, SubjectRepository $subjectRepository){
        $forum = $forumRepository->find($id);
        $subject = new Subject();
        $subject->setUser($this->getUser());
        $subject->setForum($forum);
        $form = $this->createForm(SubjectType::class, $subject);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $entityManager->persist($subject);
            $entityManager->flush();
            $this->addFlash('success','subject added');
        }
        return $this->render('front/forum.html.twig',[
            'forum'=>$forum,
            'form'=>$form->createView(),
            ]);
    }

}