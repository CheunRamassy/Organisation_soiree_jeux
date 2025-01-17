<?php

namespace App\Entity;

use App\Repository\JeuDePlateauRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuDePlateauRepository::class)]
class JeuDePlateau extends Jeux
{

    #[ORM\Column]
    private ?int $nbPlateau = null;

    #[ORM\Column]
    private ?int $nbPion = null;

    #[ORM\Column]
    private ?int $nbDee = null;

    public function getNbPlateau(): ?int
    {
        return $this->nbPlateau;
    }

    public function setNbPlateau(int $nbPlateau): static
    {
        $this->nbPlateau = $nbPlateau;

        return $this;
    }

    public function getNbPion(): ?int
    {
        return $this->nbPion;
    }

    public function setNbPion(int $nbPion): static
    {
        $this->nbPion = $nbPion;

        return $this;
    }

    public function getNbDee(): ?int
    {
        return $this->nbDee;
    }

    public function setNbDee(int $nbDee): static
    {
        $this->nbDee = $nbDee;

        return $this;
    }
}
