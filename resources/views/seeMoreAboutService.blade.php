<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prestation Description</title>
    {{-- <link rel= "stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />  
    <link rel= "stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/seeMoreAboutService.css">
    <link rel="stylesheet" href="/css/footer.css">
</head>
<body>
    @include('layout.header')
    <div id="banner">
    </div>
    <main>
        <h1>{{ $service->description }}</h1>
        <div>
            <span><i class="fa fa-check"></i><b>Structure responsable</b></span>
            <p>{{  $service->structure->description }}</p>
            <span><i class="fa fa-check"></i><b>Pièces à fournir</b></span>
            <p>{{  $service->observation }}</p>
            <span><i class="fa fa-check"></i><b>Coût</b></span>
            <p>{{  $service->cost }}</p>
            <span><i class="fa fa-check"></i><b>Délai</b></span>
            <p>{{  $service->timeLimit }}</p>
            <span><i class="fa fa-check"></i><b>Texte</b></span>
            <p>{{  $service->text }}</p>
            <span><i class="fa fa-check"></i><b>Observations</b></span>
            <p>{{  $service->observation }}</p>
        </div>
    </main>
    @include('layout.footer')
</body>
</html>