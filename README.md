Bourses API
===================

----------

Installation
-------------

### Arborescence

L'arborescence doit être la suivante :

/var/www/html/bourses
:   - <b>api</b> (repository <b>bourses-api</b>)
:   - <b>front-office</b> (repository <b>bourses-front-office</b>)


### Clonage 

Lancer la commande suivante :
```
$ git clone https://github.com/maximebourdel/bourses-api.git
```

### Fichier parameters.yml
Le fichier est à déposer dans <b>/app/config</b> fichier <b>parameters.yml</b>
```yml
# This file is auto-generated during the composer install
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: bourses
    database_user: root
    database_password: root
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: null
    mailer_password: null
    secret: ????????????????
    cors_allow_origin: http://localhost
    api_name: YahooFinanceAPI
    api_description: Cette API permet d'interagir avec le Modèle des Bourses
```

### Installation de la base de données et des tables

```sh
$ cd /var/www/html/bourses/api
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
```


### Import des librairies
La commande suivante va installer les librairies :
```
$ composer update
```

Vérification : la commande suivante ne doit pas retourner d'erreur
```
$ php bin/console
```

### Autoriser les accès depuis n'importe quel serveur
Dans le répertoire <b>web</b> pour le fichier <b>app_dev.php</b> :
Supprimer les lignes 
```php
// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}
```


### Configurer apache2
Dans le répertoire <b>/etc/apache2</b> dans le fichier <b>apache2.conf</b> , et ajouter à la fin du fichier :
```
<VirtualHost *:80>

    ServerName bourses-online.com
    ServerAlias www.bourses-online.com

    Alias /api /var/www/html/bourses/api/web

    DocumentRoot /var/www/html/bourses/front-office/dist

    <Directory /var/www/html/bourses/front-office/dist>
        AllowOverride None
        Order Allow,Deny
        Allow from All

        RewriteEngine on

        # Don't rewrite files or directories
        RewriteCond %{REQUEST_FILENAME} -f [OR]
        RewriteCond %{REQUEST_FILENAME} -d
        RewriteRule ^ - [L]

        # Rewrite everything else to index.html
        # to allow html5 state links
        RewriteRule ^ index.html [L]


    </Directory>

</VirtualHost>
```
Redémarrer ensuite apache :
```
$ sudo service apache2 restart
```

