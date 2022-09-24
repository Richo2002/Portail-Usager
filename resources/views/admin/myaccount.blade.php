<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon compte</title>
    {{-- <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />  
    <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/css/myaccount.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
</head>
<body>
    @include('layout.header')
    <main>
        <img src="/img/profil.jpg" alt="">
            {{-- <form action="" method="post">
                @csrf
                <input type="submit" value="Modifier profil">
            </form> --}}
        <h2>Information Personnelle</h3>
        <div>
            <span> <b>Nom : </b></h3>{{ $user->name }}</span>
            <span> <b>Prénom : </b></h3>{{ $user->firstname }}</span>
            <span> <b>Téléphone : </b></h3>{{ $user->phone }}</span>
            <span> <b>email : </b></h3>{{ $user->email }}</span>
            <span> <b>Structure d'appartenance : </b></h3>{{ $user->structure->description }}</span>
        </div>
        <a href="{{ route('seeEditUserForm', Auth::user()->id) }}">Modifier profil</a>
    </main>
    @include('layout.footer')
</body>
</html>