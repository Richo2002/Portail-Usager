<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A votre ecoute</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/footer.css">
    {{-- <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    @include('layout.header')
    <div id="banner">
        <div id="bluredBanner">
            <h1>A votre ecoute</h1>
        </div>
    </div>
    <div id="formBloc">
        @if (Session::has('status'))
            <h3>{{ Session::get('status') }}</h3> <br>
        @endif
        <span>Déposer vos questions et suggestions ici :</span>
        <form action="/contacteznous" method="POST">
            @csrf
            <h1>Formulaire électronique à renseigner</h1>
            <div class="inputBloc">
                <label for="lastname">Nom * :</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>
            <div class="inputBloc">
                <label for="firstname">Prénoms * :</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="inputBloc">
                <label for="email">Email *:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="inputBloc">
                <label for="object">Objet *:</label>
                <input type="text" name="object" id="object" required>
            </div>
            <div class="inputBloc">
                <label for="quiz">Questions / Suggestions *:</label>
                <textarea name="quiz" id="quiz" cols="30" rows="10" required></textarea>
            </div>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    @include('layout.footer')
</body>
</html>