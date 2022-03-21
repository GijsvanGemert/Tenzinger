<?php

namespace App\Form;

use App\Entity\Reisgegevens;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReisgegevensType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('afstand')
            ->add('vervoersmiddel')
            ->add('datum')
            ->add('heen')
            ->add('werknemer_id')
            ->add('Opslaan', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reisgegevens::class,
        ]);
    }
}
