<?php

namespace peb\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use peb\BlogBundle\Entity\ArticleRepository;
use Symfony\Bridge\Twig\TwigEngine;

class ArticleService {

    /**
     * @var TwigEngine
     */
    private $twigEngine;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @param TwigEngine $twigEngine
     */
    public function __construct(TwigEngine $twigEngine, EntityManager $em)
    {
        $this->twigEngine = $twigEngine;
        $this->em = $em;
        $this->articleRepository = $em->getRepository('pebBlogBundle:Article');
    }

    /**
     * @return string
     */
    public function renderArticles()
    {
        $articles = $this->articleRepository->getAllPublish();

        return $this->twigEngine->render('pebBlogBundle:Blog:articles.html.twig', array(
            'type'=>'blog',
            'articles' => $articles
        ));
    }
} 