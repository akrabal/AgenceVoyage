<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{   
    public function __construct()
    {
        $this->Reservation= new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
     /**
      * @ORM\OneToMany(targetEntity="Reservation",mappedBy="User") 
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
 
      
       public function addReservations(Reservation $Reservation): self
       {
             if (!$this->Reservations->contains($Reservation)) {
                 $this->Reservations[] = $Reservation;
                 $Reservation->setUser($this);
       }
         return $this;
      }
       
      public function removeReservation(Reservation $Reservation): self
     {
         if ($this->reservations->removeElement($Reservation)) {
             // set the owning side to null (unless already changed)
             if ($Reservation->getUser() === $this) {
                 $Reservation->setUser(null);
             }
         }
 
         return $this;
     }
      
 

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Assert\Length(min=5,max=50, minMessage="votre prenom doit depasser 5",maxMessage="votre prenom doit etre inferieur a 50")
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     * @Assert\Length(min=6,max=50, minMessage="votre mot de passe doit depasser 6 chiffre ",maxMessage="votre mot de passe ne doit pas depasser 50")
     * 
     */
    private $password;

     /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $NomUser;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message = "l'email '{{ value }}' n'est pas valide .")
     * @Assert\NotBlank()
     */
    private $AdresseMailUser;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex(
     * pattern="/[a-z]+/i",
     * match=false,message="votre numero de telephone ne peut contenir des caracteres alphabetiques ")
     * @Assert\Length(min=8,max=12, minMessage="numero de telephone invalid",maxMessage="numero de telephone invalid")
     */
    private $NumeroUser;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/\d+/",match=false,message="adresse ne peux contenir des chiffres")
     * @Assert\NotBlank
     */
    private $AdressePhysiqueUser;

    


    public function getNomUser(): ?string
    {
        return $this->NomUser;
    }

    public function setNomUser(string $NomUser): self
    {
        $this->NomUser = $NomUser;

        return $this;
    }


    public function getAdresseMailUser(): ?string
    {
        return $this->AdresseMailUser;
    }

    public function setAdresseMailUser(string $AdresseMailUser): self
    {
        $this->AdresseMailUser = $AdresseMailUser;

        return $this;
    }

    public function getNumeroUser(): ?string
    {
        return $this->NumeroUser;
    }

    public function setNumeroUser(string $NumeroUser): self
    {
        $this->NumeroUser = $NumeroUser;

        return $this;
    }

    public function getAdressePhysiqueUser(): ?string
    {
        return $this->AdressePhysiqueUser;
    }

    public function setAdressePhysiqueUser(string $AdressePhysiqueUser): self
    {
        $this->AdressePhysiqueUser = $AdressePhysiqueUser;

        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
