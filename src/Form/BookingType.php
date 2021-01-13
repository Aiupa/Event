<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

// Formulaire de création d'event

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', null, ['label' => 'Type'])
            ->add('title', TextType::class, ['label' => 'Titre de l\'événement', 'required' => true])
            ->add('public', IntegerType::class, ['label' => 'Nombre de personnes présentes' , 'required' => true])
            ->add('staff', null, ['label' => 'Référent'])
            ->add('beginAt', DateTimeType::class, ['label' => 'Début de l\'événement', 'date_format' => 'd MMM yyyy', 'years' => range(2021, 2026), 'required' => true])
            ->add('endAt', DateTimeType::class, ['label' => 'Fin de l\'événement', 'date_format' => 'd MMM yyyy', 'years' => range(2021, 2026), 'required' => true])
            ->add('room', null, ['label' => 'Espaces pour l\'événement'])
            ->add('requirement', null, ['label' => 'Besoins spécifiques'])
            ->add('text', null, ['required' => false, 'label' => 'Déroulé de l\'événement'])
        ;  
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}