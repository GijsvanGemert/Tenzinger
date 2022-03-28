<?php

namespace App\Controller\Admin;

use App\Entity\Reisgegevens;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
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
    }

    public function configureFilters(Filters $filters): Filters
    {
        return parent::configureFilters($filters)
            ->add('vervoersmiddel')
            ->add('datum')
            ->add(BooleanFilter::new('heen'))
            ->add('werknemer_id');
    }
}
