<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
{
      /**
     * @ORM\OneToMany(targetEntity=Gare::class, mappedBy="ville")
     */
    private $gares;

    public function __construct()
    {
        $this->gares = new ArrayCollection();
    }
      /**
     * @return Collection|Gare[]
     */
    public function getGares(): ArrayCollection
    {
        return $this->gares;
    }

    public function addGare(Gare $gare): self
    {
        if (!$this->gares->contains($gare)) {
            $this->gares[] = $gare;
            $gare->setVille($this);
        }

        return $this;
    }

    public function removeGare(Gare $gare): self
    {
        if ($this->gares->removeElement($gare)) {
            // set the owning side to null (unless already changed)
            if ($gare->getVille() === $this) {
                $gare->setVille(null);
            }
        }

        return $this;
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="idVille")
     */
    private $idVille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomVille;

    public function getId(): ?int
    {
        return $this->idVille;
    }

    public function getNomVille(): ?string
    {
        return $this->NomVille;
    }

    public function setNomVille(string $NomVille): self
    {
        $this->NomVille = $NomVille;

        return $this;
    }
}
