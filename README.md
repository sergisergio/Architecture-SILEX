# Architecture-SILEX

## Repository basé sur le cours https://openclassrooms.com/fr/courses/2560666-evoluez-vers-une-architecture-php-professionnelle-avec-silex

***Partie1***

- Création de la base de données
- Création du fichier index.php avec une boucle foreach pour récupérer les articles.

***Partie2***

- Passage à une architecture MVC.
- Création d'un fichier model.php et view.php.
- Modification de index.php (qui appelle model et view).

***Partie3***

- Intégration du framework PHP SILEX
- Récupération de SILEX via Composer
- Création d'un fichier .gitignore pour exclure le nouveau dossier /vendor.
- Création des sous-répertoires (app, db, src, views et web).
- Déplacements des fichiers dans leurs dossiers.
- Création d'un fichier routes.php dans app.
- Modification de index.php en tant que contrôleur frontal.
- Création d'un fichier .htaccess dans le dossier web.
- Définition d'un hôte virtuel (httpd-vhosts.conf).
- Activation du virtualhost dans httpd.conf (na pas oublier d'abord localhost puis microcms en mettant le bon chemin relatif).
- Fichier etc/hosts (définition par 2 fois de 127.0.0.1 en tant que localhost mais aussi microcms.).

***Partie4***

- Contrairement à de nombreux autres lanages (Java, C#, etc...), PHP est né d'une idée personnelle et a évolué au fur et à mesure des besoins jusqu'à devenir le principal langage serveur du web, avec une communauté très importante.
- L'omission de la balise ?> est conseillée pour les fichiers qui ne contiennent que du code PHP pur. Cel apermet d'éviter de déclencher l'affichage de la sortie si le fichier contient un espace ou une ligne vide après le ?>.
- L'architecture MVC permet de répartir son code source en 3 parties aux responsabilités bien distinctes: le Modèle pour l'accès aux données et la logique métier, la Vue pour les interactions avec l'utilisateur et le Contrôleur pour faire le lien entre Modèle et Vue.
- Le contrôleur reçoit la requête puis la traite en utilisant les services du Modèle puis en générant une Vue.
- C'est dans la partie Vue que sont regroupées les pages HTML incluant des données PHP dynamiques. Les autres parties de l'application ne contiennent que du code PHP pur.
- Dans une architecture en couches, chaque partie ne communique qu'avec les couches adjacentes. Dans une architecture MVC, les 3 parties sont en interaction.
- La refactorisation est une pratique qui consiste à modifier l'architecture d'une application sans introduire de nouvelles fonctionnalités, afin d'améliorer sa qualité et/ou ses performances.
- Composer est l'outil standard du monde PHP pour gérér les dépendances entre projets.
- Silex et Symfony ont été tous deux crés par la société française SensioLabs.Ils reposent sur les mêmes composants, mais Silex est minimaliste (on parle de microframework) alors que Symfony est uen solution complète (on parle de framework full stack).
- Une application web utilise un contrôleur frontal (le fichier web/index.php dans notre exemple) pour centraliser la gestion des requêtes entrantes).

***Partie5***

- Amélioration de la partie Modèle avec une modélisation orienté objet des données métier (Article).
- Création du sous-dossier Domain dans src dans lequel on met notre classe Article.
- Passage de PDO à DoctrineDBAL(couche d'abstraction de base de données).
- Création du sous-dossier DAO dan src dan slequel on met notre classe ArticleDAO.
- Mise à jour de l'application dans composer.json avec autoload.
- composer update
- Création du fichier app.php dans le dossier app pour le paramétrage.
- Création du dossier app/config et fichiers prod.php et dev.php.
- Ajout du contrôleur défini dans app/routes.php.
- Modification de views/view.php car les données sont maintenant représentées sous form d'objets.
- Modification du contrôleur frontal web/index.php.

***Partie6***

- Pour l'instant, pas de templates puis code non sécurisé...
- Intégration de Twig via composer.
- Ajout de l'enregistrement de Twig dans app/app.php
- Mise en place d'un template Twig pour afficher la liste des articles (index.html.twig).
- Suppression de views/view.php
- Modification de la route dans app/routes.php pour générer la nouvelle vue.

***Partie7***

- Installation de Bootstrap et de jQuery.
- Ajout de composants Symfony (twig-bridge et asset).
- Déclarer le nouveau service AssetServiceProvider dans app/app.php
- réécriture de la vue avec Bootstrap.
- suppression Asset car çà ne fonctionnait pas ici et ce n'est pas mon objectif dans ce cours.

***Partie8***

- Mise à jour de la base de données (table Comment avec clé etrangère).
- Création de la classe Comment dans src/Domain.
- Création de CommentDAO dans DAO.
- Création d'une classe abstraite DAO dans DAO dont hériteront ArticleDAO et CommentDAO.
- Ajout d'une méthode find($id) dans ArticleDAO.

- Création d'un layout.html.twig
- Asset et Path ne fonctionnant pas: j'ai mis des liens "normaux".

- Mise à jour du contrôleur dans app/app.php pour enregistrer le nouveau service d'accès aux commentaires.

- Ajout d'une nouvelle route  dans app/routes.php.

***Partie9***

- Gestion de la sécurité
- Ajout de commentaires à un article seulement par les utilisateurs enregistrés.
- Authentification et autorisation.
- gestion des mots de passe.
- Création de la table t_user (voir structure2.sql).
- Installation du composant Symfony.

- Création de User dans src/Domain.
- Modification de la classe Comment.
- Création de UserDAO dans src/DAO.

- Mise à jour du contrôleur dans app/app.php

- Ajout d'une route pour afficher le formulaire d'authentification.

- Modifications des vues (roles, etc...).

- NB: les asset et path fonctionnent avec asset et twig-bridge 4.2...

***Partie10***

- Ajout de commentaires à un article.
- Ajout d'un formulaire dans la vue qui affiche les détails sur un article.
- Utilisation du composant Form (créer un formulaire web à partir d'un objet).
- composer: ajout de form, translation et config.(MAJ 4.2)
- Création d'un dossier src/Form/Type.
- Ajout d'un nouveau fichier CommentType.
- Modification de la classe CommentDAO.
- Enregistrement des nouveaux fournisseurs de services dans app/app.php
- Mise à jour du fichier app/routes.php pour créer le formulaire d'ajout d'un commentaire.
- Modification de article.html.twig.
- Test ajout commentaire OK.

***Partie11***

- Mise en place d'un back-office.
- définition d'un rôle admin(voir content2.sql).
- Mise à jour de app/app/php (role-hierarchy et access_rules).
- Modification de views/layout.html.twig.
- Ajout de la route dans app/routes.php.
- Ajout d'une méthode findAll dans CommentDAO.
- Ajout d'une méthode findAll dans UserDAO.
- Composer: ajout de twig/extensions et symfony/validator.
- Intégration de ces nouveaux composants dans app/app.php.
- Modification du css pour la partie admin.
- Création du fichier views/admin.html.twig

- gestion des articles.
- Création de src/Form/Type/ArticleType.php
- Création de views/article_form.html.twig
- Modification de src/DAO/ArticleDAO.php pour y ajouter les méthodes de sauvegarde et de suppression d'un article.
- Modification de CommentDAO (si on supprime un article, les commentaires doivent être supprimés).
- Ajout des routes dans app/routes.php.
- Test d'ajout d'un article OK.
- Test de modification d'un article OK.
- Test de suppression d'un article OK.

- gestion des commentaires.
- Création d'un fichier views/comment_form.html.twig.
- Modification de views/admin.html.twig.
- Modification de src/DAO/CommentDAO.php.
- Ajout des contrôleurs dans app/routes.php.
- Ajout commentaire OK.
- Modification commentaire OK.
- Suppression commentaire OK.

- gestion des utilisateurs.
- Création de src/Form/Type/UserType.php
- Création d'une vue user_form.html.twig
- Modification d'admin.html.twig
- Ajout des méthodes de modification et de suppression dans UserDAO.
- Modification de CommentDAO(supprimer tous les commentaires liés à un utilisateur)
- Ajout des use et contrôleurs dans app/routes.php
- Ajout, Modification et suppression d'un utilisateur OK.

***Partie12***

- Durant la phase d'authentification, l'utilisateur s'identifie auprès de l'application. Celle-ci tente ensuite de le reconnaître. Ensuite, l'application détermine si l'utilisateur reconnu peut accéder à la ressource demandée: c'est la pahase d'autorisation.
- Un pare-feu permet de déterminer si un utilisateur doit être authentifié et de débuter le processus d'authentification/autorisation.
- Les algorithmes de hachage étant unidirectionnels, il n'existe aucune possibilité de revenir au mot de passe initial.
- En ajoutant des données au mot de passe avant son cryptage, le salage diminue le risque de réussite d'une attaque par dictionnaire.
- L'interface UserProviderInterface regroupe les déclarations des méthodes à redéfinir pour récupérer les données des utilisateurs depuis une source externe (BDD, etc...).
- Centraliser la définition du formulaire dans une classe permet d'optimiser l'organisation et la réutilisabilité.
- La méthode $app->match permet de gérer tous les types de requêtes HTTP (GET, POST, PUT, etc). Elle est utile pour la gestion des formulaires, qui peuvent être affichés (GET) ou soumis (POST).
- On appelle parfois front-office la partie de l'application en contact direct avec ses utilisateurs. Le back-office est l'interface d'administration.
- Symfony gère nativement la notion de rôle. C'est le rôle d'un utilisateur qui permet de déduire ses droits d'accès aux ressources de l'application.
- Si on utilise le type de champ repeated dans la définition du formumaire, Symfony vérifiera automatiquement que les deux saisies correspondent.

***Partie13***

- Préparation pour la production.
- Ajout de phpunit, browser-kit et css-selector
- Création à la racine du dossier tests/Tests
- Ajout de AppTest.php
- Ajout d'un fichier phpunit.xml.dist à la racine.
- Modification du fichier app/config/dev.php
- vendor/bin/phpunit (tests OK).

- Journalisation.
- Ajout de monolog-bridge
- Modification de app/config/prod.php
- Modification de app/config/dev.php
- Modification de app/app.php.
- Les évènements seront enregistrés dans var/logs/microcms.log
- La barre d'outils Symfony ne sera activée que si on utilise app/config/dev.php
- Création du dossier var/logs.
- A présent, le fichier var/logs/microcms.log enregistre les principaux évènements de l'application.

- Gestion des erreurs
- Modification du fichier app/app.php
- Création du fichier views/error.html.twig

- Mise en production
- Il faudra utiliser le fichier app/config/prod.php à la place de app/config/dev.php dans le contrôleur frontal web/index.php
- Sur le serveur de production, il faudra installer les dépendances avec l'option --no-dev (composer install --no-dev)

***Partie14***

- Ajout d'une API JSON
- Interface offerte par une application à destination d'autres applications. Une API exposée via le protocole HTTP(S) est appelée un service web.
- Fonctionnalités: consultation, ajout, suppression d'un article.
- Modification de app/routes.php
- Affichage via http://microcms/api/articles
- Installation de jsonview pour chrome pour afficher le JSON (sinon utiliser Postman).
- Entêtes de la réponse HTTP = code 200
- format: application/json

- création de l'API de modification
- Modification de app/routes.xml et de app/app.xml
- On peut ajouter un article via http://microcms/api/article
- Méthode POST et application/json (remplir le JSON dans le body)
- Code 201

- Suppression de l'article via http://microcms/api/article/5
- Méthode DELETE
- Code 204

- Mise à jour des test fonctionnels en rajoutant 2 adresses API.
- 11 tests OK via vendor/bin/phpunit.

***Partie15***

- Réorganisation des contrôleurs (car tout est centralisé dans app/routes.php).
- Les contrôleurs vont devenir des méthodes définies dans des classes.
- Création du dossier src/Controller
- Création du fichier HomeController (Accueil) et déplacement de méthodes.
- Création du fichier AdminController.
- Création du fichier APIController.
- réécriture des routes
- Lancement des tests fonctionnels pour vérification: tests OK

***Partie16***

- Génération des formulaires qui utilisent les styles CSS de Bootstrap.
- Modification de views/article_form.html.twig
- Mise en place des contraintes.
- Vérification du service ValidatorServiceProvider dans app.php
- Modification de articleType.php et de CommentType.php
- NB: problème sur CommentType. je n'ai laissé que le content et commenté le reste...

***Partie17***

- Résumé
- Séparation des responsabilités selon le principe MVC.
- intégration du micro-framework Silex.
- modélisation objet du domaine et de l'accès aux données.
- utilisation de namespaces et autoload des classes grâce à Composer.
- intégration du moteur de templates Twig.
- utilisation du framework Bootstrap.
- gestion avancée de la sécurité et des formulaires.
- back-office d'administration.
- tests fonctionnels automatisés utilisant PHPUnit.
- journalisation et gestion des erreurs.
- API utilisant le format JSON.
- Validation des formulaires.
- Qualité: SensioLabsInsight, Codacy, CodeClimate, Scrutinizer...
- Aller plus loin: internationalisation, Laravel, Symfony...

***Partie 18***

- Contrairement à un test unitaire qui s'intéresse à un seul élément de l'application, un test fonctionnel valide uen fonctionnalité globale.
- La librairie PHPUnit consiste le standard pour automatiser des tests unitaires ou fonctionnels en PHP.
- Les méthodes dont le nom commence par "test" sont identifiées par PHPUnit comme des méthodes de test et exécutées automatiquement.
- L'entrée require-dev d'un fichier composer.json permet de regrouper les dépendances uniquement liées au développement.
- En phase de production, produire trop d'évènements de jorunalisation risque de diminuer les performances d'une application. Cependant, elle doit produire des évènements de jorunalisation lorsque des problèmes apparaissent, afin d'aider au débogage.
- Une API (Application Programming Interface) permet un accès programmatique aux services offerts par une application.
- Le format JSON (Javascript Objet Notation), plus simple à utiliser, a détrôné XML comme standard pour les échanges de données entre applications web.
- On peut définir des contrôleurs sous forme de méthodes dans n'importe quelle classe, sans besoin d'hériter d'une classe particulière.

***NotaBENE***

1) Après la partie 8, donc avant la partie sécurité, il y a une activité :
- Afficher des informations sur des livres à partir d'une base de données fournie.
- Page d'accueil avec la liste des livres. Page de détail d'un livre.
- Utilisation sans aucune modification des scripts SQL fournis pour la BDD .
- Respect de l'architecture: domaine, DAO, contrôleur frontal.
- Qualité du code.
- Code source initial : https://github.com/bpesquet/OC-MyBooks
- Forker puis cloner, créer la BDD, faire les 2 fonctionnalités.

2) A la fin du cours, il y a une deuxième activité :
- Enrichir une application web existante.
- Code source initial : https://github.com/bpesquet/OC-WebLinks
- Afficher des liens web comme reddit
- Fonctionnalités demandées : correction des imperfections de l'application initiale, possibilité pour un utilisateur connecté de soumettre un nouveu lien web.
- back-office d'administration affichant les listes des liens et des utilisateurs, édition et suppression d'un lien ou d'un utilisateur dans le back-office, API JSON de consultation de la liste des liens(/api/links) et des détails sur un lien(/api/link/{id}), test focntionnels automatisés des URL de consultation (6 URL à tester), journalisation et gestion des erreurs, contrôleurs écrits sous forme de classes.
- Utilisation sans aucune modification des scripts SQL fournis pour la BDD.
- respect de l'architecture.
- L'acc§s aux URL /link/submit et /admin doit être soumis à la possession par l'utilisateur du rôle adéquat.
- Qualité du code.
- Forker puis cloner, créer la BDD, hôte virtuel, fonctionnalités demandées.
- exemple en ligne: https://oc-weblinks.herokuapp.com/






