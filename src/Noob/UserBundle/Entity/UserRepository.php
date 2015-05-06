<?php
namespace Noob\UserBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;


use Doctrine\ORM\Tools\Pagination\Paginator;

class UserRepository extends EntityRepository implements UserProviderInterface
{
    
    public function findLastBySlugLike($slug){
        $q = $this->createQueryBuilder('u')->where('u.slug like :slug')->setParameter('slug', '%'.$slug.'%')->orderBy('u.id','desc')
            ->setMaxResults(1);
        return  $q->getQuery()->getResult();
    }
    
    public function getUserListAndRole(){
        $q = $this
            ->createQueryBuilder('u')
            ->leftJoin('u.role', 'r')
            ->addSelect('r')
            ->getQuery();
        return $q->getResult();
    }
    
    public function getUserAndFollowed(){
        $q = $this->createQueryBuilder('u')
             ->leftJoin('u.usersFollowed','us')
             ->addSelect('us')
             ->getQuery();
        return $q->getResult();
    }
    
   public function getFullUserBySlug($slug){
       $q = $this->createQueryBuilder('u')
                 ->where('u.slug like :slug')->setParameter('slug', $slug)
                 ->leftJoin('u.role','r')->addSelect('r')
                 ->leftJoin('u.tags','t')->addSelect('t')
                 ->leftJoin('u.section','s')->addSelect('s')
                 ->leftJoin('u.usersIFollow', 'uif')->addSelect('uif');
       return $q->getQuery()->getSingleResult();
   }
   
   public function getUserFollowersCompleteInfo($userid, $order = 'asc', $limit = 10, $offset = 0){
       $q = $this->createQueryBuilder('u')
            ->leftJoin('u.role','r')->addSelect('r')
            ->leftJoin('u.tags','t')->addSelect('t')
            ->leftJoin('u.section','s')->addSelect('s')
            ->leftJoin('u.usersIFollow', 'uif')->addSelect('uif')
            ->andWhere(':userid MEMBER OF u.usersIFollow')->setParameter('userid', $userid)
               
            ->orderBy('u.id',$order)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery();
       return new Paginator($q, $fetchJoinCollection = true);
   }   
   
   public function getUserFollowingCompleteInfo($userid, $order = 'asc', $limit = 10, $offset = 0){
       $q = $this->createQueryBuilder('u')
            ->leftJoin('u.role','r')->addSelect('r')
            ->leftJoin('u.tags','t')->addSelect('t')
            ->leftJoin('u.section','s')->addSelect('s')
            ->leftJoin('u.usersIFollow', 'uif')->addSelect('uif')
            ->andWhere(':userid MEMBER OF u.usersFollowers')->setParameter('userid', $userid)
            ->orderBy('u.id',$order)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery();
       return new Paginator($q, $fetchJoinCollection = true);
   }
   
   public function getUserLikesCompleteInfo($userid, $order = 'asc', $limit = 10, $offset = 0){
       $q = $this->createQueryBuilder('u')
            ->leftJoin('u.role','r')->addSelect('r')
            ->leftJoin('u.tags','t')->addSelect('t')
            ->leftJoin('u.section','s')->addSelect('s')
            ->leftJoin('u.usersIFollow', 'uif')->addSelect('uif')
            ->leftJoin('u.usersFollowers', 'uf')->addSelect('uf')
            ->andWhere(':userid MEMBER OF u.usersFollowers')->setParameter('userid', $userid)
            ->orderBy('u.id',$order)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery();
       return new Paginator($q, $fetchJoinCollection = true);
   }
   
    
public function getUsersBySearch($keyWordsArray, $limit = 10, $offset = 0)
{
    $q = $this->createQueryBuilder('u');
    
    $tags = $this->getEntityManager()->getRepository('NoobTagBundle:Tag')->findByName($keyWordsArray);
    $i = 0;
    foreach($tags as $tag) {
        $q->andWhere('?'.$i.' MEMBER OF u.tags')->setParameter($i, $tag);
        $i++;
    }
    
    $q->leftJoin('u.section','s')->addSelect('s')
      ->leftJoin('u.role','r')->addSelect('r')
      ->leftJoin('u.usersFollowers','f')->addSelect('f')
      ->leftJoin('u.tags','t')->addSelect('t');
    
    
    if(count($keyWordsArray) != count($tags))
    {
        
        $roles = $this->getEntityManager()->getRepository('NoobUserBundle:Role')->findBySlug($keyWordsArray);

        $i = 0;
        $whereType = "";
        foreach($roles as $role)
        {
            if($i!=count($roles)-1){
                $whereType = $whereType. " r.id = :id".$i." OR ";
            } else {
                $whereType = $whereType. " r.id like :id".$i." ";
            }
            $q->setParameter('id'.$i, $role->getId());
            $i++;
        }
        if(!empty($roles))
        {
            $q->andWhere($whereType);
        }
        
        $i = 0;
        foreach($keyWordsArray as $tag){
            $q->orWhere('u.firstname like :name'.$i)->setParameter('name'.$i, '%'.$tag.'%');
            $q->orWhere('u.surname like :name'.$i)->setParameter('name'.$i, '%'.$tag.'%');
            $i++;
        }
    }
    
    $q->orderBy('u.role', 'asc')->addOrderBy('u.id', 'desc');
    $q->setFirstResult($offset)->setMaxResults($limit);
    return new Paginator($q, $fetchJoinCollection = true);
}
    
 public function getStudentsLookingForJobOrInternship($limit, $order = 'desc'){
    $q = $this
        ->createQueryBuilder('u')
        ->andWhere('u.lookingForJob = 1 OR u.lookingForInternship = 1')
        ->leftJoin('u.role', 'r')
            ->addSelect('r')
            ->where("r.slug like 'etudiant'")
        ->leftJoin('u.tags','t')
            ->addSelect('t')
        ->leftJoin('u.section','s')
            ->addSelect('s')
        ->leftJoin('u.usersFollowers','f')
            ->addSelect('f')
        ->orderBy('u.id',$order)
        ->setMaxResults($limit)
        ->getQuery();
    return new Paginator($q, $fetchJoinCollection = true);
}

/*
 *  getSomeUsers:
 *  get whatever users 
 *  limit: the maximum number of user to retrieve
 *  order: the order ('asc' or 'desc'), by default: 'desc'
 */
 public function getSomeUsers($limit, $order = 'desc'){
        $q = $this
            ->createQueryBuilder('u')
            ->leftJoin('u.role', 'r')
                ->addSelect('r')
            ->leftJoin('u.tags','t')
                ->addSelect('t')
            ->leftJoin('u.section','s')
                ->addSelect('s')
            ->leftJoin('u.usersFollowers','f')
                ->addSelect('f')
            ->orderBy('u.id',$order)
            ->setMaxResults($limit)
            ->getQuery();
        return new Paginator($q, $fetchJoinCollection = true);
}
    
    
    
    public function getUsersByMyTags($user, $limit = 10, $offset = 0){
        $q = $this->createQueryBuilder('u')
                  ->leftJoin('u.tags','t')->addSelect('t')
                  ->orderBy('u.id','desc')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit);
        $i = 0;
        foreach($user->getTags() as $tag) 
        {
            $q->orWhere('?'.$i.' MEMBER OF u.tags')->setParameter($i, $tag);
            $i++;
        }
        $q->andWhere(':userId NOT MEMBER OF u.usersFollowers')->setParameter('userId', $user->getId());
        $q->andWhere('u.id != :userId')->setParameter('userId', $user->getId());
        $paginator = new Paginator($q, $fetchJoinCollection = true);
        return $paginator;
    }
    
    
    
    
    
    
    // Fonctions utilisées pour l'authentification --------------------------------------------------------------------------------------------------- 
     
    public function loadCompleteUserMe($id){
        $q = $this
            ->createQueryBuilder('u')
            ->leftJoin('u.role', 'r')->addSelect('r')
            ->leftJoin('u.usersIFollow','if')
                ->addSelect('if')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        $user = $q->getSingleResult();
        return $user;
    }
    
    public function loadUserByUsername($username)
    {
        $q = $this
            ->createQueryBuilder('u')
            ->leftJoin('u.role', 'r')->addSelect('r')
            ->where('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery();

        try {
            // La méthode Query::getSingleResult() lance une exception
            // s'il n'y a pas d'entrée correspondante aux critères
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            throw new UsernameNotFoundException(sprintf('Unable to find an active admin AcmeUserBundle:User object identified by "%s".', $username), 0, $e);
        }
        return $user;
    }
    
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }
        return $this->loadCompleteUserMe($user->getId());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
    }
}