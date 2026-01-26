<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Utils\Tools;
use App\Repository\CategoryRepository;
use App\Entity\Category;
use App\Entity\EntityInterface;

class CategoryController extends AbstractController
{
    private CategoryRepository $categoryRepository;

    //Injection du UserRepository
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function addCategory()
    {
        $data = [];
        //Test si le formulaire est submit
        if ($this->isFormSubmitted($_POST,  "submit")) {
            //Test si les champs sont remplis
            if (!empty($_POST["name"])) {
                //Test si la categorie n'existe pas déja
                if (!$this->categoryRepository->isCategoryExist($_POST["name"])) {
                    //Nettoyage des données
                    Tools::sanitize_array($_POST);
                    //créer un objet Category
                    $category = new Category();
                    //Set des attributs
                    $category
                        ->setName($_POST["name"])
                        ->setCreatedAt(new \DateTimeImmutable());
                    //ajout en BDD
                    $this->categoryRepository->save($category);
                    $data["msg"] = "La categorie a été ajouté en BDD";
                } else {
                    $data["msg"] = "La categorie existe déjà en BDD";
                }
            }
            //Sinon les champs ne sont pas remplis 
            else {
                $data["msg"] = "Veuillez remplir les champs du formulaire";
            }
        }
        return $this->render("add_category", "Creer une catégorie", $data);
    }
}
