<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Artiste;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       
        $faker=Factory::create("fr_FR");

        $fichierArtisteCsv=fopen(__DIR__."/artiste.csv","r");
        while(!feof($fichierArtisteCsv)){
            $lesArtistes[]=fgetcsv($fichierArtisteCsv);
        }
        fclose($fichierArtisteCsv);

        foreach ($lesArtisteCsv as $value) {
            $artiste=new Artiste();
            $artiste    ->setId(intval($value[0]))
                        ->setNom($value[1])
                        ->setDescription("<p>". join("</p><p>",$faker->paragraphs(5))) ."</p>"
                        ->setSite($faker->url())
                        ->setImage('https:randomuser.me/api/portraits')
        }
        $manager->flush();
    }
}