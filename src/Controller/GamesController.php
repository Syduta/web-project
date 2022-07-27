<?php

namespace App\Controller;
use App\Services\GameApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GamesController extends AbstractController
{
    /**
     * @Route("/game/{id}",name="game")
     */

    public function game($id, GameApi $gameApi){
        $game = $gameApi->getGame($id);
//        dd($game);
        return $this->render('front/game.html.twig',['game'=>$game]);
    }

    /**
     * @Route("/game-dlc/{id}",name="game-dlc")
     */
    public function gameDlc($id,GameApi $gameApi){
        $game = $gameApi->getGameDlc($id);
//        dd($game);
        return $this->render('front/game-dlc.html.twig',['game'=>$game['results'][0]]);
    }
}