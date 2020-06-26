@component('mail::message', 
[
'email' => $email, 
'name' => $name,
"appointment_date" => $appointment_date,
"doctor_name" => $doctor_name,
"location" => $location])
# Aviso de nueva cita

Estimado {{$name}},

Le informamos que su cita ha sido programada exitosamente para el dia 
{{$appointment_date}}, con el doctor {{$doctor_name}} en {{$location}}

Si usted no agendó esta cita o no esta deacuerdo con los datos suministrados, ingrese a la aplicación en el apartado de citas y cancele o reprograme su cita.


Atentamente el equipo de<br>
{{ config('app.name') }}
@endcomponent