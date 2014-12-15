<?php
// src/Nico/BlogBundle/DataFixtures/ORM/LoadQuarkData.php

namespace Nico\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nico\BlogBundle\Entity\Quark;

class LoadQuarkData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     *  {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $quark01 = new Quark();
        $quark01->setContent('Un exo de Mathématiques');
        $quark01->setParent(0);
        $quark01->setcategoriesCsv("mathhhh");
        $quark01->setUserId(1);

        $manager->persist($quark01);
        $manager->flush();

        $quark01->addGroup($this->getReference('category-maths'));
        $this->addReference('quark-maths' , $quark01);
    }

    public function getOrder() {
      return 1; // Load after categories
    }
}
