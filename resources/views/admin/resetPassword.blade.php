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
    <h1>Réinitialiser votre mot de passe</h1>
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email" value="{{old('email', $request->email)}}" required >
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <label for="password_confirmation">Confirmer votre mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        @error('password')
            <span class="alert alert-danger">{{ $message }}</span> <br>
        @enderror
        <input type="submit" value="Reinitialiser">
    </form>
</body>
</html>