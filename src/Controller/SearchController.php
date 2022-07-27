<?php

namespace App\Controller;

use App\Repository\ActualityRepository;
use App\Repository\ForumRepository;
use App\Repository\UserRepository;
use App\Services\GameApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class SearchController extends AbstractController
{
    /**
     * @Route("/find",name="find")
     */

    public function search(Request $request,GameApi $gameApi){
        $search = $request->query->get('search');
        $gameSearch = $gameApi->searchGames($search);
        return $this->render("find.html.twig",['games'=>$gameSearch]);
    }
}