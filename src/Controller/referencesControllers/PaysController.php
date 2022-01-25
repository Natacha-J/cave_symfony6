<?php

namespace App\Controller\referencesControllers;

use App\Entity\Pays;
use App\Form\PaysType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/references/pays')]
class PaysController extends AbstractController
{
    #[Route('/', name: 'pays_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $pays = $entityManager
            ->getRepository(Pays::class)
            ->findAll();

        return $this->render('references/pays/index.html.twig', [
            'lesPays' => $pays,
        ]);
    }

    #[Route('/ajouter', name: 'pays_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pays = new Pays();
        $form = $this->createForm(PaysType::class, $pays);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pays);
            $entityManager->flush();

            return $this->redirectToRoute('pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/pays/new.html.twig', [
            'pays' => $pays,
            'form' => $form,
        ]);
    }

    #[Route('/{codepays}/modifier', name: 'pays_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pays $pays, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PaysType::class, $pays);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/pays/edit.html.twig', [
            'pays' => $pays,
            'form' => $form,
        ]);
    }

    #[Route('/{codepays}', name: 'pays_delete', methods: ['POST'])]
    public function delete(Request $request, Pays $pays, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pays->getCodepays(), $request->request->get('_token'))) {
            $entityManager->remove($pays);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pays_index', [], Response::HTTP_SEE_OTHER);
    }
}
