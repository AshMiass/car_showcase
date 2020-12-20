<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\Cars;
use App\Entity\CarModelStock;

class Stock extends Fixture implements DependentFixtureInterface
{
    protected $rels = [Cars::RELS1, Cars::RELS2, Cars::RELS3];
    public function load(ObjectManager $manager)
    {
        
        for($i = 0; $i < 10; $i++){
            $manager->persist($this->generateEntity());
        }

        $manager->flush();
    }

    protected function generateEntity(): CarModelStock
    {
        $entity = new CarModelStock();
        $entity->setCarModelId($this->getReference($this->rels[rand(0,2)]));
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
