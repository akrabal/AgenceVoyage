<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username' ,TextType::class,['label'=>'Prenom'])
            ->add('password',PasswordType::class,['label'=>'mots de passe'])
            ->add('NomUser',TextType::class,['label'=>'Nom'])
            ->add('AdresseMailUser',EmailType::class,['label'=>'Email'])
            ->add('NumeroUser',TelType::class,['label'=>'numero de telephone'])
            ->add('AdressePhysiqueUser',TextType::class,['label'=>'ville'])
            ->add('save', SubmitType::class,['label'=>'inscription'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
