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
</head>
<body>
    @include('layout.header')
    <form action="{{ isset($thematic) ? route('editThematic', $thematic->id) : route('thematiques') }}" method="POST">
        @csrf
        <h1>{{ isset($thematic) ? "Modification" : "Ajout" }} d'une thématique</h1>
        <div class="inputBloc">
            <label for="description">Description * :</label>
            <input type="text" name="description" id="description" required value="{{ isset($thematic) ? $thematic->description : "" }}">
        </div>
        @error('description')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="icon">Icon * :</label>
            <input type="text" name="icon" id="icon" required value="{{ isset($thematic) ? $thematic->icon : "" }}">
        </div>
        @error('icon')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="actif">Actif * :</label>
            <select name="actif" id="actif">
                <option value="1" {{ (isset($thematic) AND $thematic->actif==1) ? "Selected" : "" }}>Oui</option>
                <option value="0" {{ (isset($thematic) AND $thematic->actif==0) ? "Selected" : "" }}>Non</option>
            </select>
        </div>
        <input type="submit" value="{{ isset($thematic) ? "Modifier" : "Ajouter" }}">
    </form>
    @include('layout.footer')
</body>
</html>