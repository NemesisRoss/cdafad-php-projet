<?php

//gérer les routes

include '../vendor/autoload.php';

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

//Comparer avec la liste d'url :
switch ($path) {
    case '/':
        echo "accueil";
        break;
    case '/login':
        echo "login";
        break;
    case '/register':
        echo "enregistrement";
        break;
    default:
        echo "erreur 404";
        break;
}