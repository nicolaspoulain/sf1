<?php
// src/Nico/BlogBundle/DataFixtures/ORM/LoadCategoryData.php

namespace Nico\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nico\BlogBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     *  {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category01 = new Category();
        $category01->setName('Mathématiques');
        $category01->setUserId(1);

        $category02 = new Category();
        $category02->setName('Histoire-Géo');
        $category02->setUserId(1);

        $category03 = new Category();
        $category03->setName('SVT');
        $category03->setUserId(1);

        $category04 = new Category();
        $category04->setName('EPS');
        $category04->setUserId(1);

        $manager->persist($category01);
        $manager->persist($category02);
        $manager->persist($category03);
        $manager->persist($category04);
        $manager->flush();

        $this->addReference('category-maths' , $category01);
        $this->addReference('category-hg'    , $category02);
        $this->addReference('category-svt'   , $category03);
        $this->addReference('category-eps'   , $category04);
    }

    /**
     *  {@inheritDoc}
     */
    public function getOrder() {
      return 0; // Load before quarks
    }
}

