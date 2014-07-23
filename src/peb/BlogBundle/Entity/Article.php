<?php

namespace peb\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Article
 *
 * @ORM\Table(name="Blog_Article")
 * @ORM\Entity(repositoryClass="peb\BlogBundle\Entity\ArticleRepository")
 */
class Article
{
    const IN_CREATION = 0;
    const PUBLISH = 1;


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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postDate", type="datetime", nullable=true)
     */
    private $postDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = Article::IN_CREATION;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="text")
     */
    private $tags = "";

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="article")
     */
    private $comments;

    public function __construct(){
        $this->comments = new ArrayCollection();
        $this->creationDate = new \DateTime('now');
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Article
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setCreationDate($date)
    {
        $this->creationDate = $date;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @param \DateTime $date
     * @return \DateTime
     */
    public function getCreationDate($date)
    {
        return $this->creationDate;
    }

    /**
     * Set postDate
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setPostDate($date)
    {
        $this->postDate = $date;

        return $this;
    }

    /**
     * Get postDate
     *
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get tags
     *
     * @return array
     */
    public function getTags()
    {
        return explode(',', $this->tags);
    }

    /**
     * Set tags
     *
     * @param array $tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = implode(',', $tags);

        return $this;
    }

    /**
     * Get Comments
     *
     * @return ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add Comment
     *
     * @param Comment $comment
     * @return $this
     */
    public function addComment(Comment $comment)
    {
        $this->comments->add($comment);

        return $this;
    }
}
