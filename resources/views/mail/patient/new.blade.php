@component('mail::message',
[
'email' => $email, 
'name' => $name,
"password" => $password])

# Bienvenido al club

Estimado {{$name}},

Le informamos que su solicitud para ingresar al club ha sido aprobada, por lo tanto desde
este momento usted ya es miembro del club

ya cuenta con permisos para hacer uso de la aplicación movil, con las siguientes credenciales:

**Usuario**: {{ $email }} 

**Contraseña**: {{ $password }}

Atentamente el equipo de<br>
{{ config('app.name') }}
@endcomponent