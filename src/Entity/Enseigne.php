<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Enseigne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $nom;

    #[ORM\Column(length: 255)]
    private string $numeroTelephone;

    #[ORM\Column(length: 255)]
    private string $adresse;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'float')]
    private float $noteSeuil;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $pointsCle;

    #[ORM\Column(length: 255)]
    private string $gpsLocation;

    #[ORM\OneToMany(targetEntity: Horaire::class, mappedBy: 'enseigne')]
    private Collection $horaires;

    #[ORM\OneToMany(targetEntity: Notation::class, mappedBy: 'enseigne')]
    private Collection $notations;

    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'enseignes')]
    private Collection $categories;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'enseignesFavorites')]
    #[ORM\JoinTable(name: 'favoris')]
    private Collection $favoris;

    public function __construct()
    {
        $this->horaires = new ArrayCollection();
        $this->notations = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->favoris = new ArrayCollection();
    }
}
