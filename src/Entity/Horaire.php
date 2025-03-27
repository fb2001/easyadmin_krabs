<?php

namespace App\Entity;

use App\Enum\JourEnum;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', enumType: JourEnum::class)]
    private JourEnum $jour;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $heureOuverture;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $heureFermeture;

    #[ORM\ManyToOne(targetEntity: Enseigne::class, inversedBy: 'horaires')]
    #[ORM\JoinColumn(nullable: false)]
    private Enseigne $enseigne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): JourEnum
    {
        return $this->jour;
    }

    public function setJour(JourEnum $jour): self
    {
        $this->jour = $jour;
        return $this;
    }

    public function getHeureOuverture(): \DateTimeInterface
    {
        return $this->heureOuverture;
    }

    public function setHeureOuverture(\DateTimeInterface $heureOuverture): self
    {
        $this->heureOuverture = $heureOuverture;
        return $this;
    }

    public function getHeureFermeture(): \DateTimeInterface
    {
        return $this->heureFermeture;
    }

    public function setHeureFermeture(\DateTimeInterface $heureFermeture): self
    {
        $this->heureFermeture = $heureFermeture;
        return $this;
    }

    public function getEnseigne(): Enseigne
    {
        return $this->enseigne;
    }

    public function setEnseigne(Enseigne $enseigne): self
    {
        $this->enseigne = $enseigne;
        return $this;
    }
}
