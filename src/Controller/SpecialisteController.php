<?php

namespace App\Controller;

use App\Entity\Specialiste;
use App\Form\SpecialisteType;
use App\Repository\SpecialisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/specialiste')]
class SpecialisteController extends AbstractController
{
    #[Route('/', name: 'app_specialiste_index', methods: ['GET'])]
    public function index(SpecialisteRepository $specialisteRepository): Response
    {
        return $this->render('specialiste/index.html.twig', [
            'specialistes' => $specialisteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_specialiste_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SpecialisteRepository $specialisteRepository): Response
    {
        $specialiste = new Specialiste();
        $form = $this->createForm(SpecialisteType::class, $specialiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialisteRepository->add($specialiste, true);

            return $this->redirectToRoute('app_specialiste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('specialiste/new.html.twig', [
            'specialiste' => $specialiste,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialiste_show', methods: ['GET'])]
    public function show(Specialiste $specialiste): Response
    {
        return $this->render('specialiste/show.html.twig', [
            'specialiste' => $specialiste,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_specialiste_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Specialiste $specialiste, SpecialisteRepository $specialisteRepository): Response
    {
        $form = $this->createForm(SpecialisteType::class, $specialiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialisteRepository->add($specialiste, true);

            return $this->redirectToRoute('app_specialiste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('specialiste/edit.html.twig', [
            'specialiste' => $specialiste,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_specialiste_delete', methods: ['POST'])]
    public function delete(Request $request, Specialiste $specialiste, SpecialisteRepository $specialisteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialiste->getId(), $request->request->get('_token'))) {
            $specialisteRepository->remove($specialiste, true);
        }

        return $this->redirectToRoute('app_specialiste_index', [], Response::HTTP_SEE_OTHER);
    }
}
