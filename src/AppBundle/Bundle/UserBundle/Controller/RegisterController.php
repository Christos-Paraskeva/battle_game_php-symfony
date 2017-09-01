<?php

namespace AppBundle\Bundle\UserBundle\Controller;

use AppBundle\Bundle\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\OptionsResolver\OptionsResolver;



class RegisterController extends Controller
{

    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
        var_dump($resolver);
    }

    /**
     * @Route("/register", name="user_register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $user->setEmail('testemail');
        $user->setUsername('testusername');
        $user->setPassword('testpassword');

        $form = $this->createFormBuilder()
            ->add('username', 'text')
            ->add('email', 'text')
            ->add('password', 'password')
//            ->add('save', 'submit')
            ->getForm()
        ;

//        var_dump($form); die();

        return $this->render('/register/register.html.twig', array('form' => $form->createView()));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        var_dump($resolver);
        $resolver->setDefaults(array(
            'username'   => 'user',
            'email'      => 'email',
            'password'   => 'pa$$word',
        ));
    }
}