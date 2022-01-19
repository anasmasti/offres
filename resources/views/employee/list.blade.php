@extends('layouts.app')

@section('content')
<div class="p-5">
    <h1 class="fw-bold mb-5">
        Liste des employés
    </h1>


    <table class="table table-borderless">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>CV</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                {{-- DISPLAY DATA --}}
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->prenom }}</td>
                    <td>{{ $employee->tel }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary rounded-pill" href="/{{ $employee->cv }}" download>
                        Télécharger le CV
                        </a>
                    </td>
                    <td class="btn-group" role="group">
                        <a class="btn btn-sm btn-light rounded-pill me-2" href="/employees/{{ $employee->id }}">Detail</a>
                        <form action="/employees/delete/{{ $employee->id }}" method="post">
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
            {{ $employees->links() }}
        </nav>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>C'est fait!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
</div>        
@endsection