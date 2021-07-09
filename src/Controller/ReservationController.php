<?php
namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class ReservationController extends AbstractController

{
   
    public function index(): Response
    {   $reservation = new Reservation() ;
        $form = $this->createForm(ReservationType::class, $reservation);
        return $this->render('Reservation\index.html.twig',[
          'form' => $form->createView(),
          
      ]);  
    }
}