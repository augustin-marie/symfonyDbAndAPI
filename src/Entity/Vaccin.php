<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\VaccinRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VaccinRepository::class)
 */
#[ApiResource(normalizationContext: ['groups' => ['detail_cat']])]
class Vaccin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * 
     */
    private $num_lot;

    /**
     * @ORM\Column(type="date")
     */
    private $date_peremtion;

    /**
     * @ORM\Column(type="integer")
     */
    private $taille_lot;

    /**
     * @ORM\Column(type="integer")
     */
    private $restant;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieVaccin::class, inversedBy="vaccins")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups('detail_cat')]
    private $id_cat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumLot(): ?int
    {
        return $this->num_lot;
    }

    public function setNumLot(int $num_lot): self
    {
        $this->num_lot = $num_lot;

        return $this;
    }

    public function getDatePeremtion(): ?\DateTimeInterface
    {
        return $this->date_peremtion;
    }

    public function setDatePeremtion(\DateTimeInterface $date_peremtion): self
    {
        $this->date_peremtion = $date_peremtion;

        return $this;
    }

    public function getTailleLot(): ?int
    {
        return $this->taille_lot;
    }

    public function setTailleLot(int $taille_lot): self
    {
        $this->taille_lot = $taille_lot;

        return $this;
    }

    public function getRestant(): ?int
    {
        return $this->restant;
    }

    public function setRestant(int $restant): self
    {
        $this->restant = $restant;

        return $this;
    }

    public function getIdCat(): ?CategorieVaccin
    {
        return $this->id_cat;
    }

    public function setIdCat(?CategorieVaccin $id_cat): self
    {
        $this->id_cat = $id_cat;

        return $this;
    }
}
