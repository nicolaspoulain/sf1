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
        $quark01->setcategoriesCsv("math");
        $quark01->setUserId(1);
        $quark01->addGroup($this->getReference('category-maths'));

        $quark02 = new Quark();
        $quark02->setContent('Un exo de Mathématiques et aussi de SVT');
        $quark02->setParent(0);
        $quark02->setcategoriesCsv("math , svt");
        $quark02->setUserId(1);
        $quark02->addGroup($this->getReference('category-maths'));
        $quark02->addGroup($this->getReference('category-svt'));

        $manager->persist($quark01);
        $manager->persist($quark02);
        $manager->flush();

    }

    /**
     *  {@inheritDoc}
     */
    public function getOrder() {
      return 1; // Load after categories
    }
}
