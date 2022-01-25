<?php

namespace App\Controller\referencesControllers;

use App\Entity\Cepage;
use App\Form\CepageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/references/cepage')]
class CepageController extends AbstractController
{
    #[Route('/', name: 'cepage_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cepages = $entityManager
            ->getRepository(Cepage::class)
            ->findAll();

        return $this->render('references/cepage/index.html.twig', [
            'cepages' => $cepages,
        ]);
    }

    #[Route('/ajouter', name: 'cepage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cepage = new Cepage();
        $form = $this->createForm(CepageType::class, $cepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cepage);
            $entityManager->flush();

            return $this->redirectToRoute('cepage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/cepage/new.html.twig', [
            'cepage' => $cepage,
            'form' => $form,
        ]);
    }


    #[Route('/{codecepage}/modifier', name: 'cepage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cepage $cepage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CepageType::class, $cepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('cepage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('references/cepage/edit.html.twig', [
            'cepage' => $cepage,
            'form' => $form,
        ]);
    }

    #[Route('/{codecepage}', name: 'cepage_delete', methods: ['POST'])]
    public function delete(Request $request, Cepage $cepage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cepage->getCodecepage(), $request->request->get('_token'))) {
            $entityManager->remove($cepage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cepage_index', [], Response::HTTP_SEE_OTHER);
    }
}
