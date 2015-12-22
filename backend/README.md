# Backend

This project contains:

* Sonata admin [https://github.com/sonata-project/SonataAdminBundle]
* Knp menu [https://github.com/KnpLabs/KnpMenu]
* JMStranslation [https://github.com/schmittjoh/JMSTranslationBundle]

# Frontend

* Bootstrap [http://getbootstrap.com/]
* Material design [https://github.com/FezVrasta/bootstrap-material-design]

# Configuration

In order to configure the project:

	edit parameters.yml with yours
	composer install -v (to get vendors)
	sh bin/build.sh (to create symlinks)
	php app/console doctrine:database:create
	php app/console doctrine:schema:update --force
	php app/console fos:user:create 
	php app/console fos:user:promote (set the admin role :"ROLE_SUPER_ADMIN")
	php app/console faker:populate (for dev env)
