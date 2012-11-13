Zorbus Bootstrap Edition
========================

Setup
-----

* composer.phar create-project zorbus/bootstrap PROJECT_ROOT dev-master
* mkdir app/cache app/logs web/uploads
* setfacl -R -m u:`whoami`:rwx -m u:apache:rwx app/cache app/logs web/uploads
* setfacl -dR -m u:`whoami`:rwx -m u:apache:rwx app/cache app/logs web/uploads

Configuration
-------------

* edit app/config/config.yml for facebook parameters and other configuration
* edit app/config/parameters.yml for database parameters

Database
--------

* create tables
** php app/console doctrine:migrations:migrate

* load fixtures
** php app/console doctrine:fixtures:load

Web Server
----------

* Configure Apache VirtualHost
* Or as an alternative, if using php 5.4 or higher
** php app/console server:run

And then visit http://localhost:8080/admin/dashboard
Username: zorbus and Password: 1234567