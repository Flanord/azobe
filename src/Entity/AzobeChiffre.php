<?php

namespace App\Entity;

use App\Repository\AzobeChiffreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AzobeChiffreRepository::class)
 */
class AzobeChiffre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $acteur_repertories;

    /**
     * @ORM\Column(type="integer")
     */
    private $action_concretises;

    /**
     * @ORM\Column(type="integer")
     */
    private $evenement_organises;

    /**
     * @ORM\Column(type="integer")
     */
    private $appele_projets;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActeurRepertories(): ?int
    {
        return $this->acteur_repertories;
    }

    public function setActeurRepertories(int $acteur_repertories): self
    {
        $this->acteur_repertories = $acteur_repertories;

        return $this;
    }

    public function getActionConcretises(): ?int
    {
        return $this->action_concretises;
    }

    public function setActionConcretises(int $action_concretises): self
    {
        $this->action_concretises = $action_concretises;

        return $this;
    }

    public function getEvenementOrganises(): ?int
    {
        return $this->evenement_organises;
    }

    public function setEvenementOrganises(int $evenement_organises): self
    {
        $this->evenement_organises = $evenement_organises;

        return $this;
    }

    public function getAppeleProjets(): ?int
    {
        return $this->appele_projets;
    }

    public function setAppeleProjets(int $appele_projets): self
    {
        $this->appele_projets = $appele_projets;

        return $this;
    }
}
