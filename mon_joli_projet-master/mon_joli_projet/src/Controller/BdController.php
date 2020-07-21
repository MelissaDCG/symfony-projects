<?php

namespace App\Controller;

use App\Repository\AuteurRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BdController extends AbstractController
{
    /**
     * @Route("/auteurs", name="bd")
     */
    public function index(AuteurRepository $repo)
    {
        $auteurs = $repo->findAll();
        
        return $this->render('bd/index.html.twig', [
            'auteurs' => $auteurs
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('bd/home.html.twig', [
            'title' => "Bienvenue sur le site des BD !",
            'age' => 30
        ]);
    }

    /**
     * @Route("/auteurs/{id}", name="bd_show")
     */
    public function show($id, ProduitRepository $repo)
    {
        $produits = $repo->findBy(array("auteur" => $id));

        $couvertures = array();
        $dir = "images/";       
        if ($dossier = opendir($dir)) {
            while (($item = readdir($dossier)) !== false) {
                if ($item[0] == '.') { continue; }
                $pos_point = strpos($item,'.');
                $item = substr($item,0,$pos_point);
                $couvertures[] = strtoupper($item);
            }
            closedir($dossier);
        }
        return $this->render('bd/show.html.twig',[
            'produits' => $produits,
            'couvertures' => $couvertures
        ]);
    }

}
