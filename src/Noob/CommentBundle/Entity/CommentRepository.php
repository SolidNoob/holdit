<?php
namespace Noob\CommentBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

use Doctrine\ORM\Tools\Pagination\Paginator;

class CommentRepository extends EntityRepository
{   
    /*
    public function getPostCommentsAndAuthor ($post, $limit, $offset){
        $q = $this->createQueryBuilder('c')
                  ->leftJoin('c.post', 'p')
                  ->where('p = :post')->setParameter('post', $post)
                  ->leftJoin('c.author','a')
                  ->addSelect('a')
                  ->orderBy('c.pubDate', 'desc')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit);
        return $q->getQuery()->getResult();
    }
    */
    
    
    public function getPostComments($postId, $limit = 10, $offset = null){
        $q = $this->createQueryBuilder('c')
                  ->where('c.post = :id')->setParameter('id', $postId)
                  ->orderBy('c.pubDate', 'desc')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit);
        return $q->getQuery()->getResult();
    }
    
    public function getLastCommentsFromUser($userId, $limit = 10, $offset = null){
        $q = $this->createQueryBuilder('c')
                  ->where('c.author = :id')->setParameter('id', $userId)
                  ->andWhere('c.isActive = 1')
                  ->orderBy('c.pubDate', 'desc')
                  ->leftJoin('c.post','p')->addSelect('p')
                  ->leftJoin('p.type','t')->addSelect('t')
                  ->setFirstResult($offset)
                  ->setMaxResults($limit);
        return $q->getQuery()->getResult();
    }
}