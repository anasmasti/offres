@extends('layouts.app')

@section('content')
<div class="p-3">
    <h1>
        Liste des clients
    </h1>

    <a class="btn btn-dark" href="/client/add">Un nouveau client</a>
    <br />
    <br />
    <br />

    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                {{-- DISPLAY DATA --}}
                @foreach ($clients as $cli)
                <tr>
                    <td>{{ $cli->idcli }}</td>
                    <td>{{ $cli->nom }}</td>
                    <td>{{ $cli->prenom }}</td>
                    <td>{{ $cli->tel }}MAD</td>
                    <td class="btn-group" role="group">
                        <a class="btn btn-light" href="/clients/{{ $cli->idcli }}">Detail</a>
                        <a class="btn btn-warning" href="/clients/edit/{{ $cli->idcli }}">Modifier</a>
                        <form action="/clients/delete/{{ $cli->idcli }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav>
            {{ $clients->links() }}
        </nav>
        @if ($message = Session::get('message'))
            <p class="alert alert-success">
                {{ $message }}
            </p>
        @endif
</div>        
@endsection