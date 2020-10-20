<?php

namespace App\Entity;

use App\Repository\SecteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SecteurRepository::class)
 */
class Secteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=AppelProjet::class, mappedBy="secteur")
     */
    private $appelProjets;

    

    public function __construct()
    {
        $this->appelProjets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|AppelProjet[]
     */
    public function getAppelProjets(): Collection
    {
        return $this->appelProjets;
    }

    public function addAppelProjet(AppelProjet $appelProjet): self
    {
        if (!$this->appelProjets->contains($appelProjet)) {
            $this->appelProjets[] = $appelProjet;
            $appelProjet->setSecteur($this);
        }

        return $this;
    }

    public function removeAppelProjet(AppelProjet $appelProjet): self
    {
        if ($this->appelProjets->contains($appelProjet)) {
            $this->appelProjets->removeElement($appelProjet);
            // set the owning side to null (unless already changed)
            if ($appelProjet->getSecteur() === $this) {
                $appelProjet->setSecteur(null);
            }
        }

        return $this;
    }

    
}
