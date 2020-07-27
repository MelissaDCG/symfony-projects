<?php

namespace App\Controller;

use App\Repository\GenreRepository;
use App\Repository\AuteurRepository;
use App\Repository\ProduitRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BdController extends AbstractController
{
    /**
     * @Route("/auteurs", name="bd")
     */
    public function index(AuteurRepository $repo, PaginatorInterface $paginator, Request $request)
    {
        $allAuthors = $repo->findAll();
        
        // Paginate the results of the query
        $auteurs = $paginator->paginate(
            // Doctrine Query, not results
            $allAuthors,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            10
        );

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

    /**
    * @Route("/genre", name="genre")
    */
    public function genre(GenreRepository $repo, PaginatorInterface $paginator, Request $request)
    {
        $allGenres = $repo->findAll();
        
        // Paginate the results of the query
        $genres = $paginator->paginate(
            // Doctrine Query, not results
            $allGenres,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            10
        );

        return $this->render('bd/genre.html.twig', [
            'genres' => $genres
        ]);
    }

    /**
     * @Route("/genre/{id}", name="genre_show")
     */
    public function genreShow($id, ProduitRepository $repo)
    {
        $produits = $repo->findBy(array("genre" => $id));

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
        return $this->render('bd/genreShow.html.twig',[
            'produits' => $produits,
            'couvertures' => $couvertures
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('bd/about.html.twig',[
            'title' => 'Qui nous sommes?'
        ]);
    }

}
