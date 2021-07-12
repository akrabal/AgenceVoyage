<?php
namespace App\Controller;

use App\Entity\Compagnie;
use App\Entity\Reservation;
use App\Entity\Reservationconf;
use App\Entity\Voyage;
use App\Entity\voyagerecherche;
use App\Form\ReservationconfType;
use App\Form\ReservationType;
use App\Form\VoyagerechercheType;
use App\Form\VoyageType;
use App\Repository\GareRepository;
use App\Repository\VilleRepository;
use App\Repository\VoyageRepository;
use \DateTime;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ReservationController extends AbstractController

{  
    private $GareRepository ;
    private $villeRespository ;
    private $voyageRespository ;

    
    

    public function __construct(GareRepository $GareRepository , VilleRepository $villeRepository, VoyageRepository $voyageRepository)
    {
      $this->GareRepository = $GareRepository;
      $this->villeRespository = $villeRepository;
      $this->voyageRespository = $voyageRepository; 
        
    }
   
    public function index(Request $request): Response
    {     
        /*
        $gares = $this->GareRepository->findAll();
        $villes=$this->villeRespository->findAll();
        */
        $voyagerecherche = new voyagerecherche();
        $form = $this->createForm(VoyagerechercheType::class, $voyagerecherche);
        $form->handleRequest($request);
        $voyages = $this->voyageRespository->findVoyage($voyagerecherche); 
        return $this->render('Reservation\index.html.twig',[
          'voyages' => $voyages ,
           'form' => $form->createView(),
          
         
      ]);  
    }
     /**
      * @Route("/Reserver/{id}",name="Reserver")
      */
    public function Reserver( Voyage $voyage, Request $request ):Response
    {   

       $manager= $this->getDoctrine()->getManager();
       $manager->persist($voyage);
      

       dump($voyage);
       
     
      return $this->render('reserver/reserver.html.twig',[
        'voyage' => $voyage , 
      ]);
    }
      /**
      * @Route("/Confirm /{id}", name="Confirm", requirements={"name"=".+"})
      */
    public function confirm(voyage $voyage):Response
    {  
        $manager= $this->getDoctrine()->getManager();
        $reservation = new Reservation();
        $reservation->setVoyage($voyage);
        $reservation->setUser( $this->getUser());
        $reservation->setDateReservation( new DateTime('NOW')) ;
        $reservation->setStatutReservation('actif');
        $manager->persist($reservation);
        $manager->flush($reservation);
        dump($reservation);
        
        return $this->render('cool.html.twig',[
          
        ]);
        /*
        return $this->redirectToRoute('Home');
        */

    }
}