<?php

namespace App\Controller;

use App\Entity\JeuDeCarte;
use App\Entity\JeuDeDuel;
use App\Entity\JeuDePlateau;
use App\Entity\Jeux;
use App\Form\JeuxControllerType;
use App\Repository\JeuDeCarteRepository;
use App\Repository\JeuDeDuelRepository;
use App\Repository\JeuxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class JeuxController extends AbstractController
{

    private $jeuxRepository;
    public function __construct(JeuxRepository $jeuxRepository)
    {
        $this->jeuxRepository = $jeuxRepository;
    }
 
    #[Route('/showJeux', name: 'show_jeux', methods: ['GET'])]
    public function show(
        JeuxRepository $repository, 
        // JeuDeDuelRepository $repoJeuDuel, 
        // JeuDeCarteRepository $repoJeuCarte, 
        // JeuDePlateau $repoJeuPlateau
        ): Response {
        $Jeux = $repository->findAll();

        return $this->render('jeux/index.html.twig', [
            'Jeux' => $Jeux,
        ]);
    }

    #[Route('/createJeux', name: 'new_jeux', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jeux = new Jeux();
        $form = $this->createForm(JeuxControllerType::class, $jeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();

            $entityManager->persist($jeux);
            $entityManager->flush();

            return $this->redirectToRoute('show_jeux');
        }

        return $this->render('jeux/create.html.twig', [
            'jeux' => $jeux,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/editJeux', name: 'edit_jeux', methods: ['GET', 'PUT'])]
    public function edit(Request $request, Jeux $jeux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JeuxControllerType::class, $jeux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('show_jeux', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jeux/edit.html.twig', [
            'jeux' => $jeux,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete_jeux', methods: ['GET', 'POST'])]
    public function delete(int $id, Request $request, Jeux $Jeux, EntityManagerInterface $entityManager): Response
    {
        $Jeux=$this->jeuxRepository->find($id);
        if ($this->isCsrfTokenValid('delete'.$Jeux->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($Jeux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('show_jeux', [], Response::HTTP_SEE_OTHER);
    }

}
