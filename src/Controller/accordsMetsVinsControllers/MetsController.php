<?php

namespace App\Controller\accordsMetsVinsControllers;

use App\Entity\Mets;
use App\Form\MetsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/accords-mets-vins/mets')]
class MetsController extends AbstractController
{
    #[Route('/', name: 'mets_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $mets = $entityManager
            ->getRepository(Mets::class)
            ->findAll();

        return $this->render('accords_mets_vins/mets/index.html.twig', [
            'mets' => $mets,
        ]);
    }

    #[Route('/nouveau', name: 'mets_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $met = new Mets();
        $form = $this->createForm(MetsType::class, $met);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($met);
            $entityManager->flush();

            return $this->redirectToRoute('mets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accords_mets_vins/mets/new.html.twig', [
            'met' => $met,
            'form' => $form,
        ]);
    }

    #[Route('/{codemets}', name: 'mets_show', methods: ['GET'])]
    public function show(Mets $met): Response
    {
        return $this->render('accords_mets_vins/mets/show.html.twig', [
            'met' => $met,
        ]);
    }

    #[Route('/{codemets}/modifier', name: 'mets_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Mets $met, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MetsType::class, $met);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('mets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accords_mets_vins/mets/edit.html.twig', [
            'met' => $met,
            'form' => $form,
        ]);
    }

    #[Route('/{codemets}', name: 'mets_delete', methods: ['POST'])]
    public function delete(Request $request, Mets $met, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$met->getCodemets(), $request->request->get('_token'))) {
            $entityManager->remove($met);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mets_index', [], Response::HTTP_SEE_OTHER);
    }
}
