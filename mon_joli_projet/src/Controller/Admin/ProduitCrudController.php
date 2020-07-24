<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('refBd'),
            TextField::new('heros'),
            TextField::new('titre'),
            TextField::new('prixPublic'),
            TextField::new('prixEditeur'),
            TextEditorField::new('resume'),
            TextField::new('refFournisseur'),
            TextField::new('refEditeur'),
            AssociationField::new('auteur'),
            AssociationField::new('genre'),
            AssociationField::new('fournisseur'),
            AssociationField::new('editeur')
        ];
    }
    
}
