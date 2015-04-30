<?php

namespace Noob\TagBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response; 

class TagController extends Controller
{
    public function getSuggestionsAjaxAction()
    {
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return false;
        }
        
        $searchString = $request->get('searchString');
        if(strlen($searchString) < 2){
            $tags = null;
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                    'SELECT t
                    FROM NoobTagBundle:Tag t
                    WHERE t.name like :name
                    ORDER BY t.name ASC')
                    ->setParameter('name', '%'.$searchString.'%')
                    ->setMaxResults(10) ;
            $tags = $query->getResult();
        }
        $response = $this->render('NoobTagBundle:Tag:tagSuggestion.html.twig',array('tagList'=>$tags))->getContent();
        
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
}
