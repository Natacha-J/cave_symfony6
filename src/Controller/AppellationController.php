<?php

namespace App\Controller;

use App\Entity\Appellation;
use App\Form\AppellationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/references/appellation')]
class AppellationController extends AbstractController
{
    #[Route('/', name: 'appellation_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $appellations = $entityManager
            ->getRepository(Appellation::class)
            ->findAll();

        return $this->render('references/appellation/index.html.twig', [
            'appellations' => $appellations,
        ]);
    }

    #[Route('/ajouter', name: 'appellation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $appellation = new Appellation();
        $form = $this->createForm(AppellationType::class, $appellation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($appellation);
            $entityManager->flush();

            return $this->redirectToRoute('appellation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/appellation/new.html.twig', [
            'appellation' => $appellation,
            'form' => $form,
        ]);
    }

    #[Route('/{codeappellation}/modifier', name: 'appellation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Appellation $appellation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AppellationType::class, $appellation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('appellation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/appellation/edit.html.twig', [
            'appellation' => $appellation,
            'form' => $form,
        ]);
    }

    #[Route('/{codeappellation}', name: 'appellation_delete', methods: ['POST'])]
    public function delete(Request $request, Appellation $appellation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appellation->getCodeappellation(), $request->request->get('_token'))) {
            $entityManager->remove($appellation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('appellation_index', [], Response::HTTP_SEE_OTHER);
    }
}
