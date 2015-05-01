<?php

namespace Noob\MessagerieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Noob\MessagerieBundle\Entity\MessageRepository")
 */
class Message
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pubDate", type="datetime")
     */
    private $pubDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isSeen", type="boolean")
     */
    private $isSeen;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="isDeletedAuthor", type="boolean")
     */
    private $isDeletedAuthor;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="isDeletedRecipent", type="boolean")
     */
    private $isDeletedRecipent;
    
    
    /**
   * @ORM\ManyToOne(targetEntity="Noob\UserBundle\Entity\User", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
    private $author;
    
    
    /**
   * @ORM\ManyToOne(targetEntity="Noob\UserBundle\Entity\User", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
    private $recipient;
    
    

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
     * @return Message
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
     * Set title
     *
     * @param string $title
     * @return Message
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
     * Set pubDate
     *
     * @param \DateTime $pubDate
     * @return Message
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
     * Set isSeen
     *
     * @param boolean $isSeen
     * @return Message
     */
    public function setIsSeen($isSeen)
    {
        $this->isSeen = $isSeen;

        return $this;
    }

    /**
     * Get isSeen
     *
     * @return boolean 
     */
    public function getIsSeen()
    {
        return $this->isSeen;
    }

    /**
     * Set author
     *
     * @param \Noob\UserBundle\Entity\User $author
     * @return Message
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
     * Set recipient
     *
     * @param \Noob\UserBundle\Entity\User $recipient
     * @return Message
     */
    public function setRecipient(\Noob\UserBundle\Entity\User $recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Get recipient
     *
     * @return \Noob\UserBundle\Entity\User 
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set isDeletedAuthor
     *
     * @param boolean $isDeletedAuthor
     * @return Message
     */
    public function setIsDeletedAuthor($isDeletedAuthor)
    {
        $this->isDeletedAuthor = $isDeletedAuthor;

        return $this;
    }

    /**
     * Get isDeletedAuthor
     *
     * @return boolean 
     */
    public function getIsDeletedAuthor()
    {
        return $this->isDeletedAuthor;
    }

    /**
     * Set isDeletedRecipent
     *
     * @param boolean $isDeletedRecipent
     * @return Message
     */
    public function setIsDeletedRecipent($isDeletedRecipent)
    {
        $this->isDeletedRecipent = $isDeletedRecipent;

        return $this;
    }

    /**
     * Get isDeletedRecipent
     *
     * @return boolean 
     */
    public function getIsDeletedRecipent()
    {
        return $this->isDeletedRecipent;
    }
}
