<?php

namespace Noob\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Noob\SiteBundle\CustomClass\PaginatorHelper;

use Symfony\Component\HttpFoundation\Response;

use Noob\UserBundle\Form\StudentParametersType;
use Noob\UserBundle\Entity\User;

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
    
    public function userInfoPageAction(){
        $user = $this->getUser();
        
        $form = $this->createForm(new StudentParametersType(), $user);
        $request = $this->getRequest();
        if($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if($form->isValid()) 
            {
                $user = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $user->setUpdatedAt(new \Datetime);
                $em->persist($user);
                $em->flush();
            }
        }
        return $this->render('NoobSiteBundle:DashBoard:userInfoPage.html.twig',array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
    
    public function editUserTagsAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $me = $em->getRepository('NoobUserBundle:User')->findOneById($this->getUser()->getId());
        $form = $this->createFormBuilder($me)
                ->add('tags', "hidden", array(
                        'mapped' => false,
                ))->add('save', 'submit')
        ->getForm();
        $tags = $me->getTags();
        
        $request = $this->getRequest();
        if($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if($form->isValid()) 
            {   
                $me = $form->getData();
                $me->setUpdatedAt(new \DateTime);
               
                $formTags = $form->get('tags')->getData();
                if(!empty($formTags)){
                    $formTags = explode(' ',$formTags);
                    $formTags = array_slice($formTags, 0,5);
                    $formTags = array_unique($formTags);
                    
                    foreach($tags as $t){
                        $me->removeTag($t);
                    }

                    $slugify = new \Noob\SiteBundle\CustomClass\Slugify();
                    foreach($formTags as $t){
                        $newTag = $em->getRepository('NoobTagBundle:Tag')->findOneByName($slugify->stringToSlug($t));
                        if(!$newTag){
                            $newTag = new \Noob\TagBundle\Entity\Tag;
                            $newTag->setName($slugify->stringToSlug($t));
                            $em->persist($newTag);
                        }
                        $me->addTag($newTag);
                    }
                }
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Vos changements ont été pris en compte'
                );
                
                $em->persist($me);
                $em->flush();
            }
        }
        
        
        return $this->render('NoobSiteBundle:DashBoard:editUserTags.html.twig',array(
            'user' => $me,
            'form' => $form->createView(),
        ));
    }
}
 