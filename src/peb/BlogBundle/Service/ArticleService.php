<?php

namespace peb\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use peb\BlogBundle\Entity\ArticleRepository;
use peb\BlogBundle\Entity\CategoryRepository;
use peb\BlogBundle\Entity\TagRepository;
use Symfony\Bridge\Twig\TwigEngine;

class ArticleService {

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
     * @return string
     */
    public function renderArticles()
    {
        $articles = $this->articleRepository->getAllPublish();
        $categories = $this->categoryRepository->getAll();

        return $this->twigEngine->render('pebBlogBundle:Blog/article:articles.html.twig', array(
            'type'=>'blog',
            'categories'=> $categories,
            'articles' => $articles
        ));
    }
} 