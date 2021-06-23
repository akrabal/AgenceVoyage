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
     * @ORM\OneToMany(targetEntity="Reservation",mappedBy="Voyage")

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
     * @ORM\ManyToOne(targetEntity="Compagnie",inversedBy="idCompagnie")
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
   

    
}
