<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoyageRepository::class)
 */
class Voyage
{   
   public function __construct()
   {
     $this->Reservation = new ArrayCollection() ;
   }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="idVoyage")
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
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Compagnie",inversedBy="voyage")
     * @ORM\JoinColumn(name="Compagnie",referencedColumnName="idCompagnie")
     */
    private $Compagnie ;

    /**
     * 
     * @ORM\OneToOne(targetEntity="Gare")
     * @ORM\JoinColumn(name="GareDepart",referencedColumnName="idGare")
     */
    private $GareDepart ;

     /**
     * 
     * @ORM\OneToOne(targetEntity="Gare")
     * @ORM\JoinColumn(name="GareArriver",referencedColumnName="idGare")
     */
    private $GareArriver ;
    /**
     * * @ORM\OneToMany(targetEntity="Reservation",mappedBy="Voyage")
     */
    private $Reservation ;


     public  function getReservation():?ArrayCollection
     {
         return $this->Reservation;
     }

     public function setReservation(?Reservation $Reservation)
     {
         $this->Reservation= $Reservation;
     }

     
      public function addReservation(Reservation $Reservation): self
      {
            if (!$this->Reservations->contains($Reservation)) {
                $this->Reservations[] = $Reservation;
                $Reservation->setVoyage($this);
      }
        return $this;
     }
      
     public function removeReservation(Reservation $Reservation): self
    {
        if ($this->reservations->removeElement($Reservation)) {
            // set the owning side to null (unless already changed)
            if ($Reservation->getVoyage() === $this) {
                $Reservation->setVoyage(null);
            }
        }

        return $this;
    }
    


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
    public function getHeuredepartstr(): ?string
    {   dump( date_format($this->HeureDepart,'Y-m-d '));
        return date_format($this->HeureDepart,'Y-m-d');
        
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
    public function getGareDepart()
    {
      return $this->GareDepart;
    }

    public function setGareDepart(Gare $gareDepart)
    {
      $this->GareDepart=$gareDepart;
    }

    
    public function getGareArriver()
    {
      return $this->GareArriver;
    }

    public function setGareArriver(Gare $GareArriver)
    {
      $this->GareArriver=$GareArriver;
    }

    public function getCompagnie():?Compagnie
    {
      return $this->Compagnie;
    }
    public function setCompagnie(?compagnie $compagnie)
    {
      $this->Compagnie = $compagnie;
    }

    
}
