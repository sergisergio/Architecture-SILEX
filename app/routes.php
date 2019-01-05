<?php

// Home page
$app->get('/', function () {
    require '../src/model.php';
    $articles = getArticles();

    ob_start();             // start buffering HTML output
    require '../views/view.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});

// Silex permet de définir des routes, c'est-à-dire des opints d'netrée dans l'application.
// A chaque route est associée une réponse construite par notre code.
// une fonctione qui gère une route est appelée un contrôleur.
