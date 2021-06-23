<?php

namespace App\Entity;

use App\Repository\GareRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GareRepository::class)
 */
class Gare
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idGare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisationGare;
    
    /**
     * /**
     * @ORM\OneToOne(targetEntity="Ville")
     * @ORM\JoinColumn(name="Ville",referencedColumnName="idVille")
     *
     */
    private $Ville ;

    public function getId(): ?int
    {
        return $this->idGare;
    }

    public function getLocalisationGare(): ?string
    {
        return $this->localisationGare;
    }

    public function setLocalisationGare(string $localisationGare): self
    {
        $this->localisationGare = $localisationGare;

        return $this;
    }
}
