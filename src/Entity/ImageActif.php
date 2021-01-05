<?php

namespace App\Entity;

use App\Repository\ImageActifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageActifRepository::class)
 */
class ImageActif
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Actif::class, inversedBy="imageActifs", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $actif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getActif(): ?Actif
    {
        return $this->actif;
    }

    public function setActif(?Actif $actif): self
    {
        $this->actif = $actif;

        return $this;
    }
}
