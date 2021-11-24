<?php

namespace App\Entity;

use App\Repository\SejourRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=SejourRepository::class)
 */
#[ApiResource]
class Sejour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_entree;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_sortie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_service;

    /**
     * @ORM\ManyToOne(targetEntity=Lit::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_lit;

    /**
     * @ORM\OneToOne(targetEntity=Patient::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $num_patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->date_entree;
    }

    public function setDateEntree(\DateTimeInterface $date_entree): self
    {
        $this->date_entree = $date_entree;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(?\DateTimeInterface $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getIdService(): ?Service
    {
        return $this->id_service;
    }

    public function setIdService(?Service $id_service): self
    {
        $this->id_service = $id_service;

        return $this;
    }

    public function getIdLit(): ?Lit
    {
        return $this->id_lit;
    }

    public function setIdLit(?Lit $id_lit): self
    {
        $this->id_lit = $id_lit;

        return $this;
    }

    public function getNumPatient(): ?Patient
    {
        return $this->num_patient;
    }

    public function setNumPatient(Patient $num_patient): self
    {
        $this->num_patient = $num_patient;

        return $this;
    }
}
