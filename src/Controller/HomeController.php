<?php

namespace App\Controller;

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

    public function home(GameApi $gameApi){

//        dd($gameApi->getGames());
        $games = $gameApi->getGames();

        return $this->render('home.html.twig',[
            'games'=>$games
        ]);
    }
}