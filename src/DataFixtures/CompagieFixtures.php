<?php

namespace App\DataFixtures;

use App\Entity\Compagnie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompagieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {   
       
        for ($i=0; $i <20 ; $i++) { 
            $compagnie = new Compagnie();

        }
         

        $manager->flush();
    }
}
