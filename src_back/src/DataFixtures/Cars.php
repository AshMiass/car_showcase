<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\Brands;
use App\Entity\CarModel;

class Cars extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $brands = $manager->getRepository('App\Entity\Brand')->findAll();
        $brand = $brands[0];
        $entity = new CarModel();
        $entity->setName('X1');
        $entity->setYear('2020');
        $entity->setBrand($brand);
        $entity->setImage('/assets/cars/x1.webp');
        $manager->persist($entity);

        $entity = new CarModel();
        $entity->setName('X2');
        $entity->setYear('2020');
        $entity->setBrand($brand);
        $entity->setImage('/assets/cars/x2.webp');
        $manager->persist($entity);


        $entity = new CarModel();
        $entity->setName('X3');
        $entity->setYear('2020');
        $entity->setBrand($brand);
        $entity->setImage('/assets/cars/x3.webp');
        $manager->persist($entity);



        $manager->flush();
    }

    public function getDependencies(){
        return [
            Brands::class
        ];
    }
}
