@component('mail::message')
<h2>Bonjour {{ $data['name']." ".$data['firstname'] }}</h1>
<p>Nous venons de vous inscrire sur le portail des usagers du MESRS.
    voici vos paramètres
</p>
<span><b>Email : {{ $data['email'] }}</b></span><br>
<span><b>Mot de passe : {{ $data['password'] }}</b></span>
<p>Pour acceder a la plateforme, cliquez sur le bouton ci-apres:</p>
@component('mail::button', ['url' => '/requeteusager/admin'])
Cliquez ici
@endcomponent
<p>Veuillez bien conserver vos informations.</p>

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
