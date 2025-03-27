<?php

namespace App\Controller\Admin;

use App\Entity\Notation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NotationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Notation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('prix'),
            IntegerField::new('ambiance'),
            IntegerField::new('qualite'),
            TextField::new('typeNotation'),
            AssociationField::new('user')->autocomplete(),
            AssociationField::new('enseigne')->autocomplete(),
        ];
    }
}