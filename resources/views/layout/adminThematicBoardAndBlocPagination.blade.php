@if ((isset($thematics) AND count($thematics) > 0))
                <div id="board">
                    <table>
                        <thead>
                            <td>Id</td>
                            <td>Description</td>
                            <td>Nombre de prestation</td>
                            <td>Icone</td>
                            <td colspan="2">Opérations</td>
                        </thead>
                        @for ($i = 0; $i < count($thematics); $i++)
                            <tr id="{{ ($i%2!=0) ? "boardItem" : "" }}">
                                <td>{{ $thematics[$i]->id }}</td>
                                <td>{{ Str::ucfirst(Str::lower($thematics[$i]->description))  }}</td>
                                <td>{{ count($thematics[$i]->services) }}</td>
                                <td><i class="{{ $thematics[$i]->icon }}"></i></td>
                                <td><a href="{{ route('seeEditThematicForm', $thematics[$i]->id) }}">Modifier</a></td>
                                {{-- <td><a href="{{ route('deleteThematic', $thematics[$i]->id) }}">Supprimer</a></td> --}}
                            </tr>
                        @endfor
                    </table>
                </div>
            @else
                <center><p style="color: red; font-Weight:bold">Oups! Aucune donnée trouvée</p></center>
            @endif
            <div id="blocPagination">
                {{  (isset($thematics) AND count($thematics) > 0) ? $thematics->links() : ""}}
                {{-- @if ((isset($thematicsByStructure) AND count($thematicsByStructure) > 10)  OR (isset($thematics) AND count($thematics) > 10))
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