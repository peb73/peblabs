<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 23/10/14
 * Time: 23:49
 */

namespace peb\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use peb\BlogBundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * {@inheritDoc}
     */
    function load(ObjectManager $manager)
    {

        //Tag1
        $tag1 = new Tag('Node');
        $manager->persist($tag1);
        $this->addReference('tag-1',$tag1);

        //Tag2
        $tag2 = new Tag('Java');
        $manager->persist($tag2);
        $this->addReference('tag-2',$tag2);

        //Tag3
        $tag3 = new Tag('CSS');
        $manager->persist($tag3);
        $this->addReference('tag-3',$tag3);

        //Tag4
        $tag4 = new Tag('Javascript');
        $manager->persist($tag4);
        $this->addReference('tag-4',$tag4);

        //Tag5
        $tag5 = new Tag('HTML');
        $manager->persist($tag5);
        $this->addReference('tag-5',$tag5);

        //Tag6
        $tag6 = new Tag('Pure');
        $manager->persist($tag6);
        $this->addReference('tag-6',$tag6);

        //Flush
        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
} 