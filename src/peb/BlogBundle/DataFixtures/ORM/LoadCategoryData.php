<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 01/10/2014
 * Time: 17:15
 */

namespace peb\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use peb\BlogBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * {@inheritDoc}
     */
    function load(ObjectManager $manager)
    {
        //Category1
        $category1 = new Category();
        $category1->setName('cat-1');
        $manager->persist($category1);

        $this->addReference('cat-1', $category1);

        //Category2
        $category2 = new Category();
        $category2->setName('cat-2');
        $manager->persist($category2);

        $this->addReference('cat-2', $category2);

        //Category3
        $category3 = new Category();
        $category3->setName('cat-3');
        $manager->persist($category3);

        $this->addReference('cat-3', $category3);

        //Category4
        $category4 = new Category();
        $category4->setName('cat-4');
        $manager->persist($category4);

        $this->addReference('cat-4',$category4);

        //Flush
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
} 