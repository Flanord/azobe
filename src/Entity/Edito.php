<?php

namespace App\Entity;

use App\Repository\EditoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditoRepository::class)
 */
class Edito
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=ImageEdito::class, mappedBy="edito", orphanRemoval=true, cascade={"persist"})
     */
    private $imageEditos;

    public function __construct()
    {
        $this->imageEditos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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
     * @return Collection|ImageEdito[]
     */
    public function getImageEditos(): Collection
    {
        return $this->imageEditos;
    }

    public function addImageEdito(ImageEdito $imageEdito): self
    {
        if (!$this->imageEditos->contains($imageEdito)) {
            $this->imageEditos[] = $imageEdito;
            $imageEdito->setEdito($this);
        }

        return $this;
    }

    public function removeImageEdito(ImageEdito $imageEdito): self
    {
        if ($this->imageEditos->removeElement($imageEdito)) {
            // set the owning side to null (unless already changed)
            if ($imageEdito->getEdito() === $this) {
                $imageEdito->setEdito(null);
            }
        }

        return $this;
    }
}
