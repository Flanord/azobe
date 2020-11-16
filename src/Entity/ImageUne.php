<?php

namespace App\Entity;

use App\Repository\ImageUneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageUneRepository::class)
 */
class ImageUne
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
     * @ORM\ManyToOne(targetEntity=AlaUne::class, inversedBy="images_une", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $alaUne;

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

    public function getAlaUne(): ?AlaUne
    {
        return $this->alaUne;
    }

    public function setAlaUne(?AlaUne $alaUne): self
    {
        $this->alaUne = $alaUne;

        return $this;
    }
}
