<?php

namespace App\Entity;

use App\Repository\JeuDeCarteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuDeCarteRepository::class)]
class JeuDeCarte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbCarte = null;

    #[ORM\Column(length: 255)]
    private ?string $nomDuJeu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbCarte(): ?int
    {
        return $this->nbCarte;
    }

    public function setNbCarte(int $nbCarte): static
    {
        $this->nbCarte = $nbCarte;

        return $this;
    }

    public function getNomDuJeu(): ?string
    {
        return $this->nomDuJeu;
    }

    public function setNomDuJeu(string $nomDuJeu): static
    {
        $this->nomDuJeu = $nomDuJeu;

        return $this;
    }
}