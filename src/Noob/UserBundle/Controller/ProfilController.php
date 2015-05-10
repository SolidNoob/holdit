<?php

namespace Noob\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response; 

use Noob\SiteBundle\CustomClass\PaginatorHelper;

class ProfilController extends Controller
{
    public function profilPageAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobUserBundle:User');
        $user = $repository->getFullUserBySlug($slug);
        if(!$user)
        {
            throw $this->createNotFoundException("Le profil recherché n'existe pas.");
        }
        
        $usersIFollow = array();
        foreach($user->getUsersIFollow() as $us){
            $usersIFollow[] = $us;
        }
        shuffle($usersIFollow);
        
        $usersFollowers = array();
        foreach($user->getUsersFollowers() as $us){
            $usersFollowers[] = $us;
        }
        shuffle($usersFollowers);
        
        $portfolioElements = $em->getRepository('NoobPostBundle:Post')->getUserFullPosts($user, 'portfolio');
        $postsLiked= $em->getRepository('NoobPostBundle:Post')->getUserProjectsLiked($user, 15);
        
        $randomPostsLiked = array();
        foreach($postsLiked as $p){
            $randomPostsLiked[] = $p;
        }
        shuffle($randomPostsLiked);
        
        if($user->getRole()->getSlug() == "entreprise")
        {
            $offres = $em->getRepository('NoobPostBundle:Post')->getUserOffres($user);
            return $this->render('NoobUserBundle:Profil:profilpage.html.twig', array(
                'user' => $user, 
                'portfolioElements'=>$portfolioElements,
                'postsLiked' =>$randomPostsLiked,
                'offres' => $offres,
                'usersIFollow' => $usersIFollow,
                'usersFollowers' => $usersFollowers,
            ));
        }
        else{
            $tfe = $em->getRepository('NoobPostBundle:Post')->getUserTfe($user);
            return $this->render('NoobUserBundle:Profil:profilpage.html.twig', array(
                'user' => $user, 
                'tfe' => $tfe,
                'portfolioElements'=>$portfolioElements,
                'postsLiked' =>$randomPostsLiked,
                'usersIFollow' => $usersIFollow,
                'usersFollowers' => $usersFollowers,
            ));
        }
    }
    
    public function followersPageAction($slug){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobUserBundle:User');
        $user = $repository->getFullUserBySlug($slug);
        if(!$user)
        {
            throw $this->createNotFoundException("Le profil recherché n'existe pas.");
        }
        $followersList = $repository->getUserFollowersCompleteInfo($user->getId(), 'asc', 10, 0);
        $paginatorHelper = new PaginatorHelper();
        $followersList = $paginatorHelper->paginatorToArray($followersList);
        return $this->render('NoobUserBundle:Profil:followersListPage.html.twig', array(
            'user' => $user, 
            'followersList' => $followersList,
        ));
    }
    
    public function followingsPageAction($slug){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobUserBundle:User');
        $user = $repository->getFullUserBySlug($slug);
        if(!$user)
        {
            throw $this->createNotFoundException("Le profil recherché n'existe pas.");
        }
        $followingsList = $repository->getUserFollowingCompleteInfo($user->getId(), 'asc', 10, 0);
        $paginatorHelper = new PaginatorHelper();
        $followingsList = $paginatorHelper->paginatorToArray($followingsList);
        return $this->render('NoobUserBundle:Profil:followingListPage.html.twig', array(
            'user' => $user, 
            'followingsList' => $followingsList,
        ));
    }
    
    public function likesPageAction($slug){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobUserBundle:User');
        $user = $repository->getFullUserBySlug($slug);
        if(!$user)
        {
            throw $this->createNotFoundException("Le profil recherché n'existe pas.");
        }
        $postRepo = $em->getRepository('NoobPostBundle:Post');
        $postsLiked = $postRepo->getUserLikesCompleteInfo($user->getId(), 'asc', 10, 0);
        $paginatorHelper = new PaginatorHelper();
        $postsLiked = $paginatorHelper->paginatorToArray($postsLiked);
        return $this->render('NoobUserBundle:Profil:likesListPage.html.twig', array(
            'user' => $user, 
            'postsLiked' => $postsLiked,
        ));
    }
    
    
    
    public function loadMorePortfolioAjaxAction(){
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return new Response();
        }
        $userid = intval($request->get('userid'));
        $offset = intval($request->request->get("of"));
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('NoobUserBundle:User')->findOneById($userid);
        if(!$user){
            return new Response();
        }
        $portfolioElements = $em->getRepository('NoobPostBundle:Post')->getUserFullPosts($user, 'portfolio',9,$offset);
        if(!$portfolioElements){
            return new Response(json_encode(false),200, array('Content-Type'=>'application/json'));
        }
        $response = $this->render('NoobPostBundle:Global:postsInProfilList.html.twig', array(
            'posts' => $portfolioElements,
        ))->getContent();
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    
    
    public function loadMoreOffreAjaxAction(){
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return new Response();
        }
        $userid = intval($request->get('userid'));
        $offset = intval($request->request->get("of"));
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('NoobUserBundle:User')->findOneById($userid);
        if(!$user){
            return new Response();
        }
        $offres = $em->getRepository('NoobPostBundle:Post')->getUserOffres($user, 9,$offset);
        if(!$offres){
            return new Response(json_encode(false),200, array('Content-Type'=>'application/json'));
        }
        $response = $this->render('NoobPostBundle:Global:postsInProfilList.html.twig', array(
            'posts' => $offres,
        ))->getContent();
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    
    
    public function getCompleteListAjaxAction($contentType){
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return false;
        }
        $itemid = $request->get('itemid');
        $offset = intval($request->request->get("of"));
        $em = $this->getDoctrine()->getManager();
        $userRepository = $em->getRepository('NoobUserBundle:User');
        $postRepository = $em->getRepository('NoobPostBundle:Post');
        $paginatorHelper = new PaginatorHelper();
        if($contentType == 'followers'){
            $recordList = $userRepository->getUserFollowersCompleteInfo($itemid, 'asc', 10, $offset);
            $recordList = $paginatorHelper->paginatorToArray($recordList);
            $itemType = 'user';
        } elseif($contentType == 'followings'){
            $recordList = $userRepository->getUserFollowingCompleteInfo($itemid, 'asc', 10, $offset);
            $recordList = $paginatorHelper->paginatorToArray($recordList);
            $itemType = 'user';
        } elseif($contentType == 'postsLiked'){
            $recordList = $postRepository->getUserLikesCompleteInfo($itemid, 'asc', 10, $offset);
            $recordList = $paginatorHelper->paginatorToArray($recordList);
            $itemType = 'post';
        } 
        $response = $this->render('NoobSiteBundle:Search:seeMore.html.twig', array(
            'recordList' => $recordList,
            'type' => $itemType
        ))->getContent();
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    
    
    public function followUserAction()
    {               
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return false;
        }
        
        $user = $this->getUser();
        if(!$user)
        {
            $data = array();
            $data['notConnected'] = true ;
            $data['title'] = "Information";
            $data['message'] = "Vous devez vous connecter pour suivre ce membre";
            return new Response(json_encode($data),200,array('Content-Type'=>'application/json'));
        }
        else
        {
            $userid = $request->get('userid');
            //l'utilisateur essaye de suivre son propre profil
            if($userid == $user->getId())
            {
                return new Response('Vous essayer de suivre votre propre profil...',500,array('Content-Type'=>'application/json'));
            }
            $em = $this->getDoctrine()->getManager();
            $userToFollow = $em->getRepository('NoobUserBundle:User')->findOneById($userid);
            if($userToFollow && $userToFollow != $user)
            {/*
                try {
                $user->addUsersIFollow($userToFollow);
                $em->persist($user);
                $em->flush();
                } catch (\Exception $e) {
                    //return new Response('Vous aimez déjà cette personne!',500,array('Content-Type'=>'application/json'));
                }
               */
                $usersIFollow = $user->getUsersIFollow();
                if($usersIFollow->contains($userToFollow)){
                    $user->removeUsersIFollow($userToFollow);
                    $action = false;
                } else {
                    $user->addUsersIFollow($userToFollow);
                    $action = true;
                }
                $em->persist($user);
                $em->flush();
            }
            $content = array('action' => $action);
            return new Response(json_encode($content),200,array('Content-Type'=>'application/json'));
        }
    }
    
    public function getFollowersAction(){
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return false;
        }
        $userid = $request->get('userid');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('NoobUserBundle:User')->findOneById($userid);
        $followersList = $user->getUsersFollowers();
        if(count($followersList) == 0){
            return new Response(null,200, array('Content-Type'=>'application/json'));
        }
        $response = $this->render('NoobUserBundle:Global:likersList.html.twig', array(
            'likersList' => $followersList
        ))->getContent();
        
        $data = array();
        $data['content'] =  $response;
        $data['title'] = $user->getFirstName();
        return new Response(json_encode($data),200, array('Content-Type'=>'application/json'));
    }
    
}
