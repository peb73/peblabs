<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 01/10/2014
 * Time: 17:00
 */

namespace peb\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="Blog_Category")
 * @ORM\Entity(repositoryClass="peb\BlogBundle\Entity\CategoryRepository")
 */
class Category {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="urlName", type="string", length=255)
     */
    private $urlName;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Article", mappedBy="category")
     */
    private $articles;

    /**
     * Constructor ...
     */
    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        $this->urlName = urlencode($name);

        return $this;
    }

    /**
     * @return string
     */
    public function getUrlName()
    {
        return $this->urlName;
    }

    /**
     * @return ArrayCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param Article $article
     * @return ArrayCollection
     */
    public function addArticle(Article $article)
    {
        $this->articles->add($article);

        return $this->articles;
    }

}