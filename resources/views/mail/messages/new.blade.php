@component('mail::message')
# ¡Se han comunicado con nosotros!


{{$message->name}} nos ha escrito: <br>
"{{$message->message}}"
<br>
<br>
Comunícate con {{$message->name}}: <br>
**Correo:** {{$message->email}} <br>
**Teléfono:** {{$message->phone}} <br>
@if ($message->article)
	**Artículo Seleccionado:** {{$message->article}}
@endif
<br><br>
**Atentamente**,<br>
Casa Ralero

@endcomponent
