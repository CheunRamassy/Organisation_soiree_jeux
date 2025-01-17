<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Entity\JeuDeCarte;
use App\Entity\JeuDeDuel;
use App\Entity\JeuDePlateau;
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
        // Ajout des données dans la base de données
        JeuDeDuelFactory::createMany(10);
        JeuDeCarteFactory::createMany(10);
        JeuDePlateauFactory::createMany(10);

        for ($i = 0; $i < 10; $i++) {

            $evenement = new Evenement();
            $evenement->setTheme("event $i");
            $evenement->setDate(new \DateTime());
            
            $jeu= new JeuDeDuel();
            $jeu->setName("Jeu de duel $i");
            $jeu->setRegle("regle $i");
            $jeu->setNbPlayers($i);
    
            $jeu->setEvenement($evenement);
            $evenement->setChoix($jeu);

            $jeu= new JeuDeCarte();
            $jeu->setName("Jeu de carte $i");
            $jeu->setRegle("regle $i");
            $jeu->setNbPlayers($i);
            $jeu->setEvenement($evenement);
            $evenement->setChoix($jeu);

            $jeu= new JeuDePlateau();
            $jeu->setName("Jeu de plateau $i");
            $jeu->setRegle("regle $i");
            $jeu->setNbPlayers($i);
            $jeu->setEvenement($evenement);
            $evenement->setChoix($jeu);

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
