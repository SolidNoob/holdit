<?php

namespace Noob\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noob\PostBundle\Form\TfeType;
use Noob\PostBundle\Entity\Post;

use Noob\SiteBundle\CustomClass\PaginatorHelper;
class TfeController extends Controller
{
    //getSimilarByTags($id,$tags, $type, $limit)
    
    public function detailAction($id,$slug)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('NoobPostBundle:Post');
        $paginatorHelper = new PaginatorHelper();
        
        $mainItem = $repository->getOneByFullSlug($id,$slug, 'tfe');
        $otherItems = $repository->getSimilarByTags($mainItem->getId(),$mainItem->getTags(), 'tfe', 3);
        $otherItems = $paginatorHelper->paginatorToArray($otherItems);
        
        return $this->render('NoobPostBundle:Tfe:tfeDetail.html.twig', array(
                'item' => $mainItem,
                'otherItems' => $otherItems,
        ));
    }
    
    
    
    
    public function updateUserTfeAction($postId){
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
        
        $form = $this->createForm(new TfeType(), $post);
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
                        $response = $this->render('NoobPostBundle:Form:tfeEdit.html.twig',array(
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
                        $post->setSlug($slugify->stringToSlug($post->getName()))->setUpdatedAt(new \Datetime);
                        $em->persist($post);
                        $em->flush();

                        $response = array();
                        $response['view'] = $this->render('NoobPostBundle:Tfe:tfeInProfil.html.twig', array(
                            'tfe' => $post
                        ))->getContent();
                        $response['status'] = "updated";
                        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
                    }
                }
            }
        }
        $response = $this->render('NoobPostBundle:Form:tfeEdit.html.twig',array(
            'post' => $post,
            'form' => $form->createView(),
        ))->getContent();
        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    
    public function insertUserTfeAction(){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new \Symfony\Component\HttpFoundation\Response();
        }
        $post = new Post();
        $user = $this->getUser();
        if($user->getRole()->getSlug() != "etudiant"){
            return new \Symfony\Component\HttpFoundation\Response();
        }
        $em = $this->getDoctrine()->getManager();
        $alreadyTfe = $em->getRepository('NoobPostBundle:Post')->getUserTfe($user);
        if($alreadyTfe){
            return new \Symfony\Component\HttpFoundation\Response();
        }
        foreach($user->getTags() as $t){
            $post->addTag($t);
        }
        $form = $this->createForm(new TfeType(), $post);
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
                        $response = $this->render('NoobPostBundle:Form:tfe.html.twig',array(
                            'post' => $post,
                            'form' => $form->createView(),
                        ))->getContent();
                        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
                    }
                    else
                    {
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
                        $type = $em->getRepository('NoobPostBundle:Type')->findOneByName('tfe');
                        $post->setType($type);
                        $post->setSlug($slugify->stringToSlug($post->getName()))->setUpdatedAt(new \Datetime);;
                        $em->persist($post);
                        $em->flush();

                        $logger = $this->get('logger');
                        $logger->info('A post [ID:'.$post->getId().'] [Title:'.$post->getName().']has been posted by the following IP:'.$this->get('request')->getClientIp());

                        //$this->get('session')->getFlashBag()->add('notice',"L'élément a été ajouté.");
                        $response = array();
                        $response['view'] = $this->render('NoobPostBundle:Tfe:tfeInProfil.html.twig', array(
                            'tfe' => $post
                        ))->getContent();
                        $response['status'] = "added";
                        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
                    }
                }
            }
        }
        $response = $this->render('NoobPostBundle:Form:tfe.html.twig',array(
            'post' => $post,
            'form' => $form->createView(),
        ))->getContent();
        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
}
