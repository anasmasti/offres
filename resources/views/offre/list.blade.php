@extends('layouts.app')

@section('content')
<div class="p-3">
    <h1>
        Liste des offres
    </h1>

    <a class="btn btn-dark" href="/offre/add">Un nouveau offre</a>
    <br />
    <br />
    <br />

    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                {{-- DISPLAY DATA --}}
                @foreach ($offres as $offre)
                <tr>
                    <td>{{ $offre->id }}</td>
                    <td>{{ $offre->title }}</td>
                    <td class="btn-group" role="group">
                        <a class="btn btn-light" href="/offres/{{ $offre->id }}">Detail</a>
                        <a class="btn btn-warning" href="/offres/edit/{{ $offre->id }}">Modifier</a>
                        <form action="/offres/delete/{{ $offre->id }}" method="post">
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
            {{ $offres->links() }}
        </nav>
        @if ($message = Session::get('message'))
            <p class="alert alert-success">
                {{ $message }}
            </p>
        @endif
</div>        
@endsection