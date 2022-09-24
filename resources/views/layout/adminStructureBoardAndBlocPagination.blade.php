@if ((isset($structures) AND count($structures) > 0))
                <div id="board">
                    <table>
                        <thead>
                            <td>Id</td>
                            <td>Code</td>
                            <td>Description</td>
                            {{-- <td>Categorie</td> --}}
                            <td>Nombre de prestation</td>
                            <td colspan="2">Opérations</td>
                        </thead>
                        @for ($i = 0; $i < count($structures); $i++)
                            <tr id="{{ ($i%2!=0) ? "boardItem" : "" }}">
                                <td>{{ $structures[$i]->id }}</td>
                                <td> {{ Str::ucfirst(Str::upper($structures[$i]->code))  }}</td>
                                <td>{{ Str::ucfirst(Str::lower($structures[$i]->description))  }}</td>
                                {{-- <td> {{ Str::ucfirst(Str::lower($structures[$i]->category->description))  }}</td> --}}
                                <td>{{ count($structures[$i]->services) }}</td>
                                <td><a href="{{ route('seeEditStructureForm', $structures[$i]->id) }}">Modifier</a></td>
                                {{-- <td><a href="{{ route('deleteStructure', $structures[$i]->id) }}">Supprimer</a></td> --}}
                            </tr>
                        @endfor
                    </table>
                </div>
            @else
                <center><p style="color: red; font-Weight:bold">Oups! Aucune donnée trouvée</p></center>
            @endif
            <div id="blocPagination">
                {{  (isset($structures) AND count($structures) > 0) ? $structures->links() : ""}}
                {{-- @if ((isset($structuresByStructure) AND count($structuresByStructure) > 10)  OR (isset($structures) AND count($structures) > 10))
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