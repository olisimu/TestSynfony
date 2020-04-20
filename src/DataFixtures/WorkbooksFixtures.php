<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Entity\Workbook;

class WorkbooksFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('FR_fr');
        
        
        for($i = 0;$i<3;$i++) {
            $wkb = new Workbook();
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
