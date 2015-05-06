<?php
namespace Noob\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;

class FirstStepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array(
            'constraints' => 
            array( 
                new NotBlank(array('message' => 'Vous devez entrer un login')),
                new Length(array(
                    "min" => 6, 'minMessage' => "Le login est trop court (6 caractères minimum)",
                    "max" => 20, 'maxMessage' => "Le login est trop long (20 caractères maximum)"
                )),
                new Regex(array(
                    'pattern' => '/^[a-zA-Z0-9]+$/',
                    'message' => 'Le login ne peut pas contenir de caractère spéciaux'
                ))
            ),
            'error_bubbling' => true
        ));
        $builder->add('password', 'repeated', array(
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
            'error_bubbling' => true
        ));
        
        $builder->add('email','email', array(
            'constraints' => array(
                new NotBlank(array('message' => 'Vous devez entrer votre email')),
                new Email(array('message' => "L'adresse email est invalide")),
            ),
            'error_bubbling' => true
        ));
        
        $builder->add('firstname','text', array(
            'constraints' => array(new NotBlank(array('message' => 'Le prénom ne peut pas être vide'))),
            'error_bubbling' => true
        ));
        
        $builder->add('surname','text', array(
            'constraints' => array(new NotBlank(array('message' => 'Le nom de famille ne peut pas être vide'))),
            'error_bubbling' => true
        ));
        
        $builder->add('visibleInfo','checkbox', array(
            'required' => false,
            'error_bubbling' => true
        ));
        $builder->add('section', 'entity', array(
            'class' => 'NoobUserBundle:Section',
            'query_builder' => function($repository) { return $repository->createQueryBuilder('s')->orderBy('s.name', 'DESC'); },
            'property' => 'name',
            'error_bubbling' => true
        ));
        $builder->add('jury','checkbox', array(
            'required' => false,
            'error_bubbling' => true
        ));
        $builder->add('society','text', array(
            'required' => false,
            'error_bubbling' => true
        ));
        
        $builder->add('recaptcha', 'ewz_recaptcha', array(
                'attr'        => array(
                    'options' => array(
                        'theme' => 'light',
                        'type'  => 'image'
                    )
                ),
                'mapped'      => false,
                'constraints' => array(
                    new True()
                ),
                'error_bubbling' => true
        ));
        
        
        $builder->add('iagree', "checkbox", array(
            'mapped' => false,
            'error_bubbling' => true
        ));
        
        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'user_firststep';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Noob\UserBundle\Entity\User',
        ));
    }
}