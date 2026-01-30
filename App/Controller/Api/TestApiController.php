<?php

namespace App\Controller\Api;

use App\Controller\AbstractController;

class TestApiController extends AbstractController 
{
    public function testJson(): mixed 
    {
        $data = ["message"=> "End point de test"];

        return $this->jsonResponse($data);
    }

    public function testJsonUpload(): mixed 
    {
        //Récupération du body
        $json = file_get_contents('php://input');

        //vérifier si on à un a json vide (pas de json)
        if (empty($json) || !json_validate($json)) {
            return $this->jsonResponse(["erreur"=>"vide ou invalide"], 400);
        }

        //convertion en tableau
        $data = json_decode($json, true);
        
        $data = ["message"=> "donnés valide"];

        return $this->jsonResponse($data);
    }
}
