<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\Cars;
use App\Entity\CarModelStock;

class Stock extends Fixture implements DependentFixtureInterface
{
    protected $cars = [];

    public function load(ObjectManager $manager)
    {
        
        $this->cars = $manager->getRepository('App\Entity\CarModel')->findAll();
        for($i = 0; $i < 10; $i++){
            $manager->persist($this->generateEntity());
        }

        $manager->flush();
    }

    protected function generateEntity(): CarModelStock
    {
        
        $entity = new CarModelStock();
        $entity->setCarModel($this->cars[rand(0,count($this->cars)-1)]);
        $entity->setInStock(rand(1,100));
        $entity->setPrice(rand(1000000,2000000));
        return $entity;
    }

    public function getDependencies()
    {
        return [
            Cars::class
        ];
    }
}
