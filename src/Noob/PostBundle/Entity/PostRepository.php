<?php
namespace Noob\PostBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

use Doctrine\ORM\Tools\Pagination\Paginator;

class PostRepository extends EntityRepository
{   
    public function getSimilarByTags($id,$tags, $type, $limit)
    {
        $query = $this->createQueryBuilder('p');
            $i = 1;
            foreach($tags as $tag) {
                $query->andWhere('?'.$i.' MEMBER OF p.tags')->setParameter($i, $tag);
                $i++;
            }
            $query->leftJoin('p.tags', 't')
                ->leftJoin('p.author', 'a')
                ->addSelect('t')
                ->addSelect('a')
                ->orderBy('p.pubDate', 'desc')
                ->leftJoin('p.type', 'ty')
                ->andWhere('ty.name = :type')->setParameter('type', $type)
                ->addSelect('ty')
                ->andWhere('p.id != :id')->setParameter('id', $id);
            $query->setMaxResults($limit); //var_dump($query->getQuery()->getResult());
            $paginator = new Paginator($query, $fetchJoinCollection = true);
            return $paginator;
    }
    
    public function getUserTfe($user){
        $q = $this->createQueryBuilder('p')
                ->leftJoin('p.author','a')
                ->leftJoin('p.type','t')
                ->where('a.id = :authorId')->setParameter('authorId', $user->getId())
                ->andWhere('t.name = :name')->setParameter('name', 'tfe');
        try {
            return $q->getQuery()->getSingleResult();
        }
        catch(\Doctrine\ORM\NoResultException $e){
            return null;
        }
    }
    
    public function getNextTfeByDate($limit = 10, $order = 'desc'){
        $q = $this->createQueryBuilder('p')
                    ->leftJoin('p.type', 'ty')
                    ->andWhere('ty.name like :type')->setParameter('type', 'tfe')
                    ->addSelect('ty')
                  ->leftJoin('p.author','a')
                    ->addSelect('a')
                  ->leftJoin('p.tags', 't')
                    ->addSelect('t')
                  ->leftJoin('p.likers','l')
                    ->addSelect('l')
                  ->orderBy('p.pubDate',$order)
                  ->setMaxResults($limit);
        return new Paginator($q, $fetchJoinCollection = true);
    }
    
    /*  getOneByFullSlug: retourne un post en fonction de son id ET de son slug.
     *  Utilisation de jointure pour retourner en une seule requête:
     *  > le post (table post)
     *  > ses tags (table tag)
     *  > son auteur (table user)
     *  > les tags de son auteur (table tag)
     *  27/12/2014 18:13:   Doctrine roxxx!
     */
    public function getOneByFullSlug($id, $slug, $type)
    {
        $q = $this->createQueryBuilder('p')
                  ->where('p.id = :id')->setParameter('id', $id)
                  ->andWhere('p.slug like :slug')->setParameter('slug', $slug)
                  ->leftJoin('p.type', 'ty')
                  ->andWhere('ty.name like :type')->setParameter('type', "%".$type."%")
                  ->addSelect('ty')
                  ->leftJoin('p.tags','pt')
                  ->addSelect('pt')
                  ->leftJoin('p.author','a')
                  ->addSelect('a')
                  ->leftJoin('a.role', 'r')
                  ->addSelect('r')
                  ->leftJoin('a.section','s')
                  ->addSelect('s')
                  //->leftJoin('p.likers','l')
                  //->addSelect('l')
                // this take much longer, best to do another query to get comments...
                  //->leftJoin('p.comments','c')
                  //->addSelect('c')
                  //->leftJoin('a.usersFollowers', 'f')
                  //->addSelect('f')
                  ->leftJoin('a.tags','at')
                  ->addSelect('at');
        //var_dump($q->getQuery()->getSingleResult());
        return $q->getQuery()->getSingleResult();
    }
    
    
    public function getCompletePortfolioByAuthor($author)
    {
        $q = $this->createQueryBuilder('p')
                    ->leftJoin('p.type', 'ty')
                    ->andWhere('ty.name like :type')->setParameter('type', 'portfolio')
                    ->addSelect('ty')
                  ->andWhere('p.author = :author')->setParameter('author', $author);
        return $q->getQuery()->getResult();
    }
    
    
   public function getUserProjectsLiked($user, $limit){
       $q = $this->createQueryBuilder('p')
                 ->leftJoin('p.likers','l')
                 ->leftJoin('p.type','t')
                 ->addSelect('t')
                 ->where('l= :author')->setParameter('author', $user)
                 ->addOrderBy('p.pubDate','DESC');
       $q->setMaxResults($limit); 
       return $q->getQuery()->getResult();
   }
   
   public function getUserLikesCompleteInfo($userid, $order = 'asc', $limit = 10, $offset = 0){
       $q = $this->createQueryBuilder('p')
            ->leftJoin('p.tags','t')->addSelect('t')
            ->leftJoin('p.likers','l')->addSelect('l')
            ->leftJoin('p.author','a')->addSelect('a')
            ->leftJoin('p.type','ty')->addSelect('ty')
            ->andWhere(':userid MEMBER OF p.likers')->setParameter('userid', $userid)
            ->orderBy('p.id',$order)
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery();
       return new Paginator($q, $fetchJoinCollection = true);
   }
    
    /*
     * getPostsBySearch
     */
    public function getPostsBySearch($keyWordsArray, $limit = 10, $offset = 0){
        $query = $this->createQueryBuilder('p');
        
        //searching in DB for tag that really exist
        $tags = $this->getEntityManager()->getRepository('NoobTagBundle:Tag')->findByName($keyWordsArray);
        
        //if every key words weren't really tags in DB: we have to search by type
        if(count($keyWordsArray) != count($tags))
        {
            $types = $this->getEntityManager()->getRepository('NoobPostBundle:Type')->findByName($keyWordsArray);
            
            $i = 0;
            $whereType = "";
            foreach($types as $type)
            {
                if($i!=count($types)-1){
                    $whereType = $whereType. " ty.id = :id".$i." OR ";
                } else {
                    $whereType = $whereType. " ty.id like :id".$i." ";
                }
                $query->setParameter('id'.$i, $type->getId());
                $i++;
            }
            if(!empty($types))
            {
                $query->andWhere($whereType);
            }
        }
        
        //getting the posts linked with tags retrieved from the db
        $i = 1;
        foreach($tags as $tagObj) 
        {
            $query->andWhere('?'.$i.' MEMBER OF p.tags')->setParameter($i, $tagObj);
            $i++;
        }
        
        //doing some join to dodge too many queries
        $query->leftJoin('p.tags', 't')->addSelect('t')
              ->leftJoin('p.author', 'a')->addSelect('a')
              ->leftJoin('p.type','ty')->addSelect('ty')
              ->leftJoin('p.likers','li')->addSelect('li')
              ->orderBy('p.type', 'asc')->addOrderBy('p.id', 'desc');
        
        //finally, getting the post that have key words in their name
        $i = 0;
        foreach($keyWordsArray as $tag){
            $query->orWhere('p.name like :name'.$i)->setParameter('name'.$i, '%'.$tag.'%');
            $i++;
        }
        
        $query->setFirstResult($offset)->setMaxResults($limit);
        return new Paginator($query, $fetchJoinCollection = true);
    }
    
    public function getUserFullPosts($user, $postType,$limit = 9, $offset = 0){
        $q = $this->createQueryBuilder('p')
                  ->where('p.author = :user')
                        ->setParameter('user', $user)
                    ->leftJoin('p.type', 'ty')
                    ->andWhere('ty.name = :postType')->setParameter('postType', $postType)
                    ->addSelect('ty')
                    ->orderBy('p.id',"desc");
        $q->setFirstResult($offset)->setMaxResults($limit);
        //return new Paginator($q, $fetchJoinCollection = true);
        return $q->getQuery()->getResult();
    }
    
    
    public function getPostsByType($type, $limit = 10, $order = 'desc'){
        $q = $this->createQueryBuilder('p')
                    ->leftJoin('p.type', 'ty')
                    ->andWhere('ty.name like :type')->setParameter('type', $type)
                    ->addSelect('ty')
                  ->leftJoin('p.author','a')
                    ->addSelect('a')
                  ->leftJoin('p.tags', 't')
                    ->addSelect('t')
                  ->leftJoin('p.likers','l')
                    ->addSelect('l')
                  ->orderBy('p.id',$order)
                  ->setMaxResults($limit);
        return new Paginator($q, $fetchJoinCollection = true);
    }
    
    public function getFriendsRecentPost($user, $limit = 10, $offset = 0){
        $usersIFollowIds = array();
        foreach($user->getUsersIFollow() as $friend){
            $usersIFollowIds[] = $friend->getId();
        }
        //var_dump($usersIFollowIds);
        
        $q = $this->createQueryBuilder('p')
                  ->where('p.author IN (:usersIFollowIds)')->setParameter('usersIFollowIds', $usersIFollowIds)
                  ->leftJoin('p.tags','t')
                  ->addSelect('t')
                  ->leftJoin('p.type','ty')->addSelect('ty')
                  ->orderBy('p.pubDate','desc')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit);
        $paginator = new Paginator($q, $fetchJoinCollection = true);
        //var_dump($q->getQuery()->getDQL());
        return $paginator;
    }
    
    public function getPostsByMyTags($user, $limit = 10, $offset = 0){
        $q = $this->createQueryBuilder('p')
                  ->leftJoin('p.tags','t')->addSelect('t')
                  ->leftJoin('p.author','a')->addSelect('a')
                  ->leftJoin('p.type','ty')->addSelect('ty')
                  ->orderBy('p.pubDate','desc')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit);
        $i = 0;
        foreach($user->getTags() as $tag) 
        {
            $q->orWhere('?'.$i.' MEMBER OF p.tags')->setParameter($i, $tag);
            $i++;
        }
        $q->andWhere('p.author != :userId')->setParameter('userId', $user->getId());
        $paginator = new Paginator($q, $fetchJoinCollection = true);
        return $paginator;
    }
    
    public function getUserOffres($author,$limit = 9, $offset = 0){
        $q = $this->createQueryBuilder('p')
                  ->where('p.author = :author')->setParameter('author', $author)
                  ->leftJoin('p.type', 'ty')
                  ->andWhere('ty.name like :offre')->setParameter('offre', '%offre%')
                  ->addSelect('ty')
                  ->orderBy('p.id','desc');
        $q->setFirstResult($offset)->setMaxResults($limit);
        return $q->getQuery()->getResult();
    }
    
    
    
    
    /*----------------- <WTF why here???> ------------------------------------------------*/
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
    /*----------------- </WTF why here???> ------------------------------------------------*/
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //public function getPostsByTags($tagArray)
    //{
        /*
        $query = $this->createQueryBuilder('p');
        $i = 0;
        foreach($tagArray as $tag)
        {
            $query->leftJoin('p.tags','t'.$i)
                  ->andWhere('t'.$i.'.name like :tag'.$i)
                  ->setParameter('tag'.$i, '%'.$tag.'%');
            $i++;
        }
        $query->leftJoin('p.author','a')
              ->leftJoin('p.tags','t'.$i)
              ->addSelect('t'.$i)
              ->addSelect('a')
              ->orderBy('p.type', 'asc');
        var_dump($query->getQuery()->getDQL());
        return $query->getQuery()->getResult();
        */
        
        /*
        $query = $this->createQueryBuilder('p')
                ->leftJoin('p.tags','t')
                ->where('t.name like :tag')
                    ->setParameter('tag', $tag)
                ->orWhere('p.name like :percent_tag')
                    ->setParameter(':percent_tag','%'.$tag.'%')
                ->leftJoin('p.author','a')
                ->leftJoin('p.tags','t2')
                ->addSelect('t2')
                ->addSelect('a')
                ->getQuery(); 
         */
    
         /*
         var_dump($query->getQuery()->getDQL());
        return $query->getQuery()->getResult();
          * 
          */
          
        /*
        $i = 1;
        $tagObjects = $this->getEntityManager()->getRepository('NoobTagBundle:Tag')->findByName($tagArray); //This is case-insensitive by default
        var_dump($tagObjects);
        if(!empty($tagObjects))
        {
            $query = $this->createQueryBuilder('p');
            foreach($tagObjects as $tagObj) {
                $query->andWhere('?'.$i.' MEMBER OF p.tags')->setParameter($i, $tagObj);
                $i++;
            }
            $query->leftJoin('p.tags', 't')
                ->leftJoin('p.author', 'a')
                ->addSelect('t')
                ->addSelect('a')
                ->orderBy('p.type', 'asc'); 
            return $query->getQuery()->getResult();
        }
        else
        {
            return null;
        }
         */
        
        /*
    
        $i = 1;
        $tags = $this->getEntityManager()->getRepository('NoobTagBundle:Tag')->findByName($tagArray);
        var_dump($tags);
        if(!empty($tags))
        {
            $autoTags = array();
            $classicTags = array();
            foreach($tags as $tag)
            {
                if($tag->getIsAuto())
                {
                    $autoTags[] = $tag;
                }
                else
                {
                    $classicTags[] = $tag;
                }
            }
            $query = $this->createQueryBuilder('p');
            foreach($classicTags as $tagObj) {
                $query->andWhere('?'.$i.' MEMBER OF p.tags')->setParameter($i, $tagObj);
                $i++;
            }
            $query->leftJoin('p.tags', 't')
                ->leftJoin('p.author', 'a')
                ->addSelect('t')
                ->addSelect('a')
                ->orderBy('p.type', 'asc'); 
            if(!empty($autoTags))
            {
                $i = 0;
                $whereType = "";
                foreach($autoTags as $type)
                {
                    if($i!=count($autoTags)-1)
                    {
                        $whereType = $whereType. " p.type like :type".$i." OR ";
                    }
                    else
                    {
                        $whereType = $whereType. " p.type like :type".$i." ";
                    }
                    $query->setParameter('type'.$i, $type->getName());
                    $i++;
                }
                $query->andWhere($whereType);
            }
            var_dump($query->getQuery()->getDQL());
            return $query->getQuery()->getResult();
        }
        else
        {
            return null;
        }
         */
    //}
}