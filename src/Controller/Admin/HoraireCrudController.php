<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use App\Enum\JourEnum;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class HoraireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('jour')
                ->setChoices(JourEnum::cases())
                ->setLabel('Jour')
                ->setRequired(true),
            TimeField::new('heureOuverture'),
            TimeField::new('heureFermeture'),
            AssociationField::new('enseigne')
                ->autocomplete(),
        ];
    }
}