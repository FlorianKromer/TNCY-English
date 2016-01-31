# TNCY-English
Projet de fin d'année en anglais.

Developpement en binomes d'un outil informatique qui permet de travailler l'anglais.
Cet outil peut permettre, par exemple, de réviser un point de grammaire, voir un aspect de civilisation, observer un fait de langue, faire un exercice de compréhension (écrire ou orale).

##installation
* composer install
* php app/console doctrine:database:create
* php app/console doctrine:schema:update --force
* php app/console doctrine:fixture:load
* php app/console fos:user:create 
* php app/console fos:user:promote (avec pour role SUPER_ADMIN)

## Developpement

### Ajouter une route
* dans le dossier src/tncy/schoolbundle/resources/config/routing.yml
* duppliquer une route existante, , renommer
* dans le dossier src/tncy/schoolbundle/controller/
* ajouter une méthode dans le controller correspondant à celui saisi dans la route

### Ajouter une nouvelle entité
* dans le dossier src/tncy/schoolbundle/entity
* duppliquer une entité existante, renommer, ajouter des champs
* generer les getter/setters php app/console doctrine:generate:entities TNCYSchoolBundle
* generer la table via l'orm  php app/console doctrine:schema:update --force

### Ajouter des données (fixtures)
* dans le dossier src/tncy/schoolbundle/datafixture
* duppliquer une classe existante, renommer, changer l'ordre de chargement des fixtures
* ajouter des objets dans la méthode load, puis faire un flush
* pour charger les nouvelles données : php app/console doctrine:fixture:load

### Ajouter une admin
* dans le dossier src/tncy/schoolbundle/admin
* duppliquer une classe existante, renommer, ajouter des champs
* dans le dossier src/tncy/schoolbundle/resources/config/admin.yml
* duppliquer un service en changeant le nom
* dans le dossier app/config/conf/sonata.yml
* ajouter un item au bon endroit dans la dashboard

### Modifier le menu
* dans le dossier src/tncy/schoolbundle/menu
* duppliquer un lien existante, renommer, modifier la route

## Soutenance
Présentation lors d'une soutenance de 18 à 20 minutes de manière stucturée avec démonstration.

## Rapport
Rapport imprimé de 5 à 10 pages comportant une doc technique et une doc utilisateur
Le rapport doit etre organisé, c'st à dire aller du simple au plus compliqué, du moins important au plus important. Ne pas oubliez l'introduction et le conclusion.

### Documentation Technique
Sera rédigée en français présente la mise en oeuvre informatique, les problèmes techinques et leurs solutions. En annexe une liste des sources utilisées.

### Documentation Utilisateur
Rédigée en anglais est une présentation de l'outil et une sorte de mode d'emploi

## Evalutation
* prononciation
* qualité de la grammaire
* vocabulaire et expressions
* présence, charisme, professionnalisme dans la présentation de l'outil
* contenu de la présentation
* capacité à répondre aux questions
* intéret du logiciel
* contenu du rapport
* structure du rapport

# Credits
* memory game https://github.com/callmenick/Memory
* text to speech http://responsivevoice.org/
* bootstrap https://github.com/twbs/bootstrap
* bootstrap material design https://github.com/FezVrasta/bootstrap-material-design
* 

