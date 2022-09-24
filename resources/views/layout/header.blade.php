<header>
    <div>
        <img src="/img/mesrs.png" alt="">
        @auth
            <div class="headerAdmin">
                <a href="{{ route('seemyAccount') }}">Mon compte</a>
                <form action="/logout" method="post">
                    @csrf
                    <input type="submit" value="Se deconnecter">
                </form>
            </div>
        @endauth
    </div>
        @guest
            <nav>
                <ul>
                    <li><a href="/" id="{{ (Route::currentRouteName() == 'seeHomePage') ? 'enable' : '' }}">Accueil</a></li>
                    <li><a href="/#thematic_bloc" id="{{ Route::currentRouteName() == 'seeServiceByThematic' ? 'enable' : '' }}">Demarche par thematique</a></li>
                    <li><a href="/demandeparstructures" id="{{ Route::currentRouteName() == 'seeServiceByStructure' ? 'enable' : '' }}">Demarche par structure</a></li>
                    <li><a href="/avotreecoute" id="{{ Route::currentRouteName() == 'contactUs' ? 'enable' : '' }}">A votre ecoute</a></li>
                    <li><a href="/requeteusager">Requete usager</a></li>
                </ul>
            </nav>
        @endguest
        @auth
            <nav>
                <ul>
                    <li><a href="{{ route('adminHomePage') }}" id="{{ (Route::currentRouteName() == 'adminHomePage') ? 'enable' : '' }}">Accueil</a></li>
                    @if (Str::upper(Auth::user()->role) == 'ADMIN')
                        <li><a href="{{ route('categories') }}" id="{{ (Route::currentRouteName() == 'categories') ? 'enable' : '' }}">Categories</a></li>
                        <li><a href="{{ route('structures') }}" id="{{ (Route::currentRouteName() == 'structures') ? 'enable' : '' }}">Structures</a></li>
                        <li><a href="{{ route('thematiques') }}" id="{{ (Route::currentRouteName() == 'thematiques') ? 'enable' : '' }}">Thematiques</a></li>
                    @endif
                    <li><a href="{{ route('prestations') }}" id="{{ (Route::currentRouteName() == 'prestations') ? 'enable' : '' }}">Prestations</a></li>
                    @if (Str::upper(Auth::user()->role) == 'ADMIN')
                        <li><a href="{{ route('utilisateurs') }}" id="{{ (Route::currentRouteName() == 'utilisateurs') ? 'enable' : '' }}">Utilisateurs</a></li>
                    @endif
                </ul>
            </nav>
        @endauth
</header>