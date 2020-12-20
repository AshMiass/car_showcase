<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\Brands;
use App\Entity\CarModel;

class Cars extends Fixture implements DependentFixtureInterface
{
    
    public const RELS1 = 'model1';
    public const RELS2 = 'model2';
    public const RELS3 = 'model3';

    public function load(ObjectManager $manager)
    {
        $entity = new CarModel();
        $entity->setName('X1');
        $entity->setYear('2020');
        $entity->setBrand($this->getReference(Brands::REFS));
        $manager->persist($entity);
        $this->addReference(self::RELS1, $entity);

        $entity = new CarModel();
        $entity->setName('X2');
        $entity->setYear('2020');
        $entity->setBrand($this->getReference(Brands::REFS));
        $manager->persist($entity);
        $this->addReference(self::RELS2, $entity);


        $entity = new CarModel();
        $entity->setName('X3');
        $entity->setYear('2020');
        $entity->setBrand($this->getReference(Brands::REFS));
        $manager->persist($entity);
        $this->addReference(self::RELS3, $entity);



        $manager->flush();
    }

    public function getDependencies(){
        return [
            Brands::class
        ];
    }
}
