<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Notation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private int $prix;

    #[ORM\Column(type: 'integer')]
    private int $ambiance;

    #[ORM\Column(type: 'integer')]
    private int $qualite;

    #[ORM\Column(length: 255)]
    private string $typeNotation;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'notations')]
    private User $user;

    #[ORM\ManyToOne(targetEntity: Enseigne::class, inversedBy: 'notations')]
    private Enseigne $enseigne;
}
