<?php

namespace peb\BlogBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use peb\BlogBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * {@inheritDoc}
     */
    function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('first title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('Node'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-1'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('Java'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-2'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('CSS', 'Javascript'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-3'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('CSS', 'Javascript'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-4'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('CSS', 'Javascript'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-1'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('CSS', 'Javascript'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-2'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('CSS', 'HTML'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-3'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('HTML'))
            ->setStatus(Article::PUBLISH)
            ->setCategory($this->getReference('cat-4'));

        $manager->persist($article);

        $article = new Article();
        $article->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array())
            ->setStatus(Article::PUBLISH);

        $manager->persist($article);

        $article = new Article();
        $article->setStatus(Article::IN_CREATION)
            ->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.")
            ->setTitle('second title')
            ->setPostDate(new \DateTime('now'))
            ->setTags(array('CSS', 'Pure'));

        $manager->persist($article);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}