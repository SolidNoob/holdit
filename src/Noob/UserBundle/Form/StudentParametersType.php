<?php
namespace Noob\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Url;

class StudentParametersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
        $builder->add('phoneNumber','text', array(
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
        $builder->add('description','textarea', array(
            'required' => false,
            'error_bubbling' => true
        ));
        $builder->add('lookingForInternship','checkbox', array(
            'required' => false,
            'error_bubbling' => true
        ));
        $builder->add('lookingForJob','checkbox', array(
            'required' => false,
            'error_bubbling' => true
        ));
        $builder->add('websiteurl','url', array(
            'required' => false,
            'constraints' => array(
                new Url(array('message' => 'Vous devez entrer une adresse URL valide')),
            ),
            'error_bubbling' => true
        ));
        $builder->add('visibleInfo','checkbox', array(
            'required' => false,
            'error_bubbling' => true
        ));
        $builder->add('section', 'entity', array(
            'class' => 'NoobUserBundle:Section',
            'query_builder' => function($repository) { return $repository->createQueryBuilder('s')->orderBy('s.name', 'ASC'); },
            'property' => 'name',
            'error_bubbling' => true
        ));
        $builder->add('fileProfil','file',array(
            'required' => false, 
            'attr' => array('class'=>'imgInp'),
            'error_bubbling' => true
        ));
        
        $builder->add('save', 'submit');
        //cv
        //picture
        
        //section_id
        
        //society
        //jury
    }

    public function getName()
    {
        return 'user_parameters';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Noob\UserBundle\Entity\User',
        ));
    }
}