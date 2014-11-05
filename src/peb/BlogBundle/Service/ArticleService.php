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

        return $this->twigEngine->render('pebBlogBundle:Blog/article:articles.html.twig', array(
            'type'=>'blog',
            'articles' => $articles
        ));
    }

    /**
     * @param string $sha
     * @return string
     */
    public function renderArticle($sha){

        $article = $this->articleRepository->getPublishByShaOne($sha);
        if($article == null){
            return $this->twigEngine->render('pebBlogBundle:Blog:404.html.twig',array(
                'type'=>'blog',
            ));
        }

        return $this->twigEngine->render('pebBlogBundle:Blog/article:article.html.twig',array(
            'type'=>'blog',
            'article' => $article
        ));
    }
} 