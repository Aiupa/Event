<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;



class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            AssociationField::new('type', 'Type'),
            AssociationField::new('staff', 'Référent'),
            IntegerField::new('Public', 'Nombre de personnes'),
            DateTimeField::new('beginAt', 'Début de l\'évenement'),
            DateTimeField::new('endAt', 'Fin de l\'évenement'),
            AssociationField::new('room', 'Salle pour l\'événement'),
            TextEditorField::new('text', 'Description de l\'événement')
        ];
    }
}
