<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 21/10/14
 * Time: 22:30
 */

namespace peb\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use peb\BlogBundle\Entity\ArticleRepository;
use peb\BlogBundle\Entity\CategoryRepository;
use peb\BlogBundle\Entity\TagRepository;
use Symfony\Bridge\Twig\TwigEngine;

class CategoryService {

    /**
     * @var TwigEngine
     */
    private $twigEngine;

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @param TwigEngine $twigEngine
     */
    public function __construct(TwigEngine $twigEngine, EntityManager $em)
    {
        $this->twigEngine = $twigEngine;
        $this->articleRepository = $em->getRepository('pebBlogBundle:Article');
        $this->categoryRepository = $em->getRepository('pebBlogBundle:Category');
    }

    /**
     * @param string $categoryUrl
     * @return string
     */
    public function renderArticles($categoryUrl)
    {
        $category = $this->categoryRepository->findByUrl($categoryUrl);
        if($category == null){
            return $this->twigEngine->render('pebBlogBundle:Blog:404.html.twig',array(
                'type'=>'blog',
            ));
        }

        $articles = $this->articleRepository->getPublishByCategoryUrl($category->getUrlName());
        $categories = $this->categoryRepository->getAll();

        return $this->twigEngine->render('pebBlogBundle:Blog/category:categories.html.twig', array(
            'type'=>'blog',
            'categories' => $categories,
            'category' => $category,
            'articles' => $articles
        ));
    }
} 