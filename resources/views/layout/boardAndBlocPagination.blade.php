@if (isset($serviceByStructure) OR isset($serviceByThematic))
        @if ((isset($serviceByStructure) AND count($serviceByStructure) > 0)  OR (isset($serviceByThematic) AND count($serviceByThematic) > 0))
            <div id="board">
                <table>
                    <thead>
                        <td colspan="4" id="boardTitle"><b>{{ Str::ucfirst(Str::lower((isset($serviceByThematic)) ? $serviceByThematic[0]->thematic->description : ($serviceByStructure[0]->structure->description )))  }}</b></td>
                    </thead>
                    <thead>
                        <td>Prestation</td>
                        <td>Coût</td>
                        <td>Délai</td>
                        <td>Description</td>
                    </thead>

                    @isset($serviceByThematic)
                        @for ($i = 0; $i < count($serviceByThematic); $i++)
                            <tr id="{{ ($i%2!=0) ? "boardItem" : "" }}">
                                <td> {{ Str::ucfirst(Str::lower($serviceByThematic[$i]->description))  }}</td>
                                <td>{{ $serviceByThematic[$i]->cost }}</td>
                                <td> {{ Str::ucfirst(Str::lower($serviceByThematic[$i]->timeLimit))  }}</td>
                                <td><a href="/demandes/{{$serviceByThematic[$i]->id}}">Plus de détail</a></td>
                            </tr>
                        @endfor
                    @endisset
                    @isset($serviceByStructure)
                        @for ($i = 0; $i < count($serviceByStructure); $i++)
                            <tr id="{{ ($i%2!=0) ? "boardItem" : "" }}">
                                <td> {{ Str::ucfirst(Str::lower($serviceByStructure[$i]->description))  }}</td>
                                <td>{{ $serviceByStructure[$i]->cost }}</td>
                                <td> {{ Str::ucfirst(Str::lower($serviceByStructure[$i]->timeLimit))  }}</td>
                                <td><a href="/demandes/{{$serviceByStructure[$i]->id}}" target="_blank">Plus de détail</a></td>
                            </tr>
                        @endfor
                    @endisset
                </table>
            </div>
            <div id="blocPagination">
                {{  (isset($serviceByStructure)) ?  $serviceByStructure->links() : $serviceByThematic->links() }}
                {{-- @if ((isset($serviceByStructure) AND count($serviceByStructure) > 10)  OR (isset($serviceByThematic) AND count($serviceByThematic) > 10))
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
        @else
            <center><p style="color: red; font-Weight:bold">Oups! Aucune donnée trouvée</p></center>
        @endif
    @endif