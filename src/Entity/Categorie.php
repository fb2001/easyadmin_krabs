<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $nom;

    #[ORM\ManyToMany(targetEntity: Enseigne::class, mappedBy: 'categories')]
    private Collection $enseignes;

    public function __construct()
    {
        $this->enseignes = new ArrayCollection();
    }
}
