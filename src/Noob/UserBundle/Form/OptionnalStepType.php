<?php
namespace Noob\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;

class OptionnalStepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('tags', "hidden", array(
            'mapped' => false,
        ));
        
        
        $builder->add('fileProfil','file',array(
            'required' => false, 
            'attr' => array('class'=>'imgInp'),
            'error_bubbling' => true
        ));
        
        
        $builder->add('description','textarea', array(
            'required' => false,
            'error_bubbling' => true
        ));
        
        $builder->add('fblink','url', array(
            'required' => false,
            'constraints' => array(
                new Url(array('message' => 'Vous devez entrer une adresse valide')),
            ),
            'error_bubbling' => true
        ));
        $builder->add('twitterlink','url', array(
            'required' => false,
            'constraints' => array(
                new Url(array('message' => 'Vous devez entrer une adresse URL valide')),
            ),
            'error_bubbling' => true
        ));
        $builder->add('linkedinlink','url', array(
            'required' => false,
            'constraints' => array(
                new Url(array('message' => 'Vous devez entrer une adresse URL valide')),
            ),
            'error_bubbling' => true
        ));
        
        $builder->add('websiteurl','url', array(
            'required' => false,
            'constraints' => array(
                new Url(array('message' => 'Vous devez entrer une adresse URL valide')),
            ),
            'error_bubbling' => true
        ));
        
        $builder->add('phoneNumber','text', array(
            'required' => false,
            'error_bubbling' => true
        ));
        
        
        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'user_secondstep';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Noob\UserBundle\Entity\User',
        ));
    }
}