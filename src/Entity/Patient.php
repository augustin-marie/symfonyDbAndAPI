<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
#[ApiResource]
class Patient
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
    private $num_secu_social;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mutuelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSecuSocial(): ?string
    {
        return $this->num_secu_social;
    }

    public function setNumSecuSocial(string $num_secu_social): self
    {
        $this->num_secu_social = $num_secu_social;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMutuelle(): ?string
    {
        return $this->mutuelle;
    }

    public function setMutuelle(string $mutuelle): self
    {
        $this->mutuelle = $mutuelle;

        return $this;
    }
}
