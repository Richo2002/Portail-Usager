<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil Admin</title>
    <link rel="stylesheet" href="/css/adminHomePage.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    {{-- <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    @include('layout.header')
    <main>
        <div id="welcomeTitle">
            <h1>Bienvenue dans l'interface <br> d'administration du <br> portail Usager</h1>
            <a href="{{ route('prestations') }}">Listes des prestations</a>
        </div>
        <div id="welcomeImage">
           
        </div>
    </main>
    @include('layout.footer')
</body>
</html>