<?php

namespace Noob\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Noob\SiteBundle\CustomClass\PaginatorHelper;
use Symfony\Component\HttpFoundation\Response;

class DashBoardController extends Controller
{
    public function dashBoardIndexAction()
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $postRepo = $em->getRepository('NoobPostBundle:Post');
        $userRepo = $em->getRepository('NoobUserBundle:User');
        $commentRepo = $em->getRepository('NoobCommentBundle:Comment');
        $paginatorHelper = new PaginatorHelper();
        
        $list = $postRepo->getFriendsRecentPost($user, 10, 0);
        $recentsFriendsPost = $paginatorHelper->paginatorToArray($list);
        
        $list = $postRepo->getPostsByMyTags($user, 10, 0);
        $recentsPostLikeMyTags = $paginatorHelper->paginatorToArray($list);
        
        $list = $userRepo->getUsersByMyTags($user, 10, 0);
        $profils = $paginatorHelper->paginatorToArray($list);
        $profilsShuffle = array();
        foreach($profils as $profil){
            $profilsShuffle[] = $profil;
        }
        shuffle($profilsShuffle);
        
        $comments = $commentRepo->getLastCommentsFromUser($user->getId(), 10, 0);
        
        
        return $this->render('NoobSiteBundle:DashBoard:dashboardIndex.html.twig',array(
            'friendsPosts' => $recentsFriendsPost,
            'tagsPosts' => $recentsPostLikeMyTags,
            'profils' => $profilsShuffle,
            'comments' => $comments
        ));
    }
    
    public function getUserLastCommentAjaxAction(){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new Response();
        }
        $user = $this->getUser();
        if(!$user){
            return new Response();
        }
        $offset = intval($request->request->get("of"));
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobCommentBundle:Comment');
        $comments = $repository->getLastCommentsFromUser($user->getId(), 10, $offset);
        $response = $this->render('NoobSiteBundle:DashBoard:commentsListDashboard.html.twig', array(
                'comments' => $comments
            ))->getContent();
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    public function getUserFriendsPostsAjaxAction(){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new Response();
        }
        $user = $this->getUser();
        if(!$user){
            return new Response();
        }
        $offset = intval($request->request->get("of"));
        $em = $this->getDoctrine()->getManager();
        $postRepo = $em->getRepository('NoobPostBundle:Post');
        $paginatorHelper = new PaginatorHelper();
        $list = $postRepo->getFriendsRecentPost($user, 10, $offset);
        $recentsFriendsPost = $paginatorHelper->paginatorToArray($list);
        $response = $this->render('NoobSiteBundle:DashBoard:friendsPosts.html.twig', array(
                'friendsPosts' => $recentsFriendsPost
            ))->getContent();
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
}
 