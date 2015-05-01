<?php

namespace Noob\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Noob\UserBundle\Entity\User;

use Symfony\Component\HttpFoundation\Response;

use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;

class TestController extends Controller
{   
    public function testAction()
    {
        return $this->render('NoobUserBundle:Test:test.html.twig');
    }
    
    public function listAction()
    {
        $user = $this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobUserBundle:User');
        
        $list = $repository->getUserListAndRole();
        return $this->render('NoobUserBundle:Test:list.html.twig', array('list'=>$list));
    }
    /* 
     * E20365: monpassword ADMIN 
     * E11111: lol ENTREPRISE
     * E22222: okok USER
     * E33333: salut USER
     * E44444: bonjour USER
     * E55555: mgs  ENTREPRISE
     * E66666: lego ENTREPRISE
     * E77777: aqwxsz USER
     * E88888: 123456   USER
     * E99999: albert   ENTREPRISE
     */
    public function insertAction()
    {
        $factory = $this->get('security.encoder_factory');
        $user = new User();
        
        $user->setUsername('E99999');
        $user->setEmail('e9@hotmail.com');
        
        $encoder = $factory->getEncoder($user);
        $password = $encoder->encodePassword('albert', $user->getSalt());
        $user->setPassword($password);
        $user->setFirstName('Kévin');
        $user->setSurname('Ouragan');
        
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobUserBundle:Role');
        $role = $repository->findOneByRole("ROLE_ENTREPRISE");
        $user->setRole($role);
        $em->persist($user);
        $em->flush();
        
        return new Response('Id du user créé : '.$user->getId().' </body>');
    }
    
    public function testtestAction(){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('NoobUserBundle:User');
        $list = $repository->getUserAndFollowed();
        
        return $this->render('NoobUserBundle:Test:testtest.html.twig', array('list'=>$list));
    }
    
    public function testPourCropAction(){
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('username', 'text')
            ->add('firstname', 'text')
            ->add('file','file', array(
                                            'required' => false, 
                                            'attr' => array('class'=>'imgInp')
            ))
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
        
        $request = $this->getRequest();
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setPassword('lol');
            $user->setEmail('ok@hotmail.com');
            $user->setVisibleInfo(1);
            $user->setSurname('lol');
            $user->setDescription('salut');
            $user->setLookingForInternship(1);
            $user->setLookingForJob(1);
            $user->setSlug('lol');
            $repository = $em->getRepository('NoobUserBundle:Role');
            $role = $repository->findOneByRole("ROLE_ENTREPRISE");
            $user->setRole($role);
            $user->setJury(1);
            $em->persist($user);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Utilisateur enregistré');
        }
        return $this->render('NoobUserBundle:Test:testpourcrop.html.twig',array('form'=>$form->createView()));
    }
    
    public function testLotOfFollowingsAction(){
         $em = $this->getDoctrine()->getManager();
         /*
        $repository = $em->getRepository('NoobUserBundle:User');
        
        $jean = $repository->findOneBySurname('Gervasi');
        $others = $repository->findAll();
        
        foreach($others as $o){
        $jean->addUsersIFollow($o);
        }
        $em->persist($jean);
        $em->flush();*/
         $repo = $em->getRepository('NoobPostBundle:Post');
        return new Response('</body>');
    }
}
