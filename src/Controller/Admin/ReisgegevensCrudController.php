<?php

namespace App\Controller\Admin;

use App\Entity\Reisgegevens;
use App\Repository\ReisgegevensRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Factory\FilterFactory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ReisgegevensCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reisgegevens::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field::new('afstand');
        yield Field::new('vervoersmiddel');
        yield Field::new('heen');
        yield AssociationField::new('werknemer_id');
        yield Field::new('datum');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return parent::configureFilters($filters)
            ->add('vervoersmiddel')
            ->add('datum')
            ->add(BooleanFilter::new('heen'))
            ->add('werknemer_id');
    }

    public function configureActions(Actions $actions): Actions
    {
        $export = Action::new('exportcsv2', 'Export')
            ->setIcon('fa fa-download')
            ->linkToCrudAction('exportcsv2')
            ->setCssClass('btn')
            ->createAsGlobalAction();

        return $actions->add(Crud::PAGE_INDEX, $export);
    }

    # DEZE FUNCTIE AANPASSEN
    public function exportcsv2(ReisgegevensRepository $rg,  Request $request){
        $reisgegevens = $rg->FindAll2();
        $encoders = [new CsvEncoder()];
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $records= (array) $reisgegevens;
        $csvContent = $serializer->serialize($records, 'csv');
      
        $response = new Response($csvContent);
        $response->headers->set('Content-Encoding', 'UTF-8');
        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', 'attachment; filename=sample.csv');

        $response->sendHeaders();
        //$response->sendContent();
        return $response;

    }
}
