<?php

// Home page
$app->get('/', function () use ($app) {
    $articles = $app['dao.article']->findAll();

    return $app['twig']->render('index.html.twig', array('articles' => $articles));
});

// Silex permet de définir des routes, c'est-à-dire des points d'entrée dans l'application.
// A chaque route est associée une réponse construite par notre code.
// une fonctione qui gère une route est appelée un contrôleur.
