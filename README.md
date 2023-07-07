# Laravel Nova Template
## Frameworks
* PHP 7.4.30
* Laravel 8.83.27
* Laravel Nova 4.26.3
* Modificar "Unregistered" en public/vendor/nova/app.js

### Packages
- [Logo URL](https://novapackages.com/packages/formfeed-uk/nova-logo-url)
- [Laravel Auditing](https://laravel-auditing.com/guide/installation.html)

### Commandos utilizados (no repetir)
```
composer require formfeed-uk/nova-logo-url
composer require owen-it/laravel-auditing
php artisan vendor:publish --provider "OwenIt\Auditing\AuditingServiceProvider" --tag="config"
php artisan vendor:publish --provider "OwenIt\Auditing\AuditingServiceProvider" --tag="migrations"

```
# Guia de instalación
### Configurar repositorio
```
git init
git remote add origin https://gitlab.psa.gov.ar/desarrollo/nova/
git checkout -b TuUsuarioPsa
git pull origin main
```
Crear una base de datos llamada 'nova' o configurar la base de datos en el archivo .env

### Levantar app
Ejecutar los comandos
```
start cache
start proxy
```

Ingresar a la URL: http://localhost:8000/nova

Credenciales:
```
Usuario: admin@admin.com
Contraseña: admin
```
## Primeros pasos en Nova

Crear modelo y migracion (php artisan make:model Test -m)

Migrar tabla (php artisan:migrate)

Crear recurso (php artisan nova:resource Test)

Visualizar recurso dentro del codigo en: app\Nova\Test.php

Visualizar recurso en la pagina en: /resources/tests (tambien aparecera en el menu izquierdo)
 
"# nova" 
