<?php

namespace App\Entity;

use App\Repository\LitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LitRepository::class)
 */
class Lit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class)
     */
    private $numero_chambre;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNumeroChambre(): ?Chambre
    {
        return $this->numero_chambre;
    }

    public function setNumeroChambre(?Chambre $numero_chambre): self
    {
        $this->numero_chambre = $numero_chambre;

        return $this;
    }
}
