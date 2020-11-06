<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatureAppelProjetRepository::class)
 */
class CandidatureAppelProjet
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fiche_projet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fiche_budjet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $recepisse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proce_verbal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_site;

    /**
     * @ORM\ManyToOne(targetEntity=AppelProjet::class, inversedBy="candidatureAppelProjet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $appelProjet;


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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroTel(): ?string
    {
        return $this->numero_tel;
    }

    public function setNumeroTel(string $numero_tel): self
    {
        $this->numero_tel = $numero_tel;

        return $this;
    }

    public function getFicheProjet(): ?string
    {
        return $this->fiche_projet;
    }

    public function setFicheProjet(string $fiche_projet): self
    {
        $this->fiche_projet = $fiche_projet;

        return $this;
    }

    public function getFicheBudjet(): ?string
    {
        return $this->fiche_budjet;
    }

    public function setFicheBudjet(string $fiche_budjet): self
    {
        $this->fiche_budjet = $fiche_budjet;

        return $this;
    }

    public function getRecepisse(): ?string
    {
        return $this->recepisse;
    }

    public function setRecepisse(string $recepisse): self
    {
        $this->recepisse = $recepisse;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getProceVerbal(): ?string
    {
        return $this->proce_verbal;
    }

    public function setProceVerbal(string $proce_verbal): self
    {
        $this->proce_verbal = $proce_verbal;

        return $this;
    }

    public function getUrlSite(): ?string
    {
        return $this->url_site;
    }

    public function setUrlSite(string $url_site): self
    {
        $this->url_site = $url_site;

        return $this;
    }

    public function getAppelProjet(): ?AppelProjet
    {
        return $this->appelProjet;
    }

    public function setAppelProjet(?AppelProjet $appelProjet): self
    {
        $this->appelProjet = $appelProjet;

        return $this;
    }

   

   
}
