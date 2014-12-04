<?php
// src/Nico/BlogBundle/DataFixtures/ORM/LoadCategoryData.php

namespace Nico\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nico\BlogBundle\Entity\Category;

class LoadCategoryData implements FixtureInterface
{
    /**
     *  {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category01 = new Category();
        $category01->setName('CCAATTEEGGOORRYY');
        $category01->setUserId(1);

        $category02 = new Category();
        $category02->setName('CATEGORYyyyyY');
        $category02->setUserId(1);

        $category03 = new Category();
        $category03->setName('CCAaaaaaATEGORY');
        $category03->setUserId(1);

        $category04 = new Category();
        $category04->setName('CATEeeeeeeeEGORY');
        $category04->setUserId(1);

        $manager->persist($category01);
        $manager->persist($category02);
        $manager->persist($category03);
        $manager->persist($category04);
        $manager->flush();
    }
}
