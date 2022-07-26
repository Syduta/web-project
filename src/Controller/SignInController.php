<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignInController extends AbstractController
{
    /**
     * @Route("/sign-in",name="sign-in")
     */

    public function signIn(){
        $user = new user();
        $user->setRole(["ROLE_USER"]);
        $form = $this->createForm(userType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $plainPassword=$form->get('password')->getData();
            $hashedPassword = $userPasswordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);
            $entityManager->persist($user);
            $entityManager->flush();
            $this->redirectToRoute('home');
        }
        return $this->render('connexion/sign-in.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}