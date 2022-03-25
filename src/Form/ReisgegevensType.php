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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use AppBundle\Entity\FormValidation; 

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
            ->add('datum',DateType::class, [
                'months' => range(date('m', strtotime("-1 month")), date('m')),
                'years' => range(date('y') , date('y')),
                'required'=>'true',
                'placeholder' => [
                    'year' => 'Jaar', 'month' => 'Maand', 'day' => 'Dag',
                ],
                'format' => 'dd - MMMM - yyyy',
                
                'input'  => 'datetime',
                
                'input_format'=>'mm-dd-yyyy',

            ]
             )
            ->add('heen')
            // ->add('werknemer_id', HiddenType::class, [

            //     'empty_data' =>$user
            // ])
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
