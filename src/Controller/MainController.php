<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/references', name: 'references')]
    public function references(): Response
    {
        return $this->render('main/references.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/accords-mets-vins', name: 'food_wine_pairings')]
    public function foodWinePairings(): Response
    {
        return $this->render('main/food_wine_pairings.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/stocks', name: 'inventory')]
    public function inventory(): Response
    {
        return $this->render('main/inventory.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
