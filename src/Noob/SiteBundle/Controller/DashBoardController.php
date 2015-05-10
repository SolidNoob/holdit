<?php

namespace Noob\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Noob\SiteBundle\CustomClass\PaginatorHelper;

use Symfony\Component\HttpFoundation\Response;

use Noob\UserBundle\Form\UserParametersType;
use Noob\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

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
        
        $form = $this->createForm(new UserParametersType(), $user);
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
                $this->get('session')->getFlashBag()->add('notice','Vos changements ont été pris en compte');
            }
        }
        return $this->render('NoobSiteBundle:DashBoard:userInfoPage.html.twig',array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
    
    public function editUserPasswordAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $me = $em->getRepository('NoobUserBundle:User')->findOneById($this->getUser()->getId());
        $form = $this->createFormBuilder($me)
                ->add('oldPassword','password',array(
                            'error_bubbling' => true,
                            'constraints' => 
                                    array( 
                                        new NotBlank(array('message' => 'Vous devez entrer un mot de passe')),
                            ),
                            'mapped' => false,
                ))
                ->add('newPassword', 'repeated', array(
                            'type' => 'password',
                            'invalid_message' => 'Les mots de passe doivent correspondre',
                            'options' => array('required' => true),
                            'constraints' => 
                                    array( 
                                        new NotBlank(array('message' => 'Vous devez entrer un mot de passe')),
                                        new Length(array(
                                            "min" => 6, 'minMessage' => "Le mot de passe est trop court (6 caractères minimum)",
                                            "max" => 20, 'maxMessage' => "Le mot de passe est trop long (20 caractères maximum)"
                                        )),
                            ),
                            'error_bubbling' => true,
                            'mapped' => false,
                ))
            ->add('save', 'submit')
            ->getForm();
        $request = $this->getRequest();
        if($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if(!$form->isValid())
            {
                $this->get('session')->getFlashBag()->add('bad-notice',"Votre mot de passe actuel ne correspond pas.");
            }
            else
            {   
                //on récupère le password entré par l'utilisateur dans le champ OldPasswor
                //on le crypte et on le compare au password en base de données
                $oldPassword =  $form->get('oldPassword')->getData();
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($me);
                $encodedPassword = $encoder->encodePassword($oldPassword, $me->getSalt());
                if($encodedPassword == $me->getPassword()){
                    //oldPassword et password en db correspondent!
                    //On crypte le nouveau password et on persist + flush
                    $me->setSalt(md5(uniqid()));
                    $newPassword = $form->get('newPassword')->getData();
                    $newEncodedPassword = $encoder->encodePassword($newPassword, $me->getSalt());
                    $me->setPassword($newEncodedPassword);
                    $em->persist($me);
                    $em->flush();
                    $this->get('session')->getFlashBag()->add('notice','Vos changements ont été pris en compte');
                }
            }
        }
        return $this->render('NoobSiteBundle:DashBoard:editUserPassword.html.twig',array(
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
                    $this->get('session')->getFlashBag()->add('notice','Vos changements ont été pris en compte');
                }
                else
                {
                    $this->get('session')->getFlashBag()->add('bad-notice',"Vos changements n'ont pas été enregistrés. Vous devez choisir au moins un tag.");
                }
                
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
 