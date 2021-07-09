<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $ereur= $authenticationUtils->getLastAuthenticationError();
        $lastusername = $authenticationUtils->getLastUsername();
        return $this->render('Security/Security.html.twig',[
            'lastusername'=> $lastusername,
            'erreur'=>$ereur
        ]);
    }
}