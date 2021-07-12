<?php

namespace App\Form;

use App\Entity\Compagnie;
use App\Entity\Gare;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('HeureDepart')
            ->add('HeureArrive')
            ->add('statutVoyage')
            ->add('Compagnie',EntityType::class, [
                'class'=> Compagnie::class,
                'choice_label' => 'NomCompagnie',
                

            ])
            ->add('GareDepart',EntityType::class, [
                'class'=> Gare::class,
                'choice_label' => 'localisationGare',
                

            ])
            ->add('GareArriver',EntityType::class, [
                'class'=> Gare::class,
                'choice_label' => 'localisationGare',
                

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}
