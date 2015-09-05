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

**7 - Access to package**
Logout from pulsar and login again, to load new resources.<br>
Access Pulsar and section Administration -> Packages, enable Forms package.<br>
Finally, give permission to the new package, access the section Administration -> Permissions -> Profiles, select your profile and click the button lock "Set all permissions"

**8 - Javascript implementation**
Para realizar la implementación en javascript hay que añadir la siguiente librería en la página donde vayas a implementar tu formulario
```
<script type="text/javascript" src="{{ asset('packages/syscover/forms/vendor/jquery.forms/jquery.forms.js') }}"></script>
```

Después tienes que declarar el plugin de javascript que adaptará tu formulario para que sea enviado y registrado en la base de datos
```

```

Puerdes añadir propiedades a tu formulario mediante atributos data
```
data-length: Tamaño del campo que tendrá en el panel de control
data-label: Título del campo que se le asignará
```