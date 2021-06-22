<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoyageRepository::class)
 */
class Voyage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idVoyage;

    /**
     * @ORM\Column(type="datetime")
     */
    private $HeureDepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $HeureArrive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutVoyage;

    


    public function getId(): ?int
    {
        return $this->idVoyage;
    }

    public function getHeuredepart(): ?\DateTimeInterface
    {
        return $this->HeureDepart;
    }

    public function setHeuredepart(\DateTimeInterface $Heuredepart): self
    {
        $this->HeureDepart = $Heuredepart;

        return $this;
    }

    public function getHeureArrive(): ?\DateTimeInterface
    {
        return $this->HeureArrive;
    }

    public function setHeureArrive(\DateTimeInterface $HeureArrive): self
    {
        $this->HeureArrive = $HeureArrive;

        return $this;
    }

    public function getStatutVoyage(): ?string
    {
        return $this->statutVoyage;
    }

    public function setStatutVoyage(string $statutVoyage): self
    {
        $this->statutVoyage = $statutVoyage;

        return $this;
    }

   

    
}
