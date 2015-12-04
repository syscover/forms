# Forms App to Pulsar / Laravel 5.1

Forms es una aplicación que gestiona formularios, registra cualquier formulario en una base de datos, las características más destacadas de forms son:
* Envío de formularios tanto por ajax como por submit
* Reenvío de formularios a tantos correos como se desee
* Crear estados personalizados
* Asignar estados a cada registro de cada formulario
* Crear comentarios para cada registro
* Mantener informado vía email, de cada cambio de estado o nuevo comentario realzado sobre un registro

---

## Installation
Para instalar este módulo es necesario tener instalado previamente el módulo pulsar, visitar el repositorio de [Pulsar](https://github.com/syscover/pulsar) en caso de no tenerlo instalado.

**1 - After install Laravel framework, insert on file composer.json, inside require object this value**
```
"syscover/forms": "dev-master"

```
and execute on console:
```
composer update
```

**2 - Register service provider, on file config/app.php add to providers array**

```
Syscover\Forms\FormsServiceProvider::class,

```

**3 - To publish package and migrate**

and execute composer update again:
```
composer update
```

**4 - Run seed database**

```
php artisan db:seed --class="FormsTableSeeder"
```


**5 - Activate package**

Access to Pulsar Panel, and go to Administration -> Permissions -> Profiles, and set all permissions to your profile by clicking on the open lock.

**6 - Implementation**

Una vez instalado y activado el package, debemos de instanciar una cuenta de envío dentro:

Administración -> Cuentas

Para ello necesitaremos tanto datos del servidor como usuario y contraseña.


Tambien necesitaremos crear



Para realizar la implementación en javascript hay que añadir la siguiente librería en la página donde vayas a implementar tu formulario
```
<script type="text/javascript" src="{{ asset('packages/syscover/forms/vendor/jquery.forms/jquery.forms.js') }}"></script>
```

Después tienes que declarar el plugin de javascript que adaptará tu formulario para que sea enviado y registrado en la base de datos
```
$('#form').forms({
    id: 1,
    debug: false,
    ajax: true,
    fields: {
        name: 'name',
        email: 'email',
        subject: 'subject',
        data: ['message','field-1','field-2','field-3', ...] // here you can add fields
    }
}, function(response){

    if(response.success)
    {
        // form submit successful
    }

}).on('forms:submit', function(event){
    // here check your form, if are any error to stop execution use event.preventDefault();

}).on('forms:error', function(event, error) {
    console.log(event);
    console.log(error);
});

```

Puerdes añadir propiedades a tu formulario mediante atributos data
```
data-length: Tamaño del campo que tendrá en el panel de control
data-label: Título del campo que se le asignará
```

Configura en tu fichero de variables de entorno las siguientes variables, si usas Google ReCaptcha
```
GOOGLE_RECAPTCHA_SECRET_KEY=your secret key
GOOGLE_RECAPTCHA_SITE_KEY=your site key
```