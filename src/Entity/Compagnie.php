<?php

namespace App\Entity;

use App\Repository\CompagnieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompagnieRepository::class)
 */
class Compagnie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="Voyage",mappedBy="Compagnie")
     */
    private $idCompagnie;

    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomCompagnie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CoordonnesCompagnie;

    public function getId(): ?int
    {
        return $this->idCompagnie;
    }


    public function getNomcompagnie(): ?string
    {
        return $this->NomCompagnie;
    }

    public function setNomcompagnie(string $Nomcompagnie): self
    {
        $this->NomCompagnie = $Nomcompagnie;

        return $this;
    }

    public function getCoordonnesCompagnie(): ?string
    {
        return $this->CoordonnesCompagnie;
    }

    public function setCoordonnesCompagnie(string $CoordonnesCompagnie): self
    {
        $this->CoordonnesCompagnie = $CoordonnesCompagnie;

        return $this;
    }
}
