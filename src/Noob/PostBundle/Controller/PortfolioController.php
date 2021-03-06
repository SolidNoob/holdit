<?php

namespace Noob\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noob\PostBundle\Form\PortfolioType;
use Noob\PostBundle\Entity\Post;

class PortfolioController extends Controller
{
    public function detailAction($id,$slug)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('NoobPostBundle:Post');
        
        $mainItem = $repository->getOneByFullSlug($id,$slug, 'portfolio');
        $author = $mainItem->getAuthor();
        $otherItems = $repository->getCompletePortfolioByAuthor($author);
        
        foreach($otherItems as $key=>$project){
            
            if($project->getId() == $mainItem->getId()){
                $current = $key;
                $previous = ($current == 0)? null: $key-1;
                $next = ($current == count($otherItems)-1)? null:$key+1;
                unset($otherItems[$current]);
                break;
            }
        }
        return $this->render('NoobPostBundle:Portfolio:portfolioDetail.html.twig', array(
                'item' => $mainItem,
                'otherItems' => $otherItems,
                'previousItem' => $previous,
                'nextItem' => $next,
        ));
    }
    
    public function insertUserPortfolioAction(){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new \Symfony\Component\HttpFoundation\Response();
        }
        $post = new Post();
        $user = $this->getUser();
        foreach($user->getTags() as $t){
            $post->addTag($t);
        }
        $form = $this->createForm(new PortfolioType(), $post);
        if($request->isXmlHttpRequest()) 
        {
            $form->handleRequest($request);
            if($form->isSubmitted())
            {
                if($form->isValid())
                {
                    $post = $form->getData();
                    $post->setAuthor($user);
                    $formTags = $form->get('tags')->getData();
                    if(empty($formTags))
                    {
                        $this->get('session')->getFlashBag()->add('bad-notice',"Vous devez choisir au moins un tag.");
                        $response = $this->render('NoobPostBundle:Form:portfolio.html.twig',array(
                            'post' => $post,
                            'form' => $form->createView(),
                        ))->getContent();
                        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
                    }
                    else
                    {
                        $em = $this->getDoctrine()->getManager();
                        $formTags = explode(' ',$formTags);
                        $formTags = array_slice($formTags, 0,5);
                        $formTags = array_unique($formTags);
                        $slugify = new \Noob\SiteBundle\CustomClass\Slugify();
                        foreach($post->getTags() as $t){
                            $post->removeTag($t);
                        }
                        foreach($formTags as $t){
                            $newTag = $em->getRepository('NoobTagBundle:Tag')->findOneByName($slugify->stringToSlug($t));
                            if(!$newTag){
                                $newTag = new \Noob\TagBundle\Entity\Tag;
                                $newTag->setName($slugify->stringToSlug($t));
                                $em->persist($newTag);
                            }
                            $post->addTag($newTag);
                        }
                        $post->setPubDate(new \Datetime)->setUpdatedAt(new \Datetime);
                        $type = $em->getRepository('NoobPostBundle:Type')->findOneByName('portfolio');
                        $post->setType($type);
                        $post->setSlug($slugify->stringToSlug($post->getName()));
                        $em->persist($post);
                        $em->flush();

                        $logger = $this->get('logger');
                        $logger->info('A post [ID:'.$post->getId().'] [Title:'.$post->getName().']has been posted by the following IP:'.$this->get('request')->getClientIp());

                        //$this->get('session')->getFlashBag()->add('notice',"L'élément a été ajouté.");
                        $response = array();
                        $response['view'] = $this->render('NoobPostBundle:Global:postsInProfil.html.twig', array(
                            'project' => $post
                        ))->getContent();
                        $response['status'] = "added";
                        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
                    }
                }
            }
        }
        $response = $this->render('NoobPostBundle:Form:portfolio.html.twig',array(
            'post' => $post,
            'form' => $form->createView(),
        ))->getContent();
        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    
    public function updateUserPortfolioAction($postId){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new \Symfony\Component\HttpFoundation\Response(json_encode(false),500, array('Content-Type'=>'application/json'));
        }
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('NoobPostBundle:Post')->findOneById(intval($postId));
        $user = $this->getUser();
        if(!$post || $post->getAuthor() != $user){
            return new \Symfony\Component\HttpFoundation\Response(json_encode(false),500, array('Content-Type'=>'application/json'));
        }
        
        $form = $this->createForm(new PortfolioType(), $post);
        if($request->isXmlHttpRequest()) 
        {
            $form->handleRequest($request);
            if($form->isSubmitted())
            {
                if($form->isValid())
                {
                    $post = $form->getData();
                    $formTags = $form->get('tags')->getData();
                    if(empty($formTags))
                    {
                        $this->get('session')->getFlashBag()->add('bad-notice',"Vous devez choisir au moins un tag.");
                        $response = $this->render('NoobPostBundle:Form:portfolioEdit.html.twig',array(
                            'post' => $post,
                            'form' => $form->createView(),
                        ))->getContent();
                        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
                    }
                    else
                    {
                        $em = $this->getDoctrine()->getManager();
                        $formTags = explode(' ',$formTags);
                        $formTags = array_slice($formTags, 0,5);
                        $formTags = array_unique($formTags);
                        $slugify = new \Noob\SiteBundle\CustomClass\Slugify();
                        foreach($post->getTags() as $t){
                            $post->removeTag($t);
                        }
                        foreach($formTags as $t){
                            $newTag = $em->getRepository('NoobTagBundle:Tag')->findOneByName($slugify->stringToSlug($t));
                            if(!$newTag){
                                $newTag = new \Noob\TagBundle\Entity\Tag;
                                $newTag->setName($slugify->stringToSlug($t));
                                $em->persist($newTag);
                            }
                            $post->addTag($newTag);
                        }
                        $post->setPubDate(new \Datetime)->setUpdatedAt(new \Datetime);
                        $post->setSlug($slugify->stringToSlug($post->getName()));
                        $em->persist($post);
                        $em->flush();

                        $response = array();
                        $response['view'] = $this->render('NoobPostBundle:Global:postsInProfil.html.twig', array(
                            'project' => $post
                        ))->getContent();
                        $response['status'] = "updated";
                        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
                    }
                }
            }
        }
        $response = $this->render('NoobPostBundle:Form:portfolioEdit.html.twig',array(
            'post' => $post,
            'form' => $form->createView(),
        ))->getContent();
        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
}
