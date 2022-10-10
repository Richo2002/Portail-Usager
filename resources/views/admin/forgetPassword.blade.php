<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <h1>Changement de mot de passe</h1>
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <label for="email">Aviez vous oublié votre mot de passe? Pas de probleme. Entrez juste votre adresse email et nous vous enverrons un lien de changement de mot de passe à partir de laquelle vous pouvez réinitialiser votre mot de passe</label>
        <input type="email" name="email" id="email" value="{{old('email')}}" required >
        <input type="submit" value="Soumettre">
        @if (Session::has('status'))
            <span>{{ Session::get('status') }}</span> <br>
        @endif
        <a href="/admin">Retour a la page de connexion</a>
    </form>
</body>
</html>