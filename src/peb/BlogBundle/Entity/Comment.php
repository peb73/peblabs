<?php

namespace peb\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use peb\HomeBundle\Entity\User;
/**
 * Comment
 *
 * @ORM\Table(name="Blog_Comment")
 * @ORM\Entity(repositoryClass="peb\BlogBundle\Entity\CommentRepository")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var Article
     *
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="comments")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="peb\HomeBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Comment
     *
     * @ORM\OneToOne(targetEntity="Comment")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get User
     *
     * @return User;
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set User
     *
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Comment
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Comment $parent
     *
     * @return $this
     */
    public function setParent(Comment $parent)
    {
        $this->parent = $parent;

        return $this;
    }
}
