<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 21/10/14
 * Time: 20:50
 */

namespace peb\BlogBundle\Twig;

use Doctrine\ORM\EntityManager;
use peb\BlogBundle\Entity\Category;
use peb\BlogBundle\Entity\CategoryRepository;
use peb\BlogBundle\Entity\TagRepository;
use \Twig_Environment;

class BlogExtension extends \Twig_Extension {

    /**
     * @var Twig_Environment
     */
    private $environment;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->categoryRepository = $em->getRepository('pebBlogBundle:Category');
        $this->tagRepository = $em->getRepository('pebBlogBundle:Tag');
    }

    /**
     * {@inheritDoc}
     */
    public function initRuntime(Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'peblabs_blog_extension';
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('peblabs_blog_sidebar', array($this,'getSideBar'),array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('peblabs_blog_breadcrumb', array($this,'getBreadCrumb'),array('is_safe' => array('html')))
        );
    }

    /**
     * @param $category
     * @return string
     */
    public function getSideBar($category = null)
    {
        $categories = $this->categoryRepository->getAll();
        $tags = $this->tagRepository->getAll();

        return $this->environment->render('pebBlogBundle:Blog/twig:sidebar.html.twig', array(
            'categories'=>$categories,
            'category' => $category,
            'tags' => $tags,
            'autoescape' => false
        ));
    }

    /**
     * @param string $type
     * @param string $category
     * @return string
     */
    public function getBreadCrumb($type,$value)
    {
        switch($type)
        {
            case 'category':
                return $this->environment->render('pebBlogBundle:Blog/twig/breadcrumb:category.html.twig', array(
                    'category' => $value,
                    'autoescape' => false
                ));
                break;
            case 'tag':
                return $this->environment->render('pebBlogBundle:Blog/twig/breadcrumb:tag.html.twig',array(
                   'tag' => $value,
                    'autoescape' => false
                ));
                break;
            case 'article':
                //TODO
                break;
        }

        return '';
    }
}