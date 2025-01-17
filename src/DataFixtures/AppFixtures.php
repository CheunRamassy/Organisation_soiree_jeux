<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\Jeux;
use App\Entity\Utilisateur;
use App\Factory\EvenementFactory;
use App\Factory\JeuDeCarteFactory;
use App\Factory\JeuDeDuelFactory;
use App\Factory\JeuDePlateauFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // EvenementFactory::createMany(10);
        JeuDeDuelFactory::createMany(10);
        JeuDeCarteFactory::createMany(10);
        JeuDePlateauFactory::createMany(10);

        for ($i = 0; $i < 10; $i++) {

            $evenement = new Evenement();
            $evenement->setTheme("event $i");
            $evenement->setDate(new \DateTime());
            // $user->setOrganisateur($evenement);


            for ($j = 0; $j < 5; $j++) {
                $user = new Utilisateur();
                $user->setName("user $i");
                $user->setemail("user@user$i");          
                $user->setpassword("test");
                $evenement->addOrganisateur($user);
            
            }

            $manager->persist($user);
        }
        $manager->flush();
    }

}
