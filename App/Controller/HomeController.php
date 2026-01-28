<?php

namespace App\Controller;

use App\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(): mixed
    {
        return $this->render("home","Accueil");
    }

    public function test(int $nbr) 
    {
        echo "valeur saisie " . $nbr;
    }
}
