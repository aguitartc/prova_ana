<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $codi_upc;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $sigles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodiUpc(): ?string
    {
        return $this->codi_upc;
    }

    public function setCodiUpc(string $codi_upc): self
    {
        $this->codi_upc = $codi_upc;

        return $this;
    }

    public function getSigles(): ?string
    {
        return $this->sigles;
    }

    public function setSigles(string $sigles): self
    {
        $this->sigles = $sigles;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
