<?php

namespace Noob\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Noob\PostBundle\Form\OffreType;
use Noob\PostBundle\Entity\Post;

class OffreController extends Controller
{
    public function detailAction($id,$slug)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('NoobPostBundle:Post');
        
        $offre = $repository->getOneByFullSlug($id,$slug, 'offre');
        $tags = $offre->getTags();
        $type = $offre->getType()->getName();
        $otherOffres = $repository->getSimilarByTags($id,$tags,$type,10);
        $tmp_array = array();
        foreach($otherOffres as $off){
            $tmp_array[] = $off;
        }
        shuffle($tmp_array);
        return $this->render('NoobPostBundle:Offre:offreDetail.html.twig', array(
                'item' => $offre,
                'otherItems' => $tmp_array,
        ));
    }
    
    
    public function insertUserOffreAction(){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new \Symfony\Component\HttpFoundation\Response();
        }
        $user = $this->getUser();
        if($user->getRole()->getSlug() != 'entreprise'){
            return new \Symfony\Component\HttpFoundation\Response();
        }
        $post = new Post();
        foreach($user->getTags() as $t){
            $post->addTag($t);
        }
        $form = $this->createForm(new OffreType(), $post);
        if($request->isXmlHttpRequest()) 
        {
            $form->handleRequest($request);
            if($form->isSubmitted())
            {
                if($form->isValid())
                {
                    $post = $form->getData();
                    if($post->getType()->getName() != 'offrestage' &&  $post->getType()->getName() != 'offreemploi'){
                        return new \Symfony\Component\HttpFoundation\Response();
                    }
                    $post->setAuthor($user);
                    $formTags = $form->get('tags')->getData();
                    if(empty($formTags))
                    {
                        $this->get('session')->getFlashBag()->add('bad-notice',"Vous devez choisir au moins un tag.");
                        $response = $this->render('NoobPostBundle:Form:offre.html.twig',array(
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
        $response = $this->render('NoobPostBundle:Form:offre.html.twig',array(
            'post' => $post,
            'form' => $form->createView(),
        ))->getContent();
        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    
    
    public function updateUserOffreAction($postId){
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
        $form = $this->createForm(new OffreType(), $post);
        if($request->isXmlHttpRequest()) 
        {
            $form->handleRequest($request);
            if($form->isSubmitted())
            {
                if($form->isValid())
                {
                    $post = $form->getData();
                    if($post->getType()->getName() != 'offrestage' &&  $post->getType()->getName() != 'offreemploi'){
                        return new \Symfony\Component\HttpFoundation\Response();
                    }
                    $formTags = $form->get('tags')->getData();
                    if(empty($formTags))
                    {
                        $this->get('session')->getFlashBag()->add('bad-notice',"Vous devez choisir au moins un tag.");
                        $response = $this->render('NoobPostBundle:Form:offreEdit.html.twig',array(
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
        $response = $this->render('NoobPostBundle:Form:offreEdit.html.twig',array(
            'post' => $post,
            'form' => $form->createView(),
        ))->getContent();
        return new \Symfony\Component\HttpFoundation\Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
}
