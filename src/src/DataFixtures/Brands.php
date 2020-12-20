<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class Brands extends Fixture /* implements DependentFixtureInterface */
{
    public const REFS = 'brand';

    public function load(ObjectManager $manager)
    {
        $entity = new Brand();
        $entity->setName('BMW');
        $manager->persist($entity);
        $manager->flush();
        $this->addReference(self::REFS, $entity);
    }
}
