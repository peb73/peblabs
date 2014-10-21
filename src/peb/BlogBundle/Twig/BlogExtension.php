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
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->categoryRepository = $em->getRepository('pebBlogBundle:Category');
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
            new \Twig_SimpleFunction('peblabs_blog_sidebar', array($this,'getSideBar'),array('is_safe' => array('html')))
        );
    }

    /**
     * @param Category $category
     * @return string
     */
    public function getSideBar(Category $category = null)
    {
        $categories = $this->categoryRepository->getAll();

        return $this->environment->render('pebBlogBundle:Blog:sidebar.html.twig', array(
            'categories'=>$categories,
            'category' => $category,
            'autoescape' => false
        ));
    }
}