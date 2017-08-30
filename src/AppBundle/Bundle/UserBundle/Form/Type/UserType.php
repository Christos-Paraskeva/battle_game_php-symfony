<?php

namespace AppBundle\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email');
        $builder->add('plainPassword', 'repeated', array(
           'username' => 'email',
           'password' => 'confirm',
           'type'     => 'password',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $revolver)
    {
        $resolver->setDefaults(array(
           'data_class' => 'AppBundle\Bundle\UserBundle\Entity\UserBundle'
        ));
    }

    public function getName()
    {
        return "user";
    }

}