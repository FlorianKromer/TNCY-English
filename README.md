# EnjoyLearning
Projet de fin d'année en anglais dans le cadre de notre formation d'ingénieur à l'école Telecom Nancy.

Developpement en binomes d'un outil informatique qui permet de travailler l'anglais.
Cet outil peut permettre, par exemple, de réviser un point de grammaire, voir un aspect de civilisation, observer un fait de langue, faire un exercice de compréhension (écrire ou orale).

![Aperçu](http://img15.hostingpics.net/pics/373258Capture.png)

# Installation

```bash
composer install
php app/console doctrine:database:create (pour créer la base de données)
php app/console doctrine:schema:update --force (pour créer les tables)
php app/console doctrine:fixture:load (pour charger des données de tests)
php app/console sonata:news:sync-comments-count (pour syncho les commentaires avec les news)
sh bin/build.sh (pour recopier les assets)
```

# Credits

## PHP
* [Symfony 2.6.*](https://symfony.com/)
* [Sonata-admin ](https://sonata-project.org/)
* [soundcloud api](https://developers.soundcloud.com/)
* [musixmatch api](https://developer.musixmatch.com/)

## Js
* [memory game](https://github.com/callmenick/Memory)
* [text to speech](http://responsivevoice.org/)


## Css
* [bootstrap v3](https://github.com/twbs/bootstrap)
* [bootstrap material design](https://github.com/FezVrasta/bootstrap-material-design)

## Pictures
* https://www.flickr.com/photos/chrisyarzab/5777829523/in/photostream/
* https://unsplash.com/photos/SpVHcbuKi6E
* http://fr.freepik.com/vecteurs-libre/fruit-icon-collection_838780.htm

