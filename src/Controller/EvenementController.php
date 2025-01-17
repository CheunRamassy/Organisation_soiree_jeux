<?php

namespace App\Controller;

use App\Entity\Jeux;
use App\Entity\Evenement;
use App\Form\EvenementControllerType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EvenementController extends AbstractController
{
 
    #[Route('/showEvent', name: 'show_event', methods: ['GET'])]
    public function show(EvenementRepository $repository): Response
    {
        $event = $repository->findAll();

        return $this->render('evenement/index.html.twig', [
            'events' => $event,
        ]);
    }

    #[Route('/createEvent', name: 'new_event', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Evenement();
        $form = $this->createForm(EvenementControllerType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();

            $entityManager->persist($event);
            $entityManager->flush();

            return $this->redirectToRoute('show_event');
        }

        return $this->render('evenement/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit_event', methods: ['GET', 'PUT'])]
    public function edit(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EvenementControllerType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('show_jeux', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evenement/edit.html.twig', [
            'event' => $evenement,
            'form' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'delete_event', methods: ['GET', 'POST'])]
    // public function delete(): Response
    // {


    // }

}
