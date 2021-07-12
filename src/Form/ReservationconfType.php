<?php

namespace App\Form;

use App\Entity\Reservationconf;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationconfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           /* ->add('datedepart',DateType::class,[
                'widget' => 'single_text',
                 'input'=> 'datetime', 
                 'label'=> 'votre date de depart',
                 'required' =>'false',
                 'view_timezone' => 'GMT',
                  
            ])*/
            ->add('compagnie')
            ->add('garearriver')
            ->add('garedepart')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservationconf::class,
        ]);
    }
}
