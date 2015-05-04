<?php

namespace Noob\MessagerieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

use Noob\MessagerieBundle\Entity\Message;
use Noob\MessagerieBundle\Form\MessageType;


class MessageController extends Controller
{
    public function getNbUnreadMessageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $nbUnreadMessage = $em->getRepository('NoobMessagerieBundle:Message')->getNbUnreadMessage($user);
        return $this->render('NoobMessagerieBundle:Global:badgeUnseenMessages.html.twig',array(
            'nbUnreadMessage' => $nbUnreadMessage
        ));
    }
    
    public function messagerieIndexAction(){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('NoobMessagerieBundle:Message');
        
        $user = $this->getUser();
        
        $messages = $repo->getMessageByAuthor($user);
        return $this->render('NoobMessagerieBundle:Global:messagerieIndex.html.twig',array(
            'messages' => $messages
        ));
    }
    
    public function messagerieLoadAction(){
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
        $repository = $em->getRepository('NoobMessagerieBundle:Message');
        $messages = $repository->getMessageByAuthor($user, 20, $offset);
        $response = $this->render('NoobMessagerieBundle:Global:messagesTabRows.html.twig', array(
                'messages' => $messages
        ))->getContent();
        return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
    }
    
    public function deleteUserMessageAction($idMessage){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new Response();
        }
        $user = $this->getUser();
        if(!$user){
            return new Response();
        }
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobMessagerieBundle:Message');
        $message = $repository->findOneById(intval($idMessage));
        if(!$message){
            throw $this->createNotFoundException('Message introuvable');
        }
        if($message->getRecipient() == $user){
            $message->setIsDeletedRecipent(true);
        } elseif($message->getAuthor() == $user){
            $message->setIsDeletedAuthor(true);
        } else {
            throw $this->createNotFoundException('Impossible de supprimer ce message');
        }
        $em->persist($message);
        $em->flush();
        return new Response(json_encode(null),200, array('Content-Type'=>'application/json'));
    }
    
    public function readOneAction($idMessage){
        $user = $this->getUser();
        if(!$user){
            return new Response();
        }
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobMessagerieBundle:Message'); 
        $message = $repository->findOneBy(array('id'=>intval($idMessage), 'recipient'=>$user));
        if(!$message){
            throw $this->createNotFoundException('Message introuvable');
        }
        
        //automatically set isSeen on true if the message has not been seen yet
        if($message->getIsSeen() == false)
        {
            $message->setIsSeen(true);
            $em->persist($message);
            $em->flush();
        }
        
        $reply = new Message();
        $reply->setTitle('Re:'.$message->getTitle());
        $form = $this->createForm(new MessageType(), $reply);
        
        $request = $this->getRequest();
        if($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if($form->isValid()) 
            {
                $reply = $form->getData();
                $reply->setAuthor($user)->setRecipient($message->getAuthor())->setPubDate(new \Datetime)->setIsDeletedAuthor(0)->setIsDeletedRecipent(0)->setIsSeen(0);
                $em->persist($reply);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Le message a été envoyé'
                );
                
                return $this->redirect($this->generateUrl('noob_messagerie_index'));
            }
        }
        return $this->render('NoobMessagerieBundle:Global:readOne.html.twig',array(
            'message' => $message,
            'form' => $form->createView(),
        ));
    }
    
    public function sendOneAction($idRecipient){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $recipient =  $em->getRepository('NoobUserBundle:User')->findOneById($idRecipient);
        if(!$recipient || $idRecipient == $user->getId()){
            throw $this->createNotFoundException('Membre introuvable');
        }
        
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message);
        $request = $this->getRequest();
        if($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if($form->isValid()) 
            {
                $reply = $form->getData();
                $reply->setAuthor($user)->setRecipient($recipient)->setPubDate(new \Datetime)->setIsDeletedAuthor(0)->setIsDeletedRecipent(0)->setIsSeen(0);
                $em->persist($reply);
                $em->flush();
                 
                $this->get('session')->getFlashBag()->add(
                    'notice', 'Le message a été envoyé'
                );
                 
                return $this->redirect($this->generateUrl('noob_messagerie_index'));
            }
        }
        return $this->render('NoobMessagerieBundle:Global:sendOne.html.twig',array(
            'recipient' => $recipient,
            'form' => $form->createView(),
        ));
    }
}