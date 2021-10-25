<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recette;
use App\Repository\RecetteRepository;
use App\Entity\Category;
use App\Repository\CategoryRepository;


class AccueilController extends AbstractController
{
    private $repoRecette;
    private $repoCategory;
    public function __construct(RecetteRepository $repoRecette,
    CategoryRepository $repoCategory){
        $this->repoRecette = $repoRecette;
        $this->repoCategory = $repoCategory;
    }
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        $repoRecettes = $this->getdoctrine()->getRepository(Recette::class);
        $recettes = $repoRecettes->findAll();
        //dd($recettes);
        
        return $this->render("accueil/index.html.twig", ['recettes'=>$recettes]);
    }
     /**
     * @Route("/show/{id}", name="show")
     */
    public function show($id): Response
    {
        $repoRecette = $this->getDoctrine()->getRepository(Recette::class);
        $recette = $repoRecette->find($id);
        if(!$recette){
            return $this->redirectToRoute('accueil');
        }
        
        return $this->render("show/index.html.twig",[
            'recette' => $recette,
        ]);
    }
    /**
     * @route("accueil/listCategory/", name="listCategory")
     */
    public function accueilListCategory(?Category $category): Response{

        $categories = $this->repoCategory->findAll();
        return $this->render("accueil/listCategory/index.html.twig", ["categories"=>$categories]);
    }
     /**
     * @Route("show/byCategory/{id}", name="byCategory")
     */
    public function showByCategory(?Category $category): Response
    {
        if($category){
            $recettes = $category->getRecettes()->getValues();
        }else{
            return $this->redirectToRoute('accueil');
        }
       //dd($recettes);
       
        $categories = $this->repoCategory->findAll();
        return $this->render("show/byCategory/index.html.twig", [
            'recettes' => $recettes,
            'categories' => $categories
        ]);
    }
}