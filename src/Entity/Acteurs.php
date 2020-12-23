<?php

namespace App\Entity;

use App\Repository\ActeursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActeursRepository::class)
 */
class Acteurs
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
    private $structure_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $juridical_nature;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $receipt_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $receipt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intervention_sector;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activity_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confirm_password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStructureName(): ?string
    {
        return $this->structure_name;
    }

    public function setStructureName(string $structure_name): self
    {
        $this->structure_name = $structure_name;

        return $this;
    }

    public function getJuridicalNature(): ?string
    {
        return $this->juridical_nature;
    }

    public function setJuridicalNature(string $juridical_nature): self
    {
        $this->juridical_nature = $juridical_nature;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getReceiptNumber(): ?int
    {
        return $this->receipt_number;
    }

    public function setReceiptNumber(int $receipt_number): self
    {
        $this->receipt_number = $receipt_number;

        return $this;
    }

    public function getReceipt(): ?string
    {
        return $this->receipt;
    }

    public function setReceipt(string $receipt): self
    {
        $this->receipt = $receipt;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getInterventionSector(): ?string
    {
        return $this->intervention_sector;
    }

    public function setInterventionSector(string $intervention_sector): self
    {
        $this->intervention_sector = $intervention_sector;

        return $this;
    }

    public function getActivityDescription(): ?string
    {
        return $this->activity_description;
    }

    public function setActivityDescription(string $activity_description): self
    {
        $this->activity_description = $activity_description;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->email_address;
    }

    public function setEmailAddress(string $email_address): self
    {
        $this->email_address = $email_address;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword(string $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }
}
