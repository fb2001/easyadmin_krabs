<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $nom;

    #[ORM\Column(length: 255, unique: true)]
    private string $email;

    #[ORM\Column(length: 255)]
    private string $password;

    #[ORM\Column(length: 255)]
    private string $prenom;

    #[ORM\Column(type: 'integer')]
    private int $age;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numeroTelephone;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseMail;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoProfil;

    #[ORM\OneToMany(targetEntity: Notation::class, mappedBy: 'user')]
    private Collection $notations;

    #[ORM\ManyToMany(targetEntity: Enseigne::class, mappedBy: 'favoris')]
    private Collection $enseignesFavorites;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    public function __construct()
    {
        $this->notations = new ArrayCollection();
        $this->enseignesFavorites = new ArrayCollection();
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
    public function getUsername(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(?string $numeroTelephone): self
    {
        $this->numeroTelephone = $numeroTelephone;
        return $this;
    }

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(?string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;
        return $this;
    }

    public function getPhotoProfil(): ?string
    {
        return $this->photoProfil;
    }

    public function setPhotoProfil(?string $photoProfil): self
    {
        $this->photoProfil = $photoProfil;
        return $this;
    }

    public function getNotations(): Collection
    {
        return $this->notations;
    }

    public function addNotation(Notation $notation): self
    {
        if (!$this->notations->contains($notation)) {
            $this->notations[] = $notation;
            $notation->setUser($this);
        }

        return $this;
    }

    public function removeNotation(Notation $notation): self
    {
        if ($this->notations->removeElement($notation)) {
            if ($notation->getUser() === $this) {
                $notation->setUser(null);
            }
        }

        return $this;
    }

    public function getEnseignesFavorites(): Collection
    {
        return $this->enseignesFavorites;
    }

    public function addEnseigneFavorite(Enseigne $enseignesFavorite): self
    {
        if (!$this->enseignesFavorites->contains($enseignesFavorite)) {
            $this->enseignesFavorites[] = $enseignesFavorite;
            $enseignesFavorite->addFavoris($this);
        }

        return $this;
    }

    public function removeEnseigneFavorite(Enseigne $enseignesFavorite): self
    {
        if ($this->enseignesFavorites->removeElement($enseignesFavorite)) {
            $enseignesFavorite->removeFavoris($this);
        }

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    // Implémentation de PasswordAuthenticatedUserInterface
   

    public function eraseCredentials():void
    {
        // Si vous stockez des données temporaires sensibles sur l'utilisateur, effacez-les ici
        // $this->plainPassword = null;
    }

    
}
