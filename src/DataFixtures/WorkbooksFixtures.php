<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Workbook;
use Faker\Factory;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use App\Entity\Sheet;
use App\Entity\Category;

class WorkbooksFixtures extends Fixture implements LoggerAwareInterface 
{
    public LoggerInterface $mylog;
    
    public function load(ObjectManager $manager)
    {
        $this->mylog->info("Bien ici !");
        $faker = Factory::create('fr_FR');
        
        $cats =[];
        $cats[1] = new Category();
        $cats[1]->setNom($faker->sentence(1),TRUE);
        
        $cats[2] = new Category();
        $cats[2]->setNom($faker->sentence(1),TRUE);
        
        $cats[3] = new Category();
        $cats[3]->setNom($faker->sentence(1),TRUE);
        
        $cats[4] = new Category();
        $cats[4]->setNom($faker->sentence(1),TRUE);
        
        
        
        for($i = 0;$i<3;$i++) {
            
            $wkb = new Workbook();
            $wkb->setNom("Mon Workbook");
            
            $s = new Sheet();
            $s->setNom("Page1");
            $wkb->addSheet($s);
            
            $s = new Sheet();
            $s->setNom("Page2");
            $wkb->addSheet($s);
            
            $nmax = $faker->numberBetween(2,3);
            for($j = 1;$j<$nmax;$j++) {
                $n = $faker->numberBetween(1,4);
                $wkb->addWk($cats[$n]);    
            }
            
                        
            
        }

        $manager->persist($wkb);
        
        $manager->flush();
    }
    public function setLogger(LoggerInterface $logger)
    {
        $this->mylog = $logger;
        
        $this->mylog->info("Bravo !");
    }

}
