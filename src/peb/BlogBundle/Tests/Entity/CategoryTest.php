<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 01/10/2014
 * Time: 18:01
 */

namespace peb\BlogBundle\Tests\Entity;


use peb\BlogBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryTest extends WebTestCase{

    /**
     *
     */
    public function testKey()
    {
        $category = new Category();
        $category->setName('plop');
        $this->assertEquals('plop',$category->getUrlName());

        $category->setName('plop plop é à');
        $this->assertEquals('plop+plop+%C3%A9+%C3%A0',$category->getUrlName());
    }
}