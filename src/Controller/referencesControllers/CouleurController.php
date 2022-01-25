<?php

namespace App\Controller\referencesControllers;

use App\Entity\Couleur;
use App\Form\CouleurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/references/couleur')]
class CouleurController extends AbstractController
{
    #[Route('/', name: 'couleur_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $couleurs = $entityManager
            ->getRepository(Couleur::class)
            ->findAll();

        return $this->render('references/couleur/index.html.twig', [
            'couleurs' => $couleurs,
        ]);
    }

    #[Route('/ajouter', name: 'couleur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $couleur = new Couleur();
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($couleur);
            $entityManager->flush();

            return $this->redirectToRoute('couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/couleur/new.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{codecouleur}/modifier', name: 'couleur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Couleur $couleur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/couleur/edit.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{codecouleur}', name: 'couleur_delete', methods: ['POST'])]
    public function delete(Request $request, Couleur $couleur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$couleur->getCodecouleur(), $request->request->get('_token'))) {
            $entityManager->remove($couleur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('couleur_index', [], Response::HTTP_SEE_OTHER);
    }
}
