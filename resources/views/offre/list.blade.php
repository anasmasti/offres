@extends('layouts.app')

@section('content')
<div class="p-5">

<div class="mb-5">
    <h1>
        Liste des offres
    </h1>

    <a class="btn btn-sm btn-dark rounded-pill" href="/offre/add">Un nouveau offre</a>
    </div>

    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody class="w-100">
                @foreach ($offres as $offre)
                <tr>
                    <td>{{ $offre->id }}</td>
                    <td>{{ $offre->title }}</td>
                    <td>{!! $offre->desc !!}</td>
                    <td class="btn-group" role="group">
                        <a class="btn btn-sm btn-light rounded-pill" href="/offres/{{ $offre->id }}">Detail</a>
                        <a class="btn btn-sm btn-dark mx-2 rounded-pill" href="/offres/edit/{{ $offre->id }}">Modifier</a>
                        <form action="/offres/delete/{{ $offre->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger rounded-pill" type="submit">
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