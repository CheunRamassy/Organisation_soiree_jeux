<?php

namespace App\Entity;

use App\Repository\JeuxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuxRepository::class)]
#[ORM\InheritanceType("SINGLE_TABLE")]
#[ORM\DiscriminatorColumn(name: "type", type: "string")]
#[ORM\DiscriminatorMap([
    "JeuDeDuel" => JeuDeDuel::class,
    "JeuDeCarte" => JeuDeCarte::class,
    "JeuDePlateau" => JeuDePlateau::class,
    ])]
class Jeux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $regle = null;

    #[ORM\Column]
    private ?int $nbPlayers = null;

    #[ORM\OneToOne(mappedBy: 'choix', cascade: ['persist', 'remove'])]
    private ?Evenement $evenement = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getRegle(): ?string
    {
        return $this->regle;
    }

    public function setRegle(string $regle): static
    {
        $this->regle = $regle;

        return $this;
    }

    public function getNbPlayers(): ?int
    {
        return $this->nbPlayers;
    }

    public function setNbPlayers(int $nbPlayers): static
    {
        $this->nbPlayers = $nbPlayers;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): static
    {
        // unset the owning side of the relation if necessary
        if ($evenement === null && $this->evenement !== null) {
            $this->evenement->setChoix(null);
        }

        // set the owning side of the relation if necessary
        if ($evenement !== null && $evenement->getChoix() !== $this) {
            $evenement->setChoix($this);
        }

        $this->evenement = $evenement;

        return $this;
    }


}
