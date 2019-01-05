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
- Fichier etc/hosts (définition par 2 fois de 127.0.0.1 en tant que localhost mais aussi microcms.)
