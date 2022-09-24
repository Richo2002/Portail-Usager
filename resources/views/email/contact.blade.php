@component('mail::message')
<h4>Hello !</h2>

<h3>Questions / Suggestion de l'utilisateur {{ $data['lastname']." ".$data['firstname'] }}</h3>

{{ $data['quiz'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
