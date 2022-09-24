@if ((isset($categories) AND count($categories) > 0))
                <div id="board">
                    <table>
                        <thead>
                            <td>Id</td>
                            <td>Code</td>
                            <td>Description</td>
                            <td colspan="2">Opérations</td>
                        </thead>
                        @for ($i = 0; $i < count($categories); $i++)
                            <tr id="{{ ($i%2!=0) ? "boardItem" : "" }}">
                                <td>{{ $categories[$i]->id }}</td>
                                <td> {{ Str::ucfirst(Str::upper($categories[$i]->code))  }}</td>
                                <td>{{ Str::ucfirst(Str::lower($categories[$i]->description))  }}</td>
                                <td><a href="{{ route('seeEditCategoryForm', $categories[$i]->id) }}">Modifier</a></td>
                                {{-- <td><a href="{{ route('deleteCategory', $categories[$i]->id) }}">Supprimer</a></td> --}}
                            </tr>
                        @endfor
                    </table>
                </div>
            @else
                <center><p style="color: red; font-Weight:bold">Oups! Aucune donnée trouvée</p></center>
            @endif
            <div id="blocPagination">
                {{  (isset($categories) AND count($categories) > 0) ? $categories->links() : ""}}
                {{-- @if ((isset($categoriesByStructure) AND count($categoriesByStructure) > 10)  OR (isset($categories) AND count($categories) > 10))
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