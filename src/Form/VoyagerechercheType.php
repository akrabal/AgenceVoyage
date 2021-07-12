<?php

namespace App\Form;

use App\Entity\voyagerecherche;
use App\Repository\CompagnieRepository;
use Symfony\Component\DependencyInjection\ParameterBag\EnvPlaceholderParameterBag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyagerechercheType extends AbstractType
{   
    private $compagnieRespository ;
    public function __construct( CompagnieRepository $compagnieRespository)
    {
        $this->compagnieRespository= $compagnieRespository;
    }
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add('NonCompagnie',ChoiceType::class,[
                'choices' => $this->Noncompagnie(),
                'label'=> 'votre compagnies' ,
                'required' =>'false',
                'placeholder'=>'choisir la compagnie'
            ])
            ->add('DateDepart',DateType::class,[
                'widget' => 'single_text',
                 'input'=> 'datetime_immutable', 
                 'label'=> 'votre date de depart',
                 'required' =>'false',
                 'view_timezone' => 'GMT',
                  
            ])
            ->add('submit',SubmitType::class,[
                'label'=> 'recherche',
                ])
               
            ;
            
    }

  

   public function Noncompagnie ()
    {
       
        $compagnies=$this->compagnieRespository->findAll();
        $Nomcompagnie=[];
        foreach ($compagnies as  $compagnie) {
            $Nom= $compagnie->getNomcompagnie() ;
           $Nomcompagnie[$Nom] = $Nom;
        }
        return $Nomcompagnie ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => voyagerecherche::class,
            'method'=> 'get',
            'csrf_protection'=> false ,
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}
