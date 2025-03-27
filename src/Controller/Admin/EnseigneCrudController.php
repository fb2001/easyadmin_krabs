<?php

namespace App\Controller\Admin;

use App\Entity\Enseigne;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class EnseigneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enseigne::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('numeroTelephone'),
            TextField::new('adresse'),
            ImageField::new('photo')
                ->setBasePath('uploads/images')
                ->setUploadDir('public/uploads/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextareaField::new('description'),
            NumberField::new('noteSeuil'),
            ArrayField::new('pointsCle'),
            TextField::new('gpsLocation'),
            AssociationField::new('horaires')->autocomplete(),
            AssociationField::new('notations')->autocomplete(),
            AssociationField::new('favoris')->autocomplete(),
        ];
    }
}