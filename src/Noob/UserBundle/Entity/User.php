<?php

namespace Noob\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Validator\Constraints as Assert;
        
/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Noob\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=32)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, unique=true)
     */
    private $email;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="visibleInfo", type="boolean")
     */
    private $visibleInfo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=30)
     */
    private $firstname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=35)
     */
    private $surname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=50, nullable=true)
     */
    private $cv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;
    
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=50, nullable=true)
     */
    private $picture;
    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;
    
    
    
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=50, nullable=true)
     */
    private $cover;
    
    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=30, nullable=true)
     */
    private $phoneNumber;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fblink", type="string", length=120, nullable=true)
     */
    private $fblink;
    
    /**
     * @var string
     *
     * @ORM\Column(name="twitterlink", type="string", length=120, nullable=true)
     */
    private $twitterlink;
    
    /**
     * @var string
     *
     * @ORM\Column(name="linkedinlink", type="string", length=120, nullable=true)
     */
    private $linkedinlink;
    
    /**
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="lookingForInternship", type="boolean")
     */
    private $lookingForInternship;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="lookingForJob", type="boolean")
     */
    private $lookingForJob;
    
    
    /**
    * @ORM\ManyToOne(targetEntity="Noob\UserBundle\Entity\Role")
    * @ORM\JoinColumn(nullable=false)
    */
    private $role;
    
    /**
    * @ORM\ManyToOne(targetEntity="Noob\UserBundle\Entity\Section")
    */
    private $section;
    
    /**
    * @ORM\ManyToMany(targetEntity="Noob\UserBundle\Entity\User", mappedBy="usersIFollow",fetch="EXTRA_LAZY")
    */
    private $usersFollowers;
    
    /**
   * @ORM\ManyToMany(targetEntity="Noob\UserBundle\Entity\User", inversedBy="usersFollowers",fetch="EXTRA_LAZY")
   */
    private $usersIFollow; 
    
     /**
   * @ORM\ManyToMany(targetEntity="Noob\PostBundle\Entity\Post", mappedBy="likers",fetch="EXTRA_LAZY")
   */
    private $postsLiked;
    
    
    
      /**
   * @ORM\OneToMany(targetEntity="Noob\MessagerieBundle\Entity\Message", mappedBy="author",fetch="EXTRA_LAZY")
   */
    private $messagesSent;
    /**
   * @ORM\OneToMany(targetEntity="Noob\MessagerieBundle\Entity\Message", mappedBy="recipient",fetch="EXTRA_LAZY")
   */
    private $messagesReceived;
    
    
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=75)
     */
    private $slug;
    
    
    /**
    * @ORM\ManyToMany(targetEntity="Noob\TagBundle\Entity\Tag")
    */
    private $tags;
    
    /**
     * @var string
     *
     * @ORM\Column(name="society", type="string", length=50, nullable=true)
     */
    private $society;
    
    /**
     * @var string
     *
     * @ORM\Column(name="websiteurl", type="string", length=255, nullable=true)
     */
    private $websiteurl;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="jury", type="boolean")
     */
    private $jury;
    
    
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set cv
     *
     * @param string $cv
     * @return User
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string 
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
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
     * Set picture
     *
     * @param string $picture
     * @return User
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
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set fblink
     *
     * @param string $fblink
     * @return User
     */
    public function setFblink($fblink)
    {
        $this->fblink = $fblink;

        return $this;
    }

    /**
     * Get fblink
     *
     * @return string 
     */
    public function getFblink()
    {
        return $this->fblink;
    }

    /**
     * Set twitterlink
     *
     * @param string $twitterlink
     * @return User
     */
    public function setTwitterlink($twitterlink)
    {
        $this->twitterlink = $twitterlink;

        return $this;
    }

    /**
     * Get twitterlink
     *
     * @return string 
     */
    public function getTwitterlink()
    {
        return $this->twitterlink;
    }

    /**
     * Set linkedinlink
     *
     * @param string $linkedinlink
     * @return User
     */
    public function setLinkedinlink($linkedinlink)
    {
        $this->linkedinlink = $linkedinlink;

        return $this;
    }

    /**
     * Get linkedinlink
     *
     * @return string 
     */
    public function getLinkedinlink()
    {
        return $this->linkedinlink;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
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
     * Set tfetheme
     *
     * @param string $tfetheme
     * @return User
     */
    public function setTfetheme($tfetheme)
    {
        $this->tfetheme = $tfetheme;

        return $this;
    }

    /**
     * Get tfetheme
     *
     * @return string 
     */
    public function getTfetheme()
    {
        return $this->tfetheme;
    }

    /**
     * Set tfedate
     *
     * @param \DateTime $tfedate
     * @return User
     */
    public function setTfedate($tfedate)
    {
        $this->tfedate = $tfedate;

        return $this;
    }

    /**
     * Get tfedate
     *
     * @return \DateTime 
     */
    public function getTfedate()
    {
        return $this->tfedate;
    }
    
    
    /* -------------------------------------------------------------- SECURITY */
    
    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    }

    
    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

   /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }
    
    public function isEqualTo(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }
    
    /*----------------------------------------------------------------------------------*/
    
    /**
     * Set role
     *
     * @param \Noob\UserBundle\Entity\Role $role
     * @return User
     */
    public function setRole(\Noob\UserBundle\Entity\Role $role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Noob\UserBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add usersIFollow
     *
     * @param \Noob\UserBundle\Entity\User $usersIFollow
     * @return User
     */
    public function addUsersIFollow(\Noob\UserBundle\Entity\User $usersIFollow)
    {
        $this->usersIFollow[] = $usersIFollow;

        return $this;
    }

    /**
     * Remove usersIFollow
     *
     * @param \Noob\UserBundle\Entity\User $usersIFollow
     */
    public function removeUsersIFollow(\Noob\UserBundle\Entity\User $usersIFollow)
    {
        $this->usersIFollow->removeElement($usersIFollow);
    }

    /**
     * Get usersIFollow
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsersIFollow()
    {
        return $this->usersIFollow;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return User
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add tags
     *
     * @param \Noob\TagBundle\Entity\Tag $tags
     * @return User
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
     * Set lookingForInternship
     *
     * @param boolean $lookingForInternship
     * @return User
     */
    public function setLookingForInternship($lookingForInternship)
    {
        $this->lookingForInternship = $lookingForInternship;

        return $this;
    }

    /**
     * Get lookingForInternship
     *
     * @return boolean 
     */
    public function getLookingForInternship()
    {
        return $this->lookingForInternship;
    }

    /**
     * Set lookingForJob
     *
     * @param boolean $lookingForJob
     * @return User
     */
    public function setLookingForJob($lookingForJob)
    {
        $this->lookingForJob = $lookingForJob;

        return $this;
    }

    /**
     * Get lookingForJob
     *
     * @return boolean 
     */
    public function getLookingForJob()
    {
        return $this->lookingForJob;
    }

    /**
     * Add usersFollowers
     *
     * @param \Noob\UserBundle\Entity\User $usersFollowers
     * @return User
     */
    public function addUsersFollower(\Noob\UserBundle\Entity\User $usersFollowers)
    {
        $this->usersFollowers[] = $usersFollowers;

        return $this;
    }

    /**
     * Remove usersFollowers
     *
     * @param \Noob\UserBundle\Entity\User $usersFollowers
     */
    public function removeUsersFollower(\Noob\UserBundle\Entity\User $usersFollowers)
    {
        $this->usersFollowers->removeElement($usersFollowers);
    }

    /**
     * Get usersFollowers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsersFollowers()
    {
        return $this->usersFollowers;
    }
    
    
    //-------------------------------------------------------------------------------------

    /**
     * Set society
     *
     * @param string $society
     * @return User
     */
    public function setSociety($society)
    {
        $this->society = $society;

        return $this;
    }

    /**
     * Get society
     *
     * @return string 
     */
    public function getSociety()
    {
        return $this->society;
    }

    /**
     * Set websiteurl
     *
     * @param string $websiteurl
     * @return User
     */
    public function setWebsiteurl($websiteurl)
    {
        $this->websiteurl = $websiteurl;

        return $this;
    }

    /**
     * Get websiteurl
     *
     * @return string 
     */
    public function getWebsiteurl()
    {
        return $this->websiteurl;
    }

    public function setVisibleInfo($visibleInfo)
    {
        $this->visibleInfo = $visibleInfo;

        return $this;
    }

    public function getVisibleInfo()
    {
        return $this->visibleInfo;
    }

    /**
     * Set cover
     *
     * @param string $cover
     * @return User
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string 
     */
    public function getCover()
    {
        return $this->cover;
    }


    /**
     * Add postsLiked
     *
     * @param \Noob\PostBundle\Entity\Post $postsLiked
     * @return User
     */
    public function addPostsLiked(\Noob\PostBundle\Entity\Post $postsLiked)
    {
        $this->postsLiked[] = $postsLiked;
        
        $postsLiked->addLiker($this);

        return $this;
    }

    /**
     * Remove postsLiked
     *
     * @param \Noob\PostBundle\Entity\Post $postsLiked
     */
    public function removePostsLiked(\Noob\PostBundle\Entity\Post $postsLiked)
    {
        $this->postsLiked->removeElement($postsLiked);
        $postsLiked->removeLiker($this);
    }

    /**
     * Get postsLiked
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostsLiked()
    {
        return $this->postsLiked;
    }
    
    
    
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    /*FILE--------------------------------------------------------------------------------------------------------------------------------------*/
    public function getAbsolutePath()
    {
        return null === $this->picture ? null : $this->getUploadRootDir().'/'.$this->picture;
    }

    public function getWebPath()
    {
        return null === $this->picture ? null : $this->getUploadDir().'/'.$this->picture;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/documents';
    }
    
    
    
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // faites ce que vous voulez pour générer un nom unique
            $this->picture = sha1(uniqid(mt_rand(), true)).'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // s'il y a une erreur lors du déplacement du fichier, une exception
        // va automatiquement être lancée par la méthode move(). Cela va empêcher
        // proprement l'entité d'être persistée dans la base de données si
        // erreur il y a
        $this->file->move($this->getUploadRootDir(), $this->picture);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    /**
     * Set jury
     *
     * @param boolean $jury
     * @return User
     */
    public function setJury($jury)
    {
        $this->jury = $jury;

        return $this;
    }

    /**
     * Get jury
     *
     * @return boolean 
     */
    public function getJury()
    {
        return $this->jury;
    }

    /**
     * Set section
     *
     * @param \Noob\UserBundle\Entity\Section $section
     * @return User
     */
    public function setSection(\Noob\UserBundle\Entity\Section $section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \Noob\UserBundle\Entity\Section 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Add messagesSent
     *
     * @param \Noob\MessagerieBundle\Entity\Message $messagesSent
     * @return User
     */
    public function addMessagesSent(\Noob\MessagerieBundle\Entity\Message $messagesSent)
    {
        $this->messagesSent[] = $messagesSent;
        $messagesSent->setAuthor($this);

        return $this;
    }

    /**
     * Remove messagesSent
     *
     * @param \Noob\MessagerieBundle\Entity\Message $messagesSent
     */
    public function removeMessagesSent(\Noob\MessagerieBundle\Entity\Message $messagesSent)
    {
        $this->messagesSent->removeElement($messagesSent);
    }

    /**
     * Get messagesSent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesSent()
    {
        return $this->messagesSent;
    }

    /**
     * Add messagesReceived
     *
     * @param \Noob\MessagerieBundle\Entity\Message $messagesReceived
     * @return User
     */
    public function addMessagesReceived(\Noob\MessagerieBundle\Entity\Message $messagesReceived)
    {
        $this->messagesReceived[] = $messagesReceived;
        $messagesReceived->setRecipient($this);

        return $this;
    }

    /**
     * Remove messagesReceived
     *
     * @param \Noob\MessagerieBundle\Entity\Message $messagesReceived
     */
    public function removeMessagesReceived(\Noob\MessagerieBundle\Entity\Message $messagesReceived)
    {
        $this->messagesReceived->removeElement($messagesReceived);
    }

    /**
     * Get messagesReceived
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesReceived()
    {
        return $this->messagesReceived;
    }
}
