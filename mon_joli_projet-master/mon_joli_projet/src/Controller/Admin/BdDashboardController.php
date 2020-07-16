<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Auteur;
use App\Entity\Produit;
use App\Entity\Editeur;
use App\Entity\Fournisseur;
use App\Entity\Genre;

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
            ->setTitle('BD');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Auteur', 'fas fa-pen-alt', Auteur::class);
        yield MenuItem::linkToCrud('Editeur', 'fas fa-warehouse', Editeur::class);
        yield MenuItem::linkToCrud('Fournisseur', 'fas fa-truck-loading', Fournisseur::class);
        yield MenuItem::linkToCrud('Genre', 'far fa-list-alt', Genre::class);
        yield MenuItem::linkToCrud('Produit', 'fas fa-book', Produit::class);
    }
}
