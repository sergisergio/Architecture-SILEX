<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__.'/../app/config/dev.php';
require __DIR__.'/../app/app.php';
require __DIR__.'/../app/routes.php';

$app->run();

// CONTROLEUR FRONTAL

// Il centralise la gestion des requêtes HTTP entrantes.
// On instancie l'objet Silex principal $app, on active les infos de debug puis on inclut la définition des routes de l'application routes.php.

