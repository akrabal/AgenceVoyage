<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateReservation',DateType::class,[
                'widget' => 'single_text',
                 'input'=> 'datetime', 
                 'label'=> 'votre date de depart',
                 'required' =>'false',
                 'view_timezone' => 'GMT',
                  
            ])
            ->add('StatutReservation')
            ->add('envoyer',SubmitType::class,[
                'label'=>'confirmer'
            ])
            ->add('save', ResetType::class, [
                'label' => 'annuler',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
