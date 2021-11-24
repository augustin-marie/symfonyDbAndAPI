<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
#[ApiResource]
class Service
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
    private $nom_service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nom_service;
    }

    public function setNomService(string $nom_service): self
    {
        $this->nom_service = $nom_service;

        return $this;
    }
}
