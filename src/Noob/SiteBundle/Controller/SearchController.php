<?php

namespace Noob\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; 

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use Noob\SiteBundle\CustomClass\Slugify;
use Noob\SiteBundle\CustomClass\PaginatorHelper;

class SearchController extends Controller
{
    /*
     * searchContentAction: classic search, triggered by a navbar
     */
    public function searchContentAction()
    {
        $request = $this->getRequest(); 
        $searchString = $request->get('search');
        if(is_null($searchString))
        {
            return $this->redirect($this->generateUrl('noob_site_homepage'));
        }
        
        $searchString = explode(' ',$searchString);
        $originalSearchString = array();
        $Slugify = new Slugify();
        foreach($searchString as $key=>$keyword){
            if(strlen($keyword)){
                $searchString[$key] = $Slugify->stringToSlug($keyword);
                $originalSearchString[] = $keyword;
            }
        }
        
        
        $em = $this->getDoctrine()->getManager();
        $paginatorHelper = new PaginatorHelper();
        
        $userRepository = $em->getRepository('NoobUserBundle:User');
        $userList = $userRepository->getUsersBySearch($searchString);
        $userList = $paginatorHelper->paginatorToArray($userList);
        
        $postRepository = $em->getRepository('NoobPostBundle:Post');
        $postList = $postRepository->getPostsBySearch($searchString);
        $postList = $paginatorHelper->paginatorToArray($postList);
        
        return $this->render('NoobSiteBundle:Search:searchResultsLayout.html.twig', array(
            'userList' => $userList,
            'postList' => $postList,
            'recherche' => $originalSearchString,
        ));
    }
    
    /*
     * updateSearchAjaxAction: update the search in Ajax
     */
    public function updateSearchAjaxAction()
    {
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return new Response();
        }
        
        $searchString = $request->request->get("searchString");
        if(empty($searchString)){
            return new Response('',200, array('Content-Type'=>'application/json'));
        }
        
        $Slugify = new Slugify();
        foreach($searchString as $key=>$keyword){
            if(strlen($keyword)){
                $searchString[$key] = $Slugify->stringToSlug($keyword);
            }
        }
        $em = $this->getDoctrine()->getManager();
        $paginatorHelper = new PaginatorHelper();
        
        $userRepository = $em->getRepository('NoobUserBundle:User');
        $userList = $userRepository->getUsersBySearch($searchString);
        $userList = $paginatorHelper->paginatorToArray($userList);
        
        $postRepository = $em->getRepository('NoobPostBundle:Post');
        $postList = $postRepository->getPostsBySearch($searchString);
        $postList = $paginatorHelper->paginatorToArray($postList);
        
        $response = $this->render('NoobSiteBundle:Search:searchResultsDisplay.html.twig', array(
            'userList' => $userList,
            'postList' => $postList,
        ))->getContent();
        
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    
    /*
     * searchSeeMoreAjaxAction: load more content of a request
     */
    public function searchSeeMoreAjaxAction(){
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return new Response();
        }
        
        $searchString = $request->request->get("searchString");
        if(empty($searchString)){
            return new Response('',200, array('Content-Type'=>'application/json'));
        }
        
        
        $Slugify = new Slugify();
        foreach($searchString as $key=>$keyword){
            if(strlen($keyword)){
                $searchString[$key] = $Slugify->stringToSlug($keyword);
            }
        }
        
        $em = $this->getDoctrine()->getManager();
        $paginatorHelper = new PaginatorHelper();
        
        $offset = intval($request->request->get("of"));
        $type = intval($request->request->get("ty"));
        if($type == 0){
            $userRepository = $em->getRepository('NoobUserBundle:User');
            $userList = $userRepository->getUsersBySearch($searchString, 10, $offset);
            $userList = $paginatorHelper->paginatorToArray($userList);
        
            $response = $this->render('NoobSiteBundle:Search:seeMore.html.twig', array(
                'recordList' => $userList,
                'type' => 'user',
            ))->getContent();
        } elseif($type == 1){
            $postRepository = $em->getRepository('NoobPostBundle:Post');
            $postList = $postRepository->getPostsBySearch($searchString, 10, $offset);
            $postList = $paginatorHelper->paginatorToArray($postList);
            
            $response = $this->render('NoobSiteBundle:Search:seeMore.html.twig', array(
                'recordList' => $postList,
                'type' => 'post',
            ))->getContent();
        }
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
}
 