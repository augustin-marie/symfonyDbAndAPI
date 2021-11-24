<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
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
    private $numero_chambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_de_lit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroChambre(): ?int
    {
        return $this->numero_chambre;
    }

    public function setNumeroChambre(int $numero_chambre): self
    {
        $this->numero_chambre = $numero_chambre;

        return $this;
    }

    public function getNbDeLit(): ?int
    {
        return $this->nb_de_lit;
    }

    public function setNbDeLit(int $nb_de_lit): self
    {
        $this->nb_de_lit = $nb_de_lit;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

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
}
