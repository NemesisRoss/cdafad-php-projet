<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Service\UploadException;
use App\Service\UploadService;

class HomeController extends AbstractController
{
    private UploadService $uploadService;

    public function __construct()
    {
        $this->uploadService = new UploadService();
    }
    public function index(): mixed
    {
        return $this->render("home", "Accueil");
    }

    public function test(int $nbr)
    {
        echo "valeur saisie " . $nbr;
    }

    public function testUpload(): mixed
    {
        $data = [];
        
        if ($this->isFormSubmitted($_POST)) {
            try {
                $data["msg"] = "Le fichier : " . $this->uploadService->uploadFile($_FILES["upload"]) . " a été importé";
            } catch(UploadException $ue) {
                $data["msg"] = $ue->getMessage();
            }
        }

        return $this->render("upload", "test upload files", $data);
    } 
}
