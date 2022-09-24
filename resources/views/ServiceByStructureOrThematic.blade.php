<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Demarche par structure</title>
    {{-- <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />  
    <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/css/structure.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/boardAndBlocPagination.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/structure.js"></script>
</head>
<body>
    @include('layout.header')
    <div id="banner">
        <div id="bluredBanner">
            <h1 data-element={{ isset($serviceByThematic) ? $serviceByThematic[0]->thematic_id : "" }}>catalogue des demandes</h1>
            <span>Démarche par {{ isset($serviceByThematic) ? "thematiques" : "structures"}}</span>
        </div>
    </div>
    <form>
                @isset($serviceByStructure)
                    <span>Veuillez sélectionnez les options pour rechercher les prestations</span>
                @endisset
                    <div>
                        @isset($serviceByStructure)
                            <select id="categories">
                                <option value="0">Sélectionner la categorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->description }}</option>
                                @endforeach
                                
                            </select>
                            <select id="structures">
                                <option value="0">Sélectionner la structure</option>
                            </select>
                        @endisset
                        {{-- <select name="thematics" id="thematics">
                            <option value="0">Toutes les thematiques</option>
                            @foreach ($thematics as $thematic)
                                <option value="{{ $thematic->id }}">{{ $thematic->description }}</option>
                            @endforeach
                        </select> --}}
                        <input type="text" id="searchInput" placeholder="Rechercher..." onkeydown="return (event.keyCode!=13);">
                    </div>
    </form>
    <div id="boardAndBlocPagination">
        @include('layout.boardAndBlocPagination')
    </div>
    @include('layout.footer')
</body>
</html>