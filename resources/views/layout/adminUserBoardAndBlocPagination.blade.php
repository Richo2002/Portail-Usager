@if ((isset($users) AND count($users) > 0))
<div id="board">
    <table>
        <thead>
            <td>Id</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Role</td>
            <td>structure</td>
            <td colspan="2">Opérations</td>
        </thead>
        @for ($i = 0; $i < count($users); $i++)
            <tr id="{{ ($i%2!=0) ? "boardItem" : "" }}">
                <td>{{ $users[$i]->id }}</td>
                <td> {{ Str::ucfirst(Str::upper($users[$i]->name))  }}</td>
                <td>{{ Str::ucfirst(Str::lower($users[$i]->firstname))  }}</td>
                <td>{{ Str::ucfirst(Str::lower($users[$i]->phone))  }}</td>
                <td>{{ Str::ucfirst(Str::lower($users[$i]->email))  }}</td>
                <td>{{ Str::ucfirst(Str::lower($users[$i]->role))  }}</td>
                <td>{{ Str::ucfirst(Str::upper($users[$i]->structure->code))  }}</td>
                <td><a href="{{ route('seeEditUserForm', $users[$i]->id) }}">Modifier</a></td>
                {{-- <td><a href="{{ route('deleteUser', $users[$i]->id) }}">Supprimer</a></td> --}}
            </tr>
        @endfor
    </table>
</div>
@else
<center><p style="color: red; font-Weight:bold">Oups! Aucune donnée trouvée</p></center>
@endif
<div id="blocPagination">
{{  (isset($users) AND count($users) > 0) ? $users->links() : ""}}
{{-- @if ((isset($usersByStructure) AND count($usersByStructure) > 10)  OR (isset($users) AND count($users) > 10))
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