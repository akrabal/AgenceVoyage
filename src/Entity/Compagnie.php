<?php

namespace App\Entity;

use App\Repository\CompagnieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompagnieRepository::class)
 */
class Compagnie
{    
    public function __construct()
    {
        $this->voyage = new ArrayCollection();
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="idCompagnie")
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

    /**
     * @ORM\OneToMany(targetEntity="Voyage",mappedBy="Compagnie")
     */
    private $voyage ;

    public function getVoyages(): ?ArrayCollection
    {
      return $this->voyage;
    }

    public function setVoyages(Voyage $voyage)
    {
      $this->voyage = $voyage;
    }

    public function addVoyages(Voyage $voyage): self
    {
        if (!$this->voyages->contains($voyage)) {
            $this->voyages[] = $voyage;
            $voyage->setCompagnie($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): self
    {
        if ($this->voyages->removeElement($voyage)) {
            // set the owning side to null (unless already changed)
            if ($voyage->getCompagnie() === $this) {
                $voyage->setCompagnie(null);
            }
        }

        return $this;
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
