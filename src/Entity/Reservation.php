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
     * 
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="idReservation")
     */
    private $idReservation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateReservation;
    
    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="Reservation")
     * @ORM\JoinColumn(name="User",referencedColumnName="id")
     */
    private  $User ;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Voyage",inversedBy="Reservation")
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

    public function setDateReservation(?\DateTimeInterface $dateReservation): self
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

    public function getUser():?User
    {
       return  $this->User  ;
    }

    public function setUser( ?User $User)
    {
       $this->User= $User ;
    }
    public function getVoyage() :?Voyage
    {
      return $this->Voyage; 
    }

    public function setVoyage(?Voyage $voyage)
    {
         $this->Voyage= $voyage ;
    }
}
