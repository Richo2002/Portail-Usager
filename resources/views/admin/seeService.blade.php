<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>vos prestations</title>
    <link rel="stylesheet" href="/css/seeSomething.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/boardAndBlocPagination.css">
    <link rel="stylesheet" href="/css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <link rel= "stylesheet"  href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  />   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="/js/admin.js"></script>
</head>
<body>
    @include('layout.header')
    <main>
        <h1>Gestions des prestations</h1>
        <form action="">
            <a href="{{ route('seeAddServiceForm') }}">Ajouter une prestation</a>
            @if ((isset($services) AND !empty($services)))
                <input type="text" id="searchInput" placeholder="Rechercher..." onkeydown="return (event.keyCode!=13);" data-element="service">
            @endif
        </form>
        <div id="boardAndBlocPagination">
            @include('layout.adminServiceBoardAndBlocPagination')
        </div>
    </main>
    @include('layout.footer')
</body>
</html>