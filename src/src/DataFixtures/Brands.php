<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Brands extends Fixture /* implements DependentFixtureInterface */
{

    public function load(ObjectManager $manager)
    {
        $entity = new Brand();
        $entity->setName('BMW');
        $manager->persist($entity);
        $manager->flush();
    }
}
