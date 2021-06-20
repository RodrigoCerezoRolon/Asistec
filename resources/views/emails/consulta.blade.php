@component('mail::message')

<h1>Ha recibido una consulta de: {{$usuario->Nombre}},{{$usuario->Apellido}}</h1>

<h2>El correo del cliente interesado es: {{$usuario->Email}}</h2>
<h2>El telefono es: {{$usuario->Telefono}}</h2>
<h3>La consulta que ha realizado es: {{$usuario->Msg}}</h3>

Saludos,<br>


@endcomponent
