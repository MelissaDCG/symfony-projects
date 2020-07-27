<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Produit;
use App\Entity\Fournisseur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class BdDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(AuteurCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de bord');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute ('Accueil', 'fa fa-home', 'home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::section('Mes BD');        
        yield MenuItem::linkToCrud('Auteur', 'fas fa-pen-alt', Auteur::class);
        yield MenuItem::linkToCrud('Editeur', 'fas fa-warehouse', Editeur::class);
        yield MenuItem::linkToCrud('Fournisseur', 'fas fa-truck-loading', Fournisseur::class);
        yield MenuItem::linkToCrud('Genre', 'far fa-list-alt', Genre::class);
        yield MenuItem::linkToCrud('Produit', 'fas fa-book', Produit::class);    
    }
}
