<?php

namespace App\Repository;

use App\Repository\AbstractRepository;
use App\Entity\Entity;
use App\Entity\Quizz;
use Dotenv\Parser\Entry;

class QuizzRepository extends AbstractRepository
{
    public function find(int $id): ?Quizz
    {
        return null;
    }

    public function findAll(): array
    {
        return [];
    }

    private function saveQuizz(Entity $entity): ?Quizz
    {
        try {
            //1 Ecrire la requête
            $sql = "INSERT INTO quizz(title, `description`, created_at, author_id)
            VALUE(?,?,?,?)";
            //2 préparer la requête
            $req = $this->connect->prepare($sql);
            //3 Assigner les paramètres (bindValue)
            $req->bindValue(1, $entity->getTitle(), \PDO::PARAM_STR);
            $req->bindValue(2, $entity->getDescription(), \PDO::PARAM_STR);
            $req->bindValue(3, $entity->getCreatedAt()->format("Y-m-d"), \PDO::PARAM_STR);
            $req->bindValue(4, $entity->getAuthor()->getId(), \PDO::PARAM_INT);
            //4 Exécuter la requête
            $req->execute();
            //5 récupérer l'id
            $id = $this->connect->lastInsertId();
            $entity->setId($id);
        } catch(\PDOException $e){}
        return $entity;
    }

    private function saveCategories(Quizz $quizz): void
    {
        try {
            //Boucle pour ajouter toutes les categories assignées au quizz
            foreach ($quizz->getCategories() as $category) {
                //1 Ecrire la requête
                $sql = "INSERT INTO quizz_category(quizz_id, category_id)
                VALUE(?,?)";
                //2 préparer la requête
                $req = $this->connect->prepare($sql);
                //3 Assigner les paramètres (bindValue)
                $req->bindValue(1, $quizz->getId(), \PDO::PARAM_INT);
                $req->bindValue(2, $category->getId(), \PDO::PARAM_INT);
                //4 Exécuter la requête
                $req->execute();
            }
            //5 récupérer l'id
        } catch(\PDOException $e) {}
    }

    public function save(Entity $entity): Quizz 
    {
        try {
            //Créer le quizz
            $entity = $this->saveQuizz($entity);
            //Assigner les categories
            $this->saveCategories($entity);
        } catch(\PDOException $e) {}
        return $entity;
    }
}
