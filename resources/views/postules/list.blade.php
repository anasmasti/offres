@extends('layouts.app')

@section('content')
<div class="p-5">
    <div class="mb-5">
        <h1 class="fw-bold">
            Liste des postulations
        </h1>
    </div>

    <table class="table table-borderless">
            <thead>
                <tr>
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
                    <td>{{ $p->date }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->prenom }}</td>
                    <td>{{ $p->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav>
            {{ $postules->links() }}
        </nav> 
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>C'est fait!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
</div>        
@endsection