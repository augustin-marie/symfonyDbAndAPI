<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieVaccinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieVaccinRepository::class)
 */
#[ApiResource]
class CategorieVaccin
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
    private $nom_vaccin;

    /**
     * @ORM\OneToMany(targetEntity=Vaccin::class, mappedBy="id_cat")
     */
    private $vaccins;

    public function __construct()
    {
        $this->vaccins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVaccin(): ?string
    {
        return $this->nom_vaccin;
    }

    public function setNomVaccin(string $nom_vaccin): self
    {
        $this->nom_vaccin = $nom_vaccin;

        return $this;
    }

    /**
     * @return Collection<int, Vaccin>
     */
    public function getVaccins(): Collection
    {
        return $this->vaccins;
    }

    public function addVaccin(Vaccin $vaccin): self
    {
        if (!$this->vaccins->contains($vaccin)) {
            $this->vaccins[] = $vaccin;
            $vaccin->setIdCat($this);
        }

        return $this;
    }

    public function removeVaccin(Vaccin $vaccin): self
    {
        if ($this->vaccins->removeElement($vaccin)) {
            // set the owning side to null (unless already changed)
            if ($vaccin->getIdCat() === $this) {
                $vaccin->setIdCat(null);
            }
        }

        return $this;
    }
}
