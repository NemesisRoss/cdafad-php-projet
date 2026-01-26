<?php

namespace App\Controller;

use App\Controller\AbstractController;

class RegisterController extends AbstractController
{
    //Méthode pour s'inscrire
    public function register(): mixed
    {
        return $this->render("register", "S'inscrire");
    }

    //Méthode pour se connecter
    public function login(): mixed
    {
        return $this->render("login", "Se connecter");
    }

    //Méthode pour se connecter
    public function logout(): void
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}
