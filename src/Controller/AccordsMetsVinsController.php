<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccordsMetsVinsController extends AbstractController
{
    #[Route('/accords-mets-vins', name: 'accords_mets_vins')]
    public function index(): Response
    {
        return $this->render('accords_mets_vins/index.html.twig', [
            'controller_name' => 'AcordsMetsVinController',
        ]);
    }
}
