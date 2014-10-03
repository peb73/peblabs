<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 01/10/2014
 * Time: 17:00
 */

namespace peb\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class CategoryRepository
 * @package peb\BlogBundle\Entity
 */
class CategoryRepository extends EntityRepository{

    /**
     * @return ArrayCollection
     */
    public function getAll()
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select c from pebBlogBundle:Category c'
            .' order by c.name ASC'
        );

        return $query
            ->getResult();
    }

    /**
     * @param string $urlName
     * @return null | Category
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public  function findByUrl($urlName)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select c from pebBlogBundle:Category c'
            .' where c.urlName = :urlName'
        );

        return $query
            ->setParameter('urlName', $urlName)
            ->getOneOrNullResult();
    }
} 