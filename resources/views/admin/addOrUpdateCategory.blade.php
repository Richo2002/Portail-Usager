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
    <form action="{{ isset($category) ? route('editCategory', $category->id) : route('categories') }}" method="POST">
        @csrf
        <h1>{{ isset($category) ? "Modification" : " Ajout" }} d'une catégorie</h1>
        <div class="inputBloc">
            <label for="code">Code * :</label>
            <input type="text" name="code" id="code" required value="{{ isset($category) ? $category->code : "" }}" class="@error('code') is-invalid @enderror">
        </div>
        @error('code')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="description">Description * :</label>
            <input type="text" name="description" id="description" required value="{{ isset($category) ? $category->description : "" }}" class="@error('description') is-invalid @enderror">
        </div>
        @error('description')
                <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <input type="submit" value="{{ isset($category) ? "Modifier" : " Ajouter" }}">
    </form>
    @include('layout.footer')
</body>
</html>