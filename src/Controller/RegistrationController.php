<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;



class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration')]
    public function reg(Request $request, UserPasswordHasherInterface $passHasher, ManagerRegistry $doctrine): Response
    {

        $regform = $this->createFormBuilder()
        ->add('email', EmailType::class,[
            'label' => 'Email'])
        ->add('password', RepeatedType::class,[
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'options' => ['attr' => ['class' => 'password-field']],
            'required'=> true,
            'first_options' => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat password']
        ])
        ->add('register', SubmitType::class)
        ->getForm()
        ;

        $regform->handleRequest($request);

        if($regform->isSubmitted() && $regform->isValid()){
            $input = $regform->getData();

            $user = new User();
            $user->setEmail($input['email']);

            $user->setPassword(
                $passHasher->hashPassword($user, $input['password'])
            );

            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();

            $this->addflash('success','Je account is aangemaakt. Je kunt nu inloggen.');

            return $this->redirect($this->generateUrl('app_home'));
        }

        return $this->render('registration/index.html.twig', [
            'regform' => $regform->createView()
        ]);
    }
}
