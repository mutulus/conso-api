<?php

namespace App\Model;
use Symfony\Component\Validator\Constraints as Assert;
class PersonneModel
{
    #[Assert\Length(
        min: 3,
        max: 50,
        minMessage: "Le prénom doit faire au moins 3 caractères",
        maxMessage: "Le prénom doit faire au plus 50 caractères"
    )]
    private ?string $prenom = null;
    private ?string $nom = null;

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

}