<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idReservation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateReservation;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="Client::idClient")
     * @ORM\JoinColumn(name="Client",referencedColumnName="idClient")
     */
    private $Client ;

    /**
     * @ORM\ManyToOne(targetEntity="Voyage",inversedBy="Voyage::idVoyage")
     * @ORM\JoinColumn(name="Voyage",referencedColumnName="idVoyage")
     */
    private $Voyage ;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $StatutReservation;

    public function getId(): ?int
    {
        return $this->idReservation;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getStatutReservation(): ?string
    {
        return $this->StatutReservation;
    }

    public function setStatutReservation(string $StatutReservation): self
    {
        $this->StatutReservation = $StatutReservation;

        return $this;
    }

    public function getClient():?Client
    {
       return  $this->Client  ;
    }

    public function setClient( Client $Client)
    {
       $this->Client= $Client ;
    }
}
