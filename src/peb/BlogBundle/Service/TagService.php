<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 31/10/14
 * Time: 18:02
 */

namespace peb\BlogBundle\Service;


use Doctrine\ORM\EntityManager;
use peb\BlogBundle\Entity\ArticleRepository;
use peb\BlogBundle\Entity\CategoryRepository;
use peb\BlogBundle\Entity\TagRepository;
use Symfony\Bridge\Twig\TwigEngine;

class TagService {

    /**
     * @var TwigEngine
     */
    private $twigEngine;

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @param TwigEngine $twigEngine
     * @param EntityManager $em
     */
    public function __construct(TwigEngine $twigEngine, EntityManager $em)
    {
        $this->twigEngine = $twigEngine;
        $this->articleRepository = $em->getRepository('pebBlogBundle:Article');
        $this->tagRepository = $em->getRepository('pebBlogBundle:Tag');
        $this->categoryRepository = $em->getRepository('pebBlogBundle:Category');
    }

    /**
     * @param string $tagLabel
     * @return string
     */
    public function renderArticles($tagLabel)
    {
        $articles = $this->articleRepository->getPublishByTagLabel($tagLabel);
        $categories = $this->categoryRepository->getAll();
        $tag = $this->tagRepository->findByLabel($tagLabel);

        if($tag == null){
            return $this->twigEngine->render('pebBlogBundle:Blog:404.html.twig',array(
                'type'=>'blog',
            ));
        }

        return $this->twigEngine->render('pebBlogBundle:Blog/tag:tags.html.twig', array(
            'type'=>'blog',
            'categories' => $categories,
            'tag' => $tag,
            'articles' => $articles
        ));
    }

}