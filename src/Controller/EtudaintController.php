<?php

namespace App\Controller;

use App\Entity\Etudaint;
use App\Form\EtudaintType;
use App\Repository\EtudaintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etudaint')]
class EtudaintController extends AbstractController
{
    #[Route('/', name: 'app_etudaint_index', methods: ['GET'])]
    public function index(EtudaintRepository $etudaintRepository): Response
    {
        return $this->render('etudaint/index.html.twig', [
            'etudaints' => $etudaintRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etudaint_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EtudaintRepository $etudaintRepository): Response
    {
        $etudaint = new Etudaint();
        $form = $this->createForm(EtudaintType::class, $etudaint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etudaintRepository->save($etudaint, true);

            return $this->redirectToRoute('app_etudaint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etudaint/new.html.twig', [
            'etudaint' => $etudaint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudaint_show', methods: ['GET'])]
    public function show(Etudaint $etudaint): Response
    {
        return $this->render('etudaint/show.html.twig', [
            'etudaint' => $etudaint,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etudaint_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Etudaint $etudaint, EtudaintRepository $etudaintRepository): Response
    {
        $form = $this->createForm(EtudaintType::class, $etudaint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etudaintRepository->save($etudaint, true);

            return $this->redirectToRoute('app_etudaint_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etudaint/edit.html.twig', [
            'etudaint' => $etudaint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etudaint_delete', methods: ['POST'])]
    public function delete(Request $request, Etudaint $etudaint, EtudaintRepository $etudaintRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etudaint->getId(), $request->request->get('_token'))) {
            $etudaintRepository->remove($etudaint, true);
        }

        return $this->redirectToRoute('app_etudaint_index', [], Response::HTTP_SEE_OTHER);
    }
}
