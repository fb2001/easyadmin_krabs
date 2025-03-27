<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Enseigne;
use App\Entity\Horaire;
use App\Entity\Notation;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return parent::index(); // Utilise le template par défaut d'EasyAdmin
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Enseigne Manager');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Enseignes', 'fas fa-store', Enseigne::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-clock', Horaire::class);
        yield MenuItem::linkToCrud('Notations', 'fas fa-star', Notation::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-tags', Categorie::class);
    }
}