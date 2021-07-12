<?php
 namespace App\Entity ;

class Reservationconf
{ 
    
    private $datedepart ;
    private $compagnie ;
    private $garearriver ;
    private $garedepart ;


    public function __construct(Reservation $reservation)
    {   
       $this->compagnie = $reservation->getVoyage()->getCompagnie()->getNomcompagnie();
       $this->garearriver = $reservation->getVoyage()->getGareArriver()->getLocalisationGare();
       $this->garearriver = $reservation->getVoyage()->getGareDepart()->getLocalisationGare();
       $this->datedepart = $reservation->getVoyage()->getHeuredepart();
        
    }
 
    public function getdatedepart() :\DateTimeInterface
    {
       return $this->datedepart;
      
    }

    public function setdatedepart(\DateTimeInterface $datedepart)
    {
        $this->datedepart = $datedepart ;
    }


    public function getcompagnie() :string
    {
       return $this->compagnie;
    }

    public function setcompagnie( string $compagnie)
    {
        $this->compagnie = $compagnie ;
    }

    public function getgarearriver() :string
    {
       return $this->garearriver;
    }

    public function setgarearriver( string $garearriver)
    {
        $this->garearriver = $garearriver ;
    }
    public function getgaredepart() :string
    {
       return $this->garedepart;
    }

    public function setgaredepart( string $garedepart)
    {
        $this->garedepart = $garedepart ;
    }

}