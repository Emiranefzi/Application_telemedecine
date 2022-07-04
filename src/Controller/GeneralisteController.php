<?php

namespace App\Controller;

use App\Entity\Generaliste;
use App\Form\GeneralisteType;
use App\Repository\GeneralisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/generaliste')]
class GeneralisteController extends AbstractController
{
    #[Route('/', name: 'app_generaliste_index', methods: ['GET'])]
    public function index(GeneralisteRepository $generalisteRepository): Response
    {
        return $this->render('generaliste/index.html.twig', [
            'generalistes' => $generalisteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_generaliste_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GeneralisteRepository $generalisteRepository): Response
    {
        $generaliste = new Generaliste();
        $form = $this->createForm(GeneralisteType::class, $generaliste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $generalisteRepository->add($generaliste, true);

            return $this->redirectToRoute('app_generaliste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('generaliste/new.html.twig', [
            'generaliste' => $generaliste,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_generaliste_show', methods: ['GET'])]
    public function show(Generaliste $generaliste): Response
    {
        return $this->render('generaliste/show.html.twig', [
            'generaliste' => $generaliste,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_generaliste_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Generaliste $generaliste, GeneralisteRepository $generalisteRepository): Response
    {
        $form = $this->createForm(GeneralisteType::class, $generaliste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $generalisteRepository->add($generaliste, true);

            return $this->redirectToRoute('app_generaliste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('generaliste/edit.html.twig', [
            'generaliste' => $generaliste,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_generaliste_delete', methods: ['POST'])]
    public function delete(Request $request, Generaliste $generaliste, GeneralisteRepository $generalisteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$generaliste->getId(), $request->request->get('_token'))) {
            $generalisteRepository->remove($generaliste, true);
        }

        return $this->redirectToRoute('app_generaliste_index', [], Response::HTTP_SEE_OTHER);
    }
}
