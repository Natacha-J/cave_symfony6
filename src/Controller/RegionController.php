<?php

namespace App\Controller;

use App\Entity\Region;
use App\Form\RegionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/references/region')]
class RegionController extends AbstractController
{
    #[Route('/', name: 'region_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $regions = $entityManager
            ->getRepository(Region::class)
            ->findAll();

        return $this->render('references/region/index.html.twig', [
            'regions' => $regions,
        ]);
    }

    #[Route('/ajouter', name: 'region_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $region = new Region();
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($region);
            $entityManager->flush();

            return $this->redirectToRoute('region_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/region/new.html.twig', [
            'region' => $region,
            'form' => $form,
        ]);
    }

    #[Route('/{coderegion}/modifier', name: 'region_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Region $region, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RegionType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('region_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/region/edit.html.twig', [
            'region' => $region,
            'form' => $form,
        ]);
    }

    #[Route('/{coderegion}', name: 'region_delete', methods: ['POST'])]
    public function delete(Request $request, Region $region, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$region->getCoderegion(), $request->request->get('_token'))) {
            $entityManager->remove($region);
            $entityManager->flush();
        }

        return $this->redirectToRoute('region_index', [], Response::HTTP_SEE_OTHER);
    }
}
