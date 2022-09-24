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
    <img src="/img/mesrs.png" alt="">
    <h1>Accès admin</h1>
    <form action="/login" method="post">
        @csrf
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" value="{{old('email')}}" required >
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Soumettre">
        @error('email')
            <span class="alert alert-danger">{{ $message }}</span> <br>
        @enderror
        <a href="{{ route('forgetPassword') }}">Mot de passe oublié ?</a>
        {{-- <em>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</em> --}}
    </form>
</body>
</html>