@extends('layouts.app')

@section('content')
<div class="p-5">

<div class="mb-5">
    <h1 class="fw-bold">
        Liste des offres
    </h1>
    @if (Auth::user() != null && Auth::user()->type == "admin")
        <a class="btn btn-sm btn-dark rounded-pill" href="/offre/add">Une nouvelle offre</a>
    @endif
    </div>

    <table class="table table-borderless">
            <thead>
                <tr>
                    <th>État</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody class="w-100">
                @foreach ($offres as $offre)
                <tr>
                    <td>
                    @if ( $offre->etat == true )
                    <span class="badge bg-success mb-2">En cours</span>
                    @endif
                    @if ( $offre->etat == false )
                    <span class="badge bg-danger mb-2">Expiré</span>
                    @endif
                    </td>
                    <td>{{ $offre->title }}</td>
                    <td>{!! $offre->desc !!}</td>
                    <td class="btn-group" role="group">
                        <a class="btn btn-sm btn-light rounded-pill" href="/offres/{{ $offre->id }}">Voir</a>
                        @if (Auth::user() != null && Auth::user()->type == "admin")
                            <a class="btn btn-sm btn-dark mx-2 rounded-pill" href="/offres/edit/{{ $offre->id }}">Modifier</a>
                            <form action="/offres/delete/{{ $offre->id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-danger rounded-pill" type="submit">
                                    Supprimer
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav>
            {{ $offres->links() }}
        </nav>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>C'est fait!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
</div>        
@endsection