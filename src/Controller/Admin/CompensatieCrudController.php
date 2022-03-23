<?php

namespace App\Controller\Admin;

use App\Entity\Compensatie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CompensatieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compensatie::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
