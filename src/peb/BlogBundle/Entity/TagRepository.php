<?php

namespace peb\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TagRepository
 */
class TagRepository extends EntityRepository
{
    /**
     * @return ArrayCollection
     */
    public function getAll()
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select t from pebBlogBundle:Tag t'
            .' order by t.label ASC'
        );

        return $query
            ->getResult();
    }

    /**
     * @param string $tagLabel
     * @return null | Tag
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public  function findByLabel($tagLabel)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select t from pebBlogBundle:Tag t'
            .' where t.label = :tagLabel'
        );

        return $query
            ->setParameter('tagLabel', $tagLabel)
            ->getOneOrNullResult();
    }
}
