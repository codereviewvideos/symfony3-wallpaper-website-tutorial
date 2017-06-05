<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = (new Category())
            ->setName('Abstract')
        ;

        $this->addReference('category.abstract', $category);

        $manager->persist($category);



        $category = (new Category())
            ->setName('Summer')
        ;

        $this->addReference('category.summer', $category);

        $manager->persist($category);



        $category = (new Category())
            ->setName('Winter')
        ;

        $this->addReference('category.winter', $category);

        $manager->persist($category);



        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }
}