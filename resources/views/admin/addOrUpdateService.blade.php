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
    <form action="{{ isset($service) ? route('editService', $service->id) : route('prestations') }}" method="POST">
        @csrf
        <h1>{{ isset($service) ? "Modification" : "Ajout" }} d'une prestation</h1>
        <div class="inputBloc">
            <label for="description">Description * :</label>
            <input type="text" name="description" id="description" required value="{{ isset($service) ? $service->description : "" }}">
        </div>
        @error('description')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="fileToProvide">Pièces à fournir *:</label>
            <textarea name="fileToProvide" id="fileToProvide" cols="30" rows="10" required>{{ isset($service) ? $service->fileToProvide : "" }}</textarea>
        </div>
        <div class="inputBloc">
            <label for="cost">Coût * :</label>
            <input type="text" name="cost" id="cost" required value="{{ isset($service) ? $service->cost : "" }}">
        </div>
        @error('cost')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="timeLimit">Délai * :</label>
            <input type="text" name="date" id="timeLimit" required value="{{ isset($service) ? $service->timeLimit : "" }}">
        </div>
        @error('date')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        <div class="inputBloc">
            <label for="text">Texte * :</label>
            <textarea name="text" id="text" cols="30" rows="10" required>{{ isset($service) ? $service->text : "" }}</textarea>
        </div>
        <div class="inputBloc">
            <label for="observation">Observation * :</label>
            <input type="text" name="observation" id="observation" value="{{ isset($service) ? $service->observation : "" }}">
        </div>
        <div class="inputBloc">
            <label for="thematic">Thématique * :</label>
            <select name="thematic" id="thematic">
                @foreach ($thematics as $thematic)
                    <option value="{{ $thematic->id }}" {{ (isset($service) AND ($thematic->id == $service->thematic_id)) ? "Selected" : "" }}>{{ $thematic->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="inputBloc">
            <label for="actif">Actif * :</label>
            <select name="actif" id="actif">
                <option value="1" {{ (isset($service) AND $service->actif==1) ? "Selected" : "" }}>Oui</option>
                <option value="0" {{ (isset($service) AND $service->actif==0) ? "Selected" : "" }}>Non</option>
            </select>
        </div>
        <input type="submit" value="{{ isset($service) ? "Modifier" : " Ajouter" }}">
    </form>
    @include('layout.footer')
</body>
</html>