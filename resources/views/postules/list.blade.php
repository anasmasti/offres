@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="mb-5">
        <h1>
            Liste des postulations
        </h1>

        <a class="btn btn-sm btn-dark rounded-pill" href="/postule/postuler">Une nouvelle postulation</a>
    </div>

    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de postulation</th>
                    <th>Nom employé</th>
                    <th>Prénom employé</th>
                    <th>Offre</th>
                </tr>
            </thead>

            <tbody>
                {{-- DISPLAY DATA --}}
                @foreach ($postules as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->date }}</td>
                    <td>{{ $p->nom }}</td>
                    <td>{{ $p->prenom }}</td>
                    <td>{{ $p->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <nav>
            {{ $ventes->links() }}
        </nav> --}}
        @if ($message = Session::get('message'))
            <p class="alert alert-success">
                {{ $message }}
            </p>
        @endif
</div>        
@endsection