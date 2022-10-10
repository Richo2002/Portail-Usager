<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    {{-- <link rel= "stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    {{-- <link rel= "stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/accueil.css">
    <link rel="stylesheet" href="/css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/responsive.js"></script>
</head>
<body>
    @include('layout.header')
    <div id="banner">
        <img src="img/banner.jpeg" alt="">
    </div>
    <section id="thematic_bloc">
            <h2>Toutes les thematiques</h2>
            <article> 
                @foreach ($thematics as $thematic)
                    <a href="/demandeparthematics/{{ $thematic->id }}" id="@php if($thematic->id%2==0) echo "thematiqueItem1"; else if($thematic->id%3==0) echo "thematiqueItem3"; else echo "thematiqueItem2"; @endphp">
                        <i class="{{ $thematic->icon }}"></i>
                        {{-- <i class="fa fa-user-check"></i> --}}
                        <h4>{{$thematic->description." "}}({{ $thematic->nbrservice }})</h4>
                    </a>
                @endforeach
            </article>
    </section>
    @include('layout.footer')
</body>
</html>