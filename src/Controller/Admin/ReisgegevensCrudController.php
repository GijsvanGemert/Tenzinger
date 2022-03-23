<?php

namespace App\Controller\Admin;

use App\Entity\Reisgegevens;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReisgegevensCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reisgegevens::class;
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
