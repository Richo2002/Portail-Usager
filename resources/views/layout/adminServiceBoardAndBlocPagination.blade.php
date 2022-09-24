@if ((isset($services) AND count($services)>0))
                <div id="board">
                    <table>
                        <thead>
                            <td>Id</td>
                            <td>Prestation</td>
                            <td>Thématique</td>
                            <td>Delai</td>
                            <td colspan="2">Opérations</td>
                        </thead>
                        @for ($i = 0; $i < count($services); $i++)
                            <tr id="{{ ($i%2!=0) ? "boardItem" : "" }}">
                                <td>{{ $services[$i]->id }}</td>
                                <td> {{ Str::ucfirst(Str::lower($services[$i]->description))  }}</td>
                                <td>{{ Str::ucfirst(Str::lower($services[$i]->thematic->description))  }}</td>
                                <td> {{ Str::ucfirst(Str::lower($services[$i]->timeLimit))  }}</td>
                                <td><a href="{{ route('seeEditServiceForm', $services[$i]->id) }}">Modifier</a></td>
                                <td><a href="{{ route('deleteService', $services[$i]->id) }}">Supprimer</a></td>
                            </tr>
                        @endfor
                    </table>
                </div>
            @else
                <center><p style="color: red; font-Weight:bold">Oups! Aucune donnée trouvée</p></center>
            @endif
            <div id="blocPagination">
                {{  (isset($services) AND count($services) > 0) ? $services->links() : ""}}
                {{-- @if ((isset($servicesByStructure) AND count($servicesByStructure) > 10)  OR (isset($services) AND count($services) > 10))
                    <form action="" method="post">
                        <select name="" id="">
                            <option value="">10 elements par page</option>
                            <option value="">15 elements par page</option>
                            <option value="">20 elements par page</option>
                            <option value="">50 elements par page</option>
                        </select>
                    </form>
                @endif --}}
            </div>