<?php

namespace Noob\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response; 

class GlobalController extends Controller
{
    /*
     *  like en ajax
     */
    public function likeAction()
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
            $data['message'] = "Vous devez vous connecter pour aimer ce contenu";
            return new Response(json_encode($data),200,array('Content-Type'=>'application/json'));
        }
        else
        {
            $postid = $request->get('postid');
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository('NoobPostBundle:Post')->findOneById($postid);
            if($post)
            {
                $postsLiked = $user->getPostsLiked();
                $alreadyLiked = false;
                foreach($postsLiked as $p){
                    if($p->getId() == $post->getId()){
                        $alreadyLiked = true;
                        break;
                    }
                }
                if($alreadyLiked == false){
                    $user->addPostsLiked($post);
                    $action = 1;
                } else {
                    $user->removePostsLiked($post);
                    $action = 0;
                }
                $em->persist($user);
                $em->flush();
                $content = array('action' => $action);
                return new Response(json_encode($content),200,array('Content-Type'=>'application/json'));
            }
        }
        $content = 'Erreur';
        return new Response(json_encode($content),500,array('Content-Type'=>'application/json'));
    }
    
    
    
    public function getLikersAction(){
        $request = $this->container->get('request');
        if(!$request->isXmlHttpRequest())
        {
            return false;
        }
        $postid = $request->get('postid');
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('NoobPostBundle:Post')->findOneById($postid);
        $likersList = $post->getLikers();
        if(count($likersList) == 0){
            return new Response(null,200, array('Content-Type'=>'application/json'));
        }
        $response = $this->render('NoobUserBundle:Global:likersList.html.twig', array(
            'likersList' => $likersList
        ))->getContent();
        
        $data = array();
        $data['content'] =  $response;
        $data['title'] = $post->getName();
        return new Response(json_encode($data),200, array('Content-Type'=>'application/json'));
    }
}
