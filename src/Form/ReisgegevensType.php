<?php

namespace App\Form;

use App\Entity\Reisgegevens;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ReisgegevensType extends AbstractType
{
    private $token;

    public function __construct(TokenStorageInterface $token)
    {
    $this->token = $token;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $this->token->getToken()->getUser();
        $builder
            ->add('afstand', IntegerType::class, array('attr' => array(
                'min' => '1',
                'max' => '100',
                'required'=>'true',
            )))
            ->add('vervoersmiddel', ChoiceType::class, [
                'choices'  => [
                    'Auto' => 'Auto' ,
                    'Fiets' => 'Fiets' ,
                    'Trein' => 'Trein',
                    'Bus' => 'Bus',
                ],
            ])
            ->add('datum',DateType::class, array(
                'months' => range(date('y') -1, date('y')),
                'years' => range(date('y') , date('y')),
                'required'=>'true',
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                ],
                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'format' => 'dd - MMMM - yyyy',
                
                'input'  => 'datetime',
                
                'input_format'=>'Y-m-d',

             )
             )
            ->add('heen')
            ->add('werknemer_id', ChoiceType::class, [
                'choices'  => [
                    strval($user)=>$user
                ],
            ])
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
