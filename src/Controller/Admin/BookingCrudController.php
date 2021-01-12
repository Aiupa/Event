<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;



class BookingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booking::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            AssociationField::new('type', 'Type'),
            AssociationField::new('staff', 'Référent'),
            IntegerField::new('Public', 'Public'),
            DateTimeField::new('beginAt', 'Début de l\'évenement'),
            DateTimeField::new('endAt', 'Fin de l\'évenement'),
            AssociationField::new('room', 'Salle'),
            TextEditorField::new('text', 'Déroulé')
        ];
    }
}
