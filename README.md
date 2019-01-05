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


