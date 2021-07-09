<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class InscriptionController extends AbstractController
{
    
    public function index(): Response
    {
        
       return $this->render('inscription/index.html.twig',[]);
    }
}