<?php

namespace Noob\CommentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Noob\CommentBundle\Entity\CommentRepository")
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
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pubDate", type="datetime")
     */
    private $pubDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;
    
    /**
   * @ORM\ManyToOne(targetEntity="Noob\UserBundle\Entity\User", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
    private $author;
    
     /**
   * @ORM\ManyToOne(targetEntity="Noob\PostBundle\Entity\Post", cascade={"persist"}, inversedBy="comments")
   * @ORM\JoinColumn(nullable=false)
   */
    private $post;


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
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     * @return Comment
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;

        return $this;
    }

    /**
     * Get pubDate
     *
     * @return \DateTime 
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Comment
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set author
     *
     * @param \Noob\UserBundle\Entity\User $author
     * @return Comment
     */
    public function setAuthor(\Noob\UserBundle\Entity\User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Noob\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set post
     *
     * @param \Noob\PostBundle\Entity\Post $post
     * @return Comment
     */
    public function setPost(\Noob\PostBundle\Entity\Post $post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Noob\PostBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }
}
