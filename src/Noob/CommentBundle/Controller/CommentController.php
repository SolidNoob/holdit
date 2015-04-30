<?php
namespace Noob\CommentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

use Noob\CommentBundle\Entity\Comment;

use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;

class CommentController extends Controller
{
    public function getCommentsListAction($postId){
        $em = $this->getDoctrine()->getManager();
        $commentRepo = $em->getRepository('NoobCommentBundle:Comment');
        
        $offset = 0;
        $postId = intval($postId);
        
        $request = $this->container->get('request');
        if($request->isXmlHttpRequest())
        {
            $offset = intval($request->request->get("of"));
        }
        
        $commentsList = $commentRepo->getPostComments($postId, 10, $offset);
        
        if($request->isXmlHttpRequest())
        {
            $response = array();
            if(!$commentsList){
                $response['stillrecord'] = false;
            } else {
                $response['stillrecord'] = true;
            }
            $response['response'] = $this->render('NoobCommentBundle:Global:commentsList.html.twig', array(
                'commentsList' => $commentsList
            ))->getContent();
            return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
        }
        return $this->render('NoobCommentBundle:Global:commentsList.html.twig', array(
            'commentsList' => $commentsList
        ));
    }
    
    public function createCommentAction($postId)
    {
        
        $request = $this->container->get('request');
        $user = $this->getUser();
        
        $comment = new Comment();
        $form = $this->createFormBuilder($comment)
            ->add('content', 'textarea')
            ->add('recaptcha', 'ewz_recaptcha', array(
                'attr'        => array(
                    'options' => array(
                        'theme' => 'light',
                        'type'  => 'image'
                    )
                ),
                'mapped'      => false,
                'constraints' => array(
                    new True()
                )
            ))
            ->add('save', 'submit')
            ->getForm();
        
        if($user)
        { 
            $request = $this->getRequest();
            $form->handleRequest($request);

            if($form->isValid()) 
            {
                if(!$request->isXmlHttpRequest())
                {
                    return new Response();
                }
            
                $em = $this->getDoctrine()->getManager();
                $postRepo = $em->getRepository('NoobPostBundle:Post');
                $post = $postRepo->findOneById($postId);
                if (!$post) {
                    return new Response();
                }
                $comment->setPubDate(new \DateTime);
                $comment->setAuthor($user);
                $comment->setIsActive(1);
                $comment->setPost($post);
                $em->persist($comment);
                $em->flush();
                
                $logger = $this->get('logger');
                $ipAdresse = $this->get('request')->getClientIp();
                $commentId = $comment->getId();
                $logger->info('A comment [ID:'.$commentId.'] has been posted [IP:'.$ipAdresse.']');
                
                $commentsList = array();
                $commentsList[] = $comment;
                
                $response = $this->render('NoobCommentBundle:Global:commentsList.html.twig', array(
                    'commentsList' => $commentsList
                ))->getContent();
                return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
            }
            if($form->isSubmitted()){
                return new Response(json_encode(array('error' => true)),500, array('Content-Type'=>'application/json'));
            }
        }
        
        
        if($request->isXmlHttpRequest())
        {
            $response =  $this->render('NoobCommentBundle:Global:commentForm.html.twig', array('form' => $form->createView(),'postId' => $postId))->getContent();
            return new Response(json_encode($response),200, array('Content-Type'=>'application/json'));
        }
        return $this->render('NoobCommentBundle:Global:commentForm.html.twig', array('form' => $form->createView(),'postId' => $postId));
    }
    
    
    public function deleteUserCommentAction($commentId){
        $request = $this->getRequest();
        if(!$request->isXmlHttpRequest()){
            return new Response();
        }
        $commentId = intval($commentId);
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobCommentBundle:Comment');
        $comment = $repository->findOneById($commentId);
        if(!$comment){
            throw $this->createNotFoundException('Commentaire introuvable');
        }
        $user = $this->getUser();
        if($user != $comment->getAuthor()){
            throw $this->createNotFoundException('Impossible de supprimer ce commentaire');
        }
        $comment->setIsActive(false);
        $em->persist($comment);
        $em->flush();
        return new Response(json_encode(null),200, array('Content-Type'=>'application/json'));
    }
    
    
}
