<?php

namespace App\Controller;

use App\Repository\JeuxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class JeuxController extends AbstractController
{
 
    #[Route('/showJeux', name: 'show_jeux', methods: ['GET'])]
    public function show(JeuxRepository $repository): Response
    {
        $Jeux = $repository->findAll();

        return $this->render('jeux/index.html.twig', [
            'Jeux' => $Jeux,
        ]);
    }

    // #[Route('/createJeux', name: 'new_jeux', methods: ['POST'])]
    // public function new(): Response
    // {

    // }

    // #[Route('/{id}/editJeux', name: 'edit_jeux', methods: ['PUT'])]
    // public function edit(): Response
    // {

    // }

    // #[Route('/{id}', name: 'delete_jeux', methods: ['POST'])]
    // public function delete(): Response
    // {


    // }
}
