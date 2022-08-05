<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use App\Repository\ForumRepository;
use App\Services\GameApi;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */

    public function home(GameApi $gameApi, Request $request ,ActualityRepository $actualityRepository, ForumRepository $forumRepository, PaginatorInterface $paginator){

//        dd($gameApi->getGames());
        $games = $gameApi->getGamesHome();
        $news = $actualityRepository->findAll();
        $page = $paginator->paginate(
            $news,
            $request->query->getInt('page',1),
            12
        );
        $forums = $forumRepository->findAll();
        return $this->render('home.html.twig',[
            'games'=>$games,
            'news'=>$news,
            'forums'=>$forums,
        ]);
    }
}