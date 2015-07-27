# Pulsar App to Laravel 5

Pulsar is an application that generates a control panel where you start creating custom solutions, provides the resources necessary for any web application.

---
- [Installation](#installation)


## Installation

**1 - After install Laravel framework, insert on file composer.json, inside require object this value**
```
"syscover/forms": "dev-master"

```

**2 - Register service provider, on file config/app.php add to providers array**

```
Syscover\Forms\FormsServiceProvider::class,

```

**3 - To publish package, you must type on console**

```
php artisan vendor:publish --force

```

**4 - Optimized class loader**

```
php artisan optimize

```

**5 - Run migrate database**

```
php artisan migrate
```

**6 - Run seed database**

```
php artisan db:seed --class="CronjobFormsTableSeeder"
php artisan db:seed --class="ResourceFormsTableSeeder"

```