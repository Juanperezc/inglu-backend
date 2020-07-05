@component('mail::message', 
[
'email' => $email, 
'name' => $name])
# Aviso de rechazo de ingreso al club

Estimado {{$name}},

Le informamos que solicitud para ingresar al club ha sido negada.
Si desea obtener mas información contacte con soporte a la siguiente dirección
soporte@inglu.software

Atentamente el equipo de<br>
{{ config('app.name') }}
@endcomponent