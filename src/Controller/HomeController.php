<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use App\Services\GameApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */

    public function home(GameApi $gameApi, ActualityRepository $actualityRepository){

//        dd($gameApi->getGames());
        $games = $gameApi->getGamesHome();
        $news = $actualityRepository->findAll();
        return $this->render('home.html.twig',[
            'games'=>$games,
            'news'=>$news
        ]);
    }
}