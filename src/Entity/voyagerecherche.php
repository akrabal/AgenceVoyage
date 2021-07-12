<?php
  namespace App\Entity ;



  class voyagerecherche {

    private  $NonCompagnie ;

    private  $DateDepart ;

     public function getNonCompagnie():?string 
     {
        return $this->NonCompagnie;
     }

     public function setNonCompagnie(?string $NonCompagnie)
     {
       $this->NonCompagnie=$NonCompagnie;
       return $this;
     }
     public function getDateDepart () : ?\DateTimeInterface 
     {
        return $this->DateDepart;
     }

     public function setDateDepart (?\DateTimeInterface $DateDepart )
     {
       $this->DateDepart = $DateDepart;
       return $this ;
     }


  }