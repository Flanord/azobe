<?php

namespace App\Entity;

use App\Repository\ActifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActifRepository::class)
 */
class Actif
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
     * @ORM\Column(type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=ImageActif::class, mappedBy="actif", orphanRemoval=true, cascade={"persist"})
     */
    private $imageActifs;

    public function __construct()
    {
        $this->imageActifs = new ArrayCollection();
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

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|ImageActif[]
     */
    public function getImageActifs(): Collection
    {
        return $this->imageActifs;
    }

    public function addImageActif(ImageActif $imageActif): self
    {
        if (!$this->imageActifs->contains($imageActif)) {
            $this->imageActifs[] = $imageActif;
            $imageActif->setActif($this);
        }

        return $this;
    }

    public function removeImageActif(ImageActif $imageActif): self
    {
        if ($this->imageActifs->removeElement($imageActif)) {
            // set the owning side to null (unless already changed)
            if ($imageActif->getActif() === $this) {
                $imageActif->setActif(null);
            }
        }

        return $this;
    }
}
