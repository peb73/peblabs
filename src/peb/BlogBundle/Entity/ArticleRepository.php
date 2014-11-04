<?php

namespace peb\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * Class ArticleRepository
 *
 * @package peb\BlogBundle\Entity
 */
class ArticleRepository extends EntityRepository{

    /**
     * @param string $tagLabel
     *
     * @return ArrayCollection
     */
    public function findByTag($tagLabel)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
             ' select a from pebBlogBundle:Article a'
            .' join a.tags t'
            .' WHERE a.status = :status'
            .' AND t.label = :tag'
            .' ORDER BY a.postDate DESC'
        );

        return $query
            ->setParameter('status', Article::PUBLISH)
            ->setParameter('tag', $tagLabel)
            ->getResult();

        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AcmeStoreBundle:Product p ORDER BY p.name ASC'
            )
            ->getResult();
    }

    /**
     * @return ArrayCollection
     */
    public function getAllPublish()
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select a from pebBlogBundle:Article a'
            .' where a.status = :status'
            .' order by a.postDate DESC'
        );

        return $query
            ->setParameter('status', Article::PUBLISH)
            ->getResult();
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return ArrayCollection
     */
    public function getPublish($limit = 5, $offset = 0)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select a from pebBlogBundle:Article a'
            .' where a.status = :status'
            .' order by a.postDate DESC LIMIT :limit OFFSET :offset'
        );

        return $query
            ->setParameter('status', Article::PUBLISH)
            ->setParameter('limit', $limit)
            ->setParameter('offset', $offset)
            ->getResult();
    }

    /**
     * @param string $categoryUrl
     * @return array
     */
    public function getPublishByCategoryUrl($categoryUrl)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select a from pebBlogBundle:Article a'
            .' join a.category c'
            .' where a.status = :status'
            .' and c.urlName = :url'
            .' order by a.postDate'
        );

        return $query
            ->setParameter('status', Article::PUBLISH)
            ->setParameter('url', $categoryUrl)
            ->getResult();
    }

    /**
     * @param string $tagLabel
     * @return array
     */
    public function getPublishByTagLabel($tagLabel)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select a from pebBlogBundle:Article a'
            .' join a.tags t'
            .' where t.label = :tagLabel'
        );

        return $query
            ->setParameter('tagLabel', $tagLabel)
            ->getResult();
    }

    /**
     * @param $sha
     * @return Article | null
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getPublishByShaOne($sha)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
            'select a from pebBlogBundle:Article a'
            .' where a.sha = :sha'
        );

        return $query
            ->setParameter('sha', $sha)
            ->getOneOrNullResult();
    }

} 