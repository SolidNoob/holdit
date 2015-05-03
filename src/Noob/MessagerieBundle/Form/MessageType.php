<?php
namespace Noob\MessagerieBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True;
use Symfony\Component\Validator\Constraints\NotBlank;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title','text', array(
            'constraints' => array(new NotBlank(array('message' => 'Vous devez entrer un titre'))),
            'error_bubbling' => true
        ));
        $builder->add('content','textarea', array(
            'constraints' => array(new NotBlank(array('message' => 'Votre message ne peut pas être vide'))),
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
        $builder->add('save', 'submit');
    }

    public function getName()
    {
        return 'message';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Noob\MessagerieBundle\Entity\Message',
        ));
    }
}