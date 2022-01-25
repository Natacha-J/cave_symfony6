<?php

namespace App\Controller\referencesControllers;

use App\Entity\Millesime;
use App\Form\MillesimeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/references/millesime')]
class MillesimeController extends AbstractController
{
    #[Route('/', name: 'millesime_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $millesimes = $entityManager
            ->getRepository(Millesime::class)
            ->findAll();

        return $this->render('references/millesime/index.html.twig', [
            'millesimes' => $millesimes,
        ]);
    }

    #[Route('/ajouter', name: 'millesime_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $millesime = new Millesime();
        $form = $this->createForm(MillesimeType::class, $millesime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($millesime);
            $entityManager->flush();

            return $this->redirectToRoute('millesime_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/millesime/new.html.twig', [
            'millesime' => $millesime,
            'form' => $form,
        ]);
    }

    #[Route('/{codemillesime}/modifier', name: 'millesime_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Millesime $millesime, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MillesimeType::class, $millesime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('millesime_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/millesime/edit.html.twig', [
            'millesime' => $millesime,
            'form' => $form,
        ]);
    }

    #[Route('/{codemillesime}', name: 'millesime_delete', methods: ['POST'])]
    public function delete(Request $request, Millesime $millesime, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$millesime->getCodemillesime(), $request->request->get('_token'))) {
            $entityManager->remove($millesime);
            $entityManager->flush();
        }

        return $this->redirectToRoute('millesime_index', [], Response::HTTP_SEE_OTHER);
    }
}
