@component('mail::message', 
[
'email' => $email, 
'name' => $name,
"recover_password" => $recover_password,
])
# Recuperación de contraseña

Estimado {{$name}},

Este mensaje fue enviado porque se introdujo su correo en la 
seccion de "Olvidó su contraseña".

Le informamos que su nueva clave es la siguiente:

{{$recover_password}}

Luego de ingresar, cambie su contraseña lo mas pronto posible.

Atentamente el equipo de<br>
{{ config('app.name') }}
@endcomponent