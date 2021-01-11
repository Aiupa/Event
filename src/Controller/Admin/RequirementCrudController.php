<?php

namespace App\Controller\Admin;

use App\Entity\Requirement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RequirementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Requirement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Type'),
        ];
    }
}
