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
    <form action="{{ isset($structure) ? route('editStructure', $structure->id) : route('structures') }}" method="POST">
        @csrf
        <h1>{{ isset($structure) ? "Modification" : "Ajout" }} d'une structure</h1>
        <div class="inputBloc">
            <label for="code">Code * :</label>
            <input type="text" name="code" id="code" required value="{{ isset($structure) ? $structure->code : "" }}">
        </div>
        @error('code')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="description">Description * :</label>
            <input type="text" name="description" id="description" required value="{{ isset($structure) ? $structure->description : "" }}">
        </div>
        @error('description')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="categorie">Categorie * :</label>
            <select name="categorie" id="categorie">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ (isset($structure) AND ($structure->category_id==$categorie->id)) ? "Selected" : "" }}>{{ $categorie->description }}</option>
                @endforeach
            </select>   
        </div>
        <input type="submit" value="{{ isset($structure) ? "Modifier" : "Ajouter" }}">
    </form>
    @include('layout.footer')
</body>
</html>