# Forms to Laravel 5.2

[![Total Downloads](https://poser.pugx.org/syscover/forms/downloads)](https://packagist.org/packages/syscover/forms)

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
"syscover/forms": "~1.0"

```
and execute on console:
```
composer install
```

**2 - Register service provider, on file config/app.php add to providers array**

```
Syscover\Forms\FormsServiceProvider::class,

```

**3 - Run publish command**

```
php artisan vendor:publish --force
```

**4 - Run migrate command**

```
php artisan migrate
```

**5 - Run seed database, but before you must execute optimize command to load seeds classes**

```
php artisan optimize
php artisan db:seed --class="PulsarTableSeeder"
```


**6 - Activate package**

Access to Pulsar Panel, and go to **_Administration->Permissions->Profiles_**, and set all permissions to your profile by clicking on the open lock.

**7 - Implementation**

Una vez instalado y activado el package, debemos de crear una cuenta de envío dentro **_Administración->Cuentas_**, necesitaremos tanto datos del servidor como usuario y contraseña de la cuenta.

Una vez creada la cuenta de correo nos vamos a la sección **_Forms->Master tables->Preferences_**, seleccionamos el estado que tendrá cada registro por defecto, si deamos cambiar o añadir más estados lo podemos realizar desde la sección **_Forms->Master tables->States_**, y la cuenta desde la que se enviarán las notificaciones.

Por último deberemos dar de alta un formulario dentro de **_Forms->Forms_**, el id del formulario nos servirá para asociar los registros al formulario, indicando el id en la rutina de javascript.


Para realizar la implementación en javascript hay que añadir la siguiente librería en la página donde vayas a implementar tu formulario
```
<script src="{{ asset('packages/syscover/forms/vendor/jquery.forms/jquery.forms.js') }}"></script>
```

Después tienes que declarar el plugin de javascript que adaptará tu formulario para que sea enviado y registrado en la base de datos
```
$('#form').forms({
    id: 1, // Aquí el ID del registro del formulario que has creada en la sección Forms -> Forms
    debug: false,
    ajax: true,
    fields: {
        name: 'name',
        surname: 'surname',
        company: 'company',
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
data-length: Tamaño del campo que tendrá en el panel de control, de 1 a 10
data-label: Título del campo que se le asignará
```

Configura en tu fichero de variables de entorno las siguientes variables, si usas Google ReCaptcha
```
GOOGLE_RECAPTCHA_SITE_KEY=your site key
GOOGLE_RECAPTCHA_SECRET_KEY=your secret key
```

Para usar Google Recapcha debes de añadir la siguiente etiqueta a tu formulario:
```
<div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
```

Forms se encargará de la validación, devolviendo el error al evento 'forms:error'

Posibles errores que te puede devolver detro del objeto error:

**Error general**
```
{
    success: false,
    code: 0,
    message: "",
    nativeError: Object
}
```

**Error por no haber pulsado el recapcha**
```
{
    success: false,
    code: 1,
    message: "reCaptcha input isn't checked",
    nativeError: null
}
```
