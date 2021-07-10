<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Maker\MakeForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InscriptionController extends AbstractController
{
    
    public function index(Request $request,UserPasswordHasherInterface $encoder): Response
    {  
        $manager = $this->getDoctrine()->getManager();
        $utilisateur = new User();
       
        $form = $this->createForm(UserType::class, $utilisateur);  
        $form->handleRequest($request); 
       
        
         if ($form->isSubmitted() && $form->isValid()) { 
             $utilisateur->setPassword($encoder->hashPassword($utilisateur,$utilisateur->getPassword()));
             $utilisateur->setRoles(['ROLE_USER']);
             $manager->persist($utilisateur);
             $manager->flush($utilisateur);
             return $this->redirectToRoute('login');    
             
           }
        return $this->render('inscription/index.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}