<?php
namespace Noob\PostBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Date;


use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;

class TfeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name','text', array(
            'constraints' => array(
                new NotBlank(array('message' => 'Vous devez entrer un titre')),
            ),
            'error_bubbling' => true
        ));
        $builder->add('description','textarea', array(
            'constraints' => array(new NotBlank(array('message' => 'Vous devez entrer une description'))),
            'error_bubbling' => true
        ));
        $builder->add('url','url', array(
            'required' => false,
            'constraints' => array(
                new Url(array('message' => 'Vous devez entrer une adresse URL valide')),
            ),
            'error_bubbling' => true
        ));
        $builder->add('filePicture','file',array(
            'required' => false, 
            'error_bubbling' => true
        ));
        $builder->add('tags', "hidden", array(
            'mapped' => false,
        ));
        $builder->add('recaptcha', 'ewz_recaptcha', array(
                'error_bubbling' => true,
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
        ));
        $builder->add('pubDate','date', array(
            'input'  => 'datetime',
            'widget' => 'choice',
            'format' => 'dd-MM-yyyy',
            'invalid_message' => 'La date est invalide',
            'error_bubbling' => true,
            'required' => false, 
            'constraints' => array(
                new Date(array('message' => 'La date est invalide')),
            ),
        ));
        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'post_tfe';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Noob\PostBundle\Entity\Post',
        ));
    }
}