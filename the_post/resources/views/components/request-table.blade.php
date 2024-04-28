<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user)
        <tr>
            <th scope="row"> {{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @switch($role)
                @case('amministratore')
                <form action="{{route('admin.setAdmin' , compact('user'))}}" method="POST">
                    @csrf
                    @method('patch')
                    <button class="btn btn-info text-white">Attiva {{$role}}</button>
                </form>
                <br>
                <form action="{{route('admin.unsetAdmin' , compact('user'))}}" method="POST">
                    @csrf
                    @method('patch')
                    <button class="btn btn-danger text-white">Rifiuta</button>
                </form>
                @break
                @case('revisore')
                <form action="{{route('admin.setRevisor' , compact('user'))}}" method="POST">
                    @csrf
                    @method('patch')
                    <button class="btn btn-info text-white">Attiva {{$role}}</button>
                </form>
                <br>
                <form action="{{route('admin.unsetRevisor' , compact('user'))}}" method="POST">
                    @csrf
                    @method('patch')
                    <button class="btn btn-danger text-white">Rifiuta</button>
                </form>
                @break
                @case('redattore')
                <form action="{{route('admin.setWriter' , compact('user'))}}" method="POST">
                    @csrf
                    @method('patch')
                    <button class="btn btn-info text-white">Attiva {{$role}}</button>
                </form>
                <br>
                <form action="{{route('admin.unsetWriter' , compact('user'))}}" method="POST">
                    @csrf
                    @method('patch')
                    <button class="btn btn-danger text-white">Rifiuta</button>
                </form>
                @break
                @endswitch
            </td>
        </tr>
        @endforeach
    </tbody>

</table>