<?php

namespace App\Entity;

use App\Repository\AppelProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Secteur;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=AppelProjetRepository::class)
 */
class AppelProjet
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
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $end_date;

    /**
     * @ORM\OneToMany(targetEntity=CandidatureAppelProjet::class, mappedBy="appelprojet")
     */
    private $candidatureAppelProjets;

    /**
     * @ORM\ManyToOne(targetEntity=secteur::class, inversedBy="appelProjets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secteur;

    

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="appelProjets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    public function __construct()
    {
        $this->candidatureAppelProjets = new ArrayCollection();
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

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    // public function setStartDate(\DateTimeInterface $start_date): self
    // {
    //     $this->start_date = $start_date;

    //     return $this;
    // }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    // public function setEndDate(\DateTimeInterface $end_date): self
    // {
    //     $this->end_date = $end_date;

    //     return $this;
    // }

    /**
     * @return Collection|CandidatureAppelProjet[]
     */
    public function getCandidatureAppelProjets(): Collection
    {
        return $this->candidatureAppelProjets;
    }

    public function addCandidatureAppelProjet(CandidatureAppelProjet $candidatureAppelProjet): self
    {
        if (!$this->candidatureAppelProjets->contains($candidatureAppelProjet)) {
            $this->candidatureAppelProjets[] = $candidatureAppelProjet;
            $candidatureAppelProjet->setAppelprojet($this);
        }

        return $this;
    }

    public function removeCandidatureAppelProjet(CandidatureAppelProjet $candidatureAppelProjet): self
    {
        if ($this->candidatureAppelProjets->contains($candidatureAppelProjet)) {
            $this->candidatureAppelProjets->removeElement($candidatureAppelProjet);
            // set the owning side to null (unless already changed)
            if ($candidatureAppelProjet->getAppelprojet() === $this) {
                $candidatureAppelProjet->setAppelprojet(null);
            }
        }

        return $this;
    }

    public function getSecteur(): ?secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?secteur $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    // public function getActive(): ?bool
    // {
    //     return $this->active;
    // }

    // public function setActive(bool $active): self
    // {
    //     $this->active = $active;

    //     return $this;
    // }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getSlug(): ?AppelProjet
    {
        return $this->slug;
    }

    public function setSlug(AppelProjet $slug): void
    {
        $this->slug = $slug;

       
    }
}
