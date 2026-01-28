<?php

namespace App\Service;

use App\Entity\Category;
use App\Entity\Quizz;
use App\Entity\Entity;
use App\Entity\User;
use App\Entity\Media;
use App\Utils\Tools;
use App\Repository\CategoryRepository;
use App\Repository\QuizzRepository;

class QuizzService
{
    //Attributs
    private QuizzRepository $quizzRepository;

    public function __construct() {
        $this->quizzRepository = new QuizzRepository();
    }

    public function addQuizz(array $post): string 
    {
        //Test si les champs obligatoires sont remplis
        if (empty($post["title"]) || empty($post["description"])) {
            return "Les champs ne sont pas tous remplis";
        }

        //Test si l'utilisateur est connecté
        if (!isset($_SESSION["user"])) {
            return "L'utilisateur n'est pas connecté";
        }

        //Nettoyer les entrées utilisateur
        Tools::sanitize_array($post);
        
        //Création de l'objet Quizz
        $quizz = $this->createQuizz($post);

        //Ajout en BDD
        $this->quizzRepository->save($quizz);

        return "Le quizz " . $quizz->getTitle() . " a été ajouté en BDD";
    }

    private function createCategories(Quizz $quizz, array $categories): Quizz 
    {

        foreach ($categories as $key => $value) {
           $cat = new Category();
           $cat->setId($value);
           $quizz->addCategory($cat);
        }

        return $quizz;
    }

    private function createQuizz(array $post): Quizz
    {
        //Créer un objet Quizz
        $quizz = new Quizz();
        $quizz
            ->setTitle($post["title"])
            ->setDescription($post["description"])
            ->setCreatedAt(new \DateTimeImmutable());
        //Ajout des categories
        $quizz = $this->createCategories($quizz, $post["categories"]);
        //Créer un User
        $author = new User();
        $author->setId($_SESSION["user"]["id"]);
        //Setter l'author (User connecté)
        $quizz->setAuthor($author);

        return $quizz;
    }
}