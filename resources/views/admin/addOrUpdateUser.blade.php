<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Categorie</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/addOrUpdateForm.css">
    {{-- <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/admin.js"></script>
</head>
<body>
    @include('layout.header')
    <form action="{{ isset($user) ? route('editUser', $user->id) : route('utilisateurs') }}" method="POST">
        @csrf
        @if (Str::upper(Auth::user()->role) == 'USER')
            <h1>Modifier mon compte</h1>
        @endif
        @if (Str::upper(Auth::user()->role) == 'ADMIN')
            <h1>{{ isset($user) ? "Modification" : "Ajout" }} d'un utilisateur</h1>            
        @endif
        <div class="inputBloc">
            <label for="name">Nom * :</label>
            <input type="text" name="name" id="name" required value="{{ isset($user) ? $user->name : "" }}">
        </div>
        @error('name')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="firstname">Prénom * :</label>
            <input type="text" name="firstname" id="firstname" required value="{{ isset($user) ? $user->firstname : "" }}">
        </div>
        @error('firstname')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="phone">Téléphone * :</label>
            <input type="tel" name="phone" id="phone" required value="{{ isset($user) ? $user->phone : "" }}">
        </div>
        <div class="inputBloc">
            <label for="email">Adresse email * :</label>
            <input type="email" name="email" id="email" required value="{{ isset($user) ? $user->email : "" }}">
        </div>
        @error('email')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        @if (Str::upper(Auth::user()->role) == 'ADMIN')
            <div class="inputBloc">
                <label for="role">Role * :</label>
                <select name="role" id="role">
                        <option value="1" {{ (isset($user) AND $user->role=='ADMIN') ? "Selected" : "" }}>ADMIN</option>
                        <option value="0" {{ (isset($user) AND $user->role=='USER') ? "Selected" : "" }}>USER</option>
                </select>
            </div>
            <div class="inputBloc">
                <label for="categories">Catégorie * :</label>
                <select id="categories">
                    <option value="0">Sélectionner la catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="inputBloc">
                <label for="structures">Structure * :</label>
                    <select id="structures" name="structure">
                        <option value="0">Sélectionner la structure</option>
                    </select>
            </div>
            <div class="inputBloc">
                <label for="actif">Actif * :</label>
                <select name="actif" id="actif">
                    <option value="1" {{ (isset($user) AND $user->actif==1) ? "Selected" : "" }}>Oui</option>
                    <option value="0" {{ (isset($user) AND $user->actif==0) ? "Selected" : "" }}>Non</option>
                </select>
            </div>
        @endif
        <input type="submit" value="{{ isset($user) ? "Modifier" : "Ajouter" }}" id="addUser">
    </form>
    @include('layout.footer')
</body>
</html>