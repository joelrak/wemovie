wemovie
=================================
simple blog de cinema

Prérequis:
------------------
Docker
PHP8+ 
Nginx

Installation
------------------
Récupération du dépôt:

```bash
git clone https://github.com/joelrak/wemovie.git
```

Initialisation et lancement du projet
--------------------------------------
```bash
$ docker compose up -d
```

```bash
$ docker compose exec php-fpm composer install
```

```bash
$ docker compose exec php-fpm npm install
```

```bash
$ docker compose exec php-fpm yarn encore dev
```

Pour appliquer/compiler les css et js

```bash
$ docker compose exec php-fpm npm run build
```

```bash
$ docker compose exec php-fpm php bin/console assets:install
```
