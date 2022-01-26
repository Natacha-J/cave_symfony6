<?php

namespace App\Controller\accordsMetsVinsControllers;

use App\Entity\NiveauAccord;
use App\Form\NiveauAccordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('accords-mets-vins/niveau-accord')]
class NiveauAccordController extends AbstractController
{
    #[Route('/', name: 'niveau_accord_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $niveauAccords = $entityManager
            ->getRepository(NiveauAccord::class)
            ->findAll();

        return $this->render('accords_mets_vins/niveau_accord/index.html.twig', [
            'niveau_accords' => $niveauAccords,
        ]);
    }

    #[Route('/nouveau', name: 'niveau_accord_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $niveauAccord = new NiveauAccord();
        $form = $this->createForm(NiveauAccordType::class, $niveauAccord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($niveauAccord);
            $entityManager->flush();

            return $this->redirectToRoute('niveau_accord_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accords_mets_vins/niveau_accord/new.html.twig', [
            'niveau_accord' => $niveauAccord,
            'form' => $form,
        ]);
    }

    #[Route('/{idNiveauAccord}/modifier', name: 'niveau_accord_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NiveauAccord $niveauAccord, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NiveauAccordType::class, $niveauAccord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('niveau_accord_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accords_mets_vins/niveau_accord/edit.html.twig', [
            'niveau_accord' => $niveauAccord,
            'form' => $form,
        ]);
    }

    #[Route('/{idNiveauAccord}', name: 'niveau_accord_delete', methods: ['POST'])]
    public function delete(Request $request, NiveauAccord $niveauAccord, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$niveauAccord->getIdNiveauAccord(), $request->request->get('_token'))) {
            $entityManager->remove($niveauAccord);
            $entityManager->flush();
        }

        return $this->redirectToRoute('niveau_accord_index', [], Response::HTTP_SEE_OTHER);
    }
}
