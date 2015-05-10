<?php

namespace Noob\PostBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Noob\PostBundle\Entity\PostRepository")
 */
class Post
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=50, nullable=true)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

   /**
    * @ORM\ManyToOne(targetEntity="Noob\PostBundle\Entity\Type")
    * @ORM\JoinColumn(nullable=false)
    */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=200, nullable=true)
     */
    private $url;
    
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="pubDate", type="datetime")
     */
    private $pubDate;
    

    /**
     * @var boolean
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;
    
    
    public function setUpdatedAt($updatedAt){
        $this->updatedAt = $updatedAt;
        return $this;
    }
    public function getUpdatedAt(){
        return $this->updatedAt;
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
    * @ORM\ManyToOne(targetEntity="Noob\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    private $author;
    
    
    /**
    * @ORM\ManyToMany(targetEntity="Noob\TagBundle\Entity\Tag")
    */
    private $tags;
    
    
    /**
    * @ORM\ManyToMany(targetEntity="Noob\UserBundle\Entity\User", inversedBy="postsLiked")
    */
    private $likers;
    
    /**
    * @ORM\OneToMany(targetEntity="Noob\CommentBundle\Entity\Comment", mappedBy="post")
    */
    private $comments;
    
    
    /**
     * @var slug
     *
     * @ORM\Column(name="slug", type="string", length=100)
     */
    private $slug;
    
    
    
    /**
     * Set name
     *
     * @param string $name
     * @return Post
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Post
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Post
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Post
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Post
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->likers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set pubDate
     *
     * @param \DateTime $pubDate
     * @return Post
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

    public function getSlug(){
        return $this->slug;
    }
    
    public function setSlug($slug){
        $this->slug = $slug;
        return $this;
    }
    
    
    /**
     * Set author
     *
     * @param \Noob\UserBundle\Entity\User $author
     * @return Post
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
     * Add tags
     *
     * @param \Noob\TagBundle\Entity\Tag $tags
     * @return Post
     */
    public function addTag(\Noob\TagBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Noob\TagBundle\Entity\Tag $tags
     */
    public function removeTag(\Noob\TagBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add likers
     *
     * @param \Noob\UserBundle\Entity\User $likers
     * @return Post
     */
    public function addLiker(\Noob\UserBundle\Entity\User $likers)
    {
        $this->likers[] = $likers;

        return $this;
    }

    /**
     * Remove likers
     *
     * @param \Noob\UserBundle\Entity\User $likers
     */
    public function removeLiker(\Noob\UserBundle\Entity\User $likers)
    {
        $this->likers->removeElement($likers);
    }

    /**
     * Get likers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLikers()
    {
        return $this->likers;
    }


    /**
     * Add comments
     *
     * @param \Noob\CommentBundle\Entity\Comment $comments
     * @return Post
     */
    public function addComment(\Noob\CommentBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Noob\CommentBundle\Entity\Comment $comments
     */
    public function removeComment(\Noob\CommentBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
    
    /*Picture-------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * @Assert\File(
     * maxSize="2000k",
     * mimeTypes={"image/png", "image/jpeg", "image/gif"},
     * mimeTypesMessage="L'image doit être au format png, jpg ou gif",
     * maxSizeMessage="L'image ne peut pas faire plus de 2 Mo"
     * )
     */
    public $filePicture;
    public $oldPicture;
    
    public function getAbsolutePathPicture()
    {
        return null === $this->picture ? null : $this->getUploadRootDirPicture().'/'.$this->picture;
    }
    

    public function getWebPathPicture()
    {
        return null === $this->picture ? null : $this->getUploadDirPicture().'/'.$this->picture;
    }
    

    protected function getUploadRootDirPicture()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDirPicture();
    }

    protected function getUploadDirPicture()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'img/postpicoriginal';
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadPicture()
    {
        // Sauvegarde temporaire de l'ancienne image pour la supprimer en postUpdate
        if ($this->getPicture() !== null) {
            $this->oldPicture = $this->getPicture();
        }
        
        if (null !== $this->filePicture) {
            // faites ce que vous voulez pour générer un nom unique
            $this->picture = sha1(uniqid(mt_rand(), true)).'.'.$this->filePicture->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function uploadPicture()
    {
        if (null === $this->filePicture) {
            return;
        }
        
        // Si l'utilisateur avait déjà une image, on la supprime
        if ($this->oldPicture != null) {
            unlink($this->getUploadRootDirPicture().'/'.$this->oldPicture);
        }

        // s'il y a une erreur lors du déplacement du fichier, une exception
        // va automatiquement être lancée par la méthode move(). Cela va empêcher
        // proprement l'entité d'être persistée dans la base de données si
        // erreur il y a
        $this->filePicture->move($this->getUploadRootDirPicture(), $this->picture);

        unset($this->filePicture);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUploadPicture()
    {
        if ($file = $this->getAbsolutePathPicture()) {
            unlink($file);
        }
    }
    
    
}
