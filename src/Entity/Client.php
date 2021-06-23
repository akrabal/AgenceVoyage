<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="Reservation",mappedBy="Client")
     */
    private $idClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrenomClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AdresseMailClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumeroClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AdressePhysiqueClient;

    

    public function getId(): ?int
    {
        return $this->idClient;
    }

    public function getNomClient(): ?string
    {
        return $this->NomClient;
    }

    public function setNomClient(string $NomClient): self
    {
        $this->NomClient = $NomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->PrenomClient;
    }

    public function setPrenomClient(string $PrenomClient): self
    {
        $this->PrenomClient = $PrenomClient;

        return $this;
    }

    public function getAdresseMailClient(): ?string
    {
        return $this->AdresseMailClient;
    }

    public function setAdresseMailClient(string $AdresseMailClient): self
    {
        $this->AdresseMailClient = $AdresseMailClient;

        return $this;
    }

    public function getNumeroClient(): ?string
    {
        return $this->NumeroClient;
    }

    public function setNumeroClient(string $NumeroClient): self
    {
        $this->NumeroClient = $NumeroClient;

        return $this;
    }

    public function getAdressePhysiqueClient(): ?string
    {
        return $this->AdressePhysiqueClient;
    }

    public function setAdressePhysiqueClient(string $AdressePhysiqueClient): self
    {
        $this->AdressePhysiqueClient = $AdressePhysiqueClient;

        return $this;
    }

    
}
