<?php

namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReponseRepository::class)]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titre;

    #[ORM\Column(type: 'string', length: 255)]
    private $contenu;

    #[ORM\ManyToOne(targetEntity: Demande::class, inversedBy: 'reponses')]
    #[ORM\JoinColumn(nullable: false)]
    private $demande;

    #[ORM\ManyToOne(targetEntity:"App\Entity\Specialiste", inversedBy: 'reponses')]
    private $Specialiste;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDemande(): ?Demande
    {
        return $this->demande;
    }

    public function setDemande(?Demande $demande): self
    {
        $this->demande = $demande;

        return $this;
    }

    public function getSpecialiste(): ?Specialiste
    {
        return $this->Specialiste;
    }

    public function setSpecialiste(?Specialiste $Specialiste): self
    {
        $this->Specialiste = $Specialiste;

        return $this;
    }
}
