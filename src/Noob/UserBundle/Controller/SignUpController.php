<?php

namespace Noob\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Noob\UserBundle\Entity\User;

use Noob\SiteBundle\CustomClass\Slugify;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SignUpController extends Controller
{
    
    public function signUpPageAction(){
        return $this->render('NoobUserBundle:SignUp:signUp.html.twig');
    }
    
    public function firstStepAction($accountTypeSlug){
        $em = $this->getDoctrine()->getManager();
        $role = $em->getRepository('NoobUserBundle:Role')->findOneBySlug($accountTypeSlug);
        if(!$role){
            throw $this->createNotFoundException('Page introuvable');
        }
        $request = $this->getRequest();
        $session = $request->getSession();
        $session->set('roleId', $role->getId());
        $session->set('roleSlug', $role->getSlug());
        $session->set('step', 1);
        
        $user = new User();
        $user->setVisibleInfo(true);
        $form = $this->createForm(new \Noob\UserBundle\Form\FirstStepType(), $user);
        
        if($request->isMethod('POST')) 
        {
            $form->handleRequest($request);
            if($form->isValid()) 
            {
                $user = $form->getData();
                $user->setSalt(md5(uniqid()));
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
                $session->set('username', $user->getUsername());
                $session->set('password', $user->getPassword());
                $session->set('salt', $user->getSalt());
                $session->set('firstname', $user->getFirstname());
                $session->set('surname', $user->getSurname());
                $session->set('sectionId', $user->getSection()->getId());
                $session->set('email',$user->getEmail());
                $session->set('visibleInfo', $user->getVisibleInfo());
                $session->set('society', $user->getSociety());
                $session->set('jury',$user->getJury());
                
                $session->set('step',2);
                
                $keyRegister = md5(uniqid()."sonicboom");
                $session->set('key',$keyRegister);
                
                $message = \Swift_Message::newInstance()
                    ->setSubject("Confirmation d'inscription")
                    ->setFrom(array($this->container->getParameter('mailer_user') => $this->container->getParameter('mailer_from_name_in_mail')))
                    ->setTo($user->getEmail())
                    ->setBody($this->renderView('NoobUserBundle:Mail:confirmMail.html.twig', array('key' => "$keyRegister", 'user' => $user)))
                    ->setContentType('text/html');
                $this->get('mailer')->send($message);
                
                return $this->redirect($this->generateUrl('user_signup_emailconfirm'));
            }
        }
        
        return $this->render('NoobUserBundle:SignUp:firstStep.html.twig',array(
            'form' => $form->createView()
        ));
    }
    
    
    public function emailConfirmAction(){
        $session = $this->getRequest()->getSession();
        $step = $session->get('step');
        
        //on vérifie que l'utilisateur est bien passé par l'étape précédente
        if($step != 2){
            return $this->redirect($this->generateUrl('user_signup_page'));
        }
        $session->set('step',3);
        return $this->render('NoobUserBundle:SignUp:emailConfirm.html.twig');
    }
    
    public function validRegisterAction($key){
        $session = $this->getRequest()->getSession();
        $step = $session->get('step');
        $keySession = $session->get('key');
        //on vérifie que l'utilisateur est bien passé par l'étape précédente
        //et qu'il possède la bonne clef
        if($step != 3 || $keySession != $key){
            return $this->redirect($this->generateUrl('user_signup_page'));
        }
        
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setUsername($session->get('username'))->setSalt($session->get('salt'))->setPassword($session->get('password'))->setEmail($session->get('email'))
             ->setIsActive(1)->setCv(null)->setFirstname($session->get('firstname'))->setSurname($session->get('surname'))
             ->setPicture(null)->setPhoneNumber(null)->setFblink(null)->setTwitterlink(null)->setLinkedinlink(null)->setDescription(null)
             ->setLookingForInternship(1)->setLookingForJob(1)->setSociety($session->get('society'))->setWebsiteurl(null)->setVisibleInfo($session->get('visibleInfo'))
             ->setCover(null)->setUpdatedAt(new \Datetime);
        $role = $em->getRepository('NoobUserBundle:Role')->findOneById($session->get('roleId'));
        $user->setRole($role);
        if($role->getSlug() == 'etudiant'){
            $user->setJury(0);
        } else {
            $user->setJury($session->get('jury'));
        }
        $section = $em->getRepository('NoobUserBundle:Section')->findOneById($session->get('sectionId'));
        $user->setSection($section);
        
        $slugify = new Slugify();
        $slug = $slugify->stringToSlug($user->getFirstname())."-".$slugify->stringToSlug($user->getSurname());
        $userSameSlug = $em->getRepository('NoobUserBundle:User')->findLastBySlugLike($slug);
        if(!$userSameSlug){
            $user->setSlug($slug);
        }else{ 
           $user->setSlug($slug."-".$userSameSlug[0]->getId());
        }
        
        
        $defaultTag = $em->getRepository('NoobTagBundle:Tag')->findOneByName($slugify->stringToSlug($section->getName()));
        if(!$defaultTag){
            $defaultTag = new \Noob\TagBundle\Entity\Tag;
            $defaultTag->setName($slugify->stringToSlug($section->getName()));
        }
        $user->addTag($defaultTag);
        
        $em->persist($defaultTag);
        $em->persist($user);
        $em->flush();
        
        $token = new UsernamePasswordToken($user, $user->getPassword(), 'user_secured', array($user->getRole()->getRole()));
        $this->get('security.token_storage')->setToken($token);
        
        $session = $this->getRequest()->getSession();
        $session->set('step',4);
        
        return $this->redirect($this->generateUrl('user_signup_complete'));
    }
    
    public function completeAction(){
        $request = $this->getRequest();
        $session = $request->getSession();
        $step = $session->get('step');
        if($step != 4 && !$request->isMethod('POST')){
            return $this->redirect($this->generateUrl('user_signup_page'));
        }
        
        
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('NoobUserBundle:User');
        $me = $repo->findOneById($this->getUser()->getId());
        $tags = $me->getTags();
        $form = $this->createForm(new \Noob\UserBundle\Form\OptionnalStepType(), $me);
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

                    $slugify = new Slugify();
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
                
                $em->persist($me);
                $em->flush();
                $session->remove('step');
            }
        }
        return $this->render('NoobUserBundle:SignUp:complete.html.twig', array('form' => $form->createView(), 'tags' => $tags));
    }
}
