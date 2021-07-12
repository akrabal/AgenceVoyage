<?php

namespace App\DataFixtures;

use App\Entity\Compagnie;
use App\Entity\Gare;
use App\Entity\Reservation;
use App\Entity\User;
use App\Entity\Ville;
use App\Entity\Voyage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class Voyagefixtures extends Fixture
{   
    
   /**
    * @var UserPasswordHasherInterface
    */
   
   
   private $encoder;

   public function __construct( UserPasswordHasherInterface $encoder )
   {
       $this->encoder = $encoder ;
   }
    
    public function load(ObjectManager $manager)
    {
        
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) { 
           $voyage = new Voyage();
           $compagnie= new Compagnie();
           $gare = new Gare();
           $ville= new Ville();
           $gare2 = new Gare();
           $ville2= new Ville();

           $voyage->setHeuredepart($faker->dateTime('now','africa/lagos'));  
           $voyage->setHeureArrive($faker->dateTime('now','africa/lagos'));
           $voyage->setStatutVoyage('actif');

           $compagnie->setNomcompagnie($faker->company);
           $compagnie->setCoordonnesCompagnie($faker->streetName);

           $gare->setLocalisationGare($faker->streetName);
           
           $ville->setNomVille($faker->city);
           $gare->setVille($ville);

           $gare2->setLocalisationGare($faker->streetName);
           $ville2->setNomVille($faker->city);
           $gare2->setVille($ville2);

           $voyage->setCompagnie($compagnie);
           $voyage->setGareArriver($gare);
           $voyage->setGareDepart($gare2);
            
           $reservation = new Reservation();
           $user=new User();
           $user->setUsername($faker->userName);
           $user->setPassword( $this->encoder->hashPassword($user,'jevaisbien'.$i ) );
           $user->setNomUser($faker->userName);
           $user->setAdresseMailUser($faker->email);
           $user->setNumeroUser($faker->e164PhoneNumber);
           $user->setAdressePhysiqueUser($faker->streetName);
           $user->setRoles(['ROLE_USER']);

           $reservation->setDateReservation($faker->dateTime('now','africa/lagos'));
           $reservation->setStatutReservation('true');

           
           $reservation->setUser($user);
           $reservation->setVoyage($voyage);


           $manager->persist($voyage);
           $manager->persist($compagnie);
           $manager->persist($gare);
           $manager->persist($gare2);
           $manager->persist($ville);
           $manager->persist($ville2);
           $manager->persist($reservation);
           $manager->persist($user);



        }


        $manager->flush();
    }
}
