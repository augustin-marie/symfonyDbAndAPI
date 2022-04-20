<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 */
#[ApiResource]
class RendezVous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_rdv;

    /**
     * @ORM\Column(type="date")
     */
    private $Annule;

    /**
     * @ORM\ManyToOne(targetEntity=Employer::class, inversedBy="rendezVouses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_employer;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="rendezVouses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_patient;

    /**
     * @ORM\ManyToOne(targetEntity=Vaccin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $num_lot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->date_rdv;
    }

    public function setDateRdv(\DateTimeInterface $date_rdv): self
    {
        $this->date_rdv = $date_rdv;

        return $this;
    }

    public function getAnnule(): ?\DateTimeInterface
    {
        return $this->Annule;
    }

    public function setAnnule(\DateTimeInterface $Annule): self
    {
        $this->Annule = $Annule;

        return $this;
    }

    public function getIdEmployer(): ?Employer
    {
        return $this->id_employer;
    }

    public function setIdEmployer(?Employer $id_employer): self
    {
        $this->id_employer = $id_employer;

        return $this;
    }

    public function getIdPatient(): ?Patient
    {
        return $this->id_patient;
    }

    public function setIdPatient(?Patient $id_patient): self
    {
        $this->id_patient = $id_patient;

        return $this;
    }

    public function getNumLot(): ?Vaccin
    {
        return $this->num_lot;
    }

    public function setNumLot(?Vaccin $num_lot): self
    {
        $this->num_lot = $num_lot;

        return $this;
    }
}
