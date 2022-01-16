@extends('layouts.app')

@section('content')
<div class="p-5">
    <h1 class="fw-bold mb-5">
        Liste des employés
    </h1>


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
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->prenom }}</td>
                    <td>{{ $employee->tel }}</td>
                    <td class="btn-group" role="group">
                        <a class="btn btn-sm btn-light rounded-pill" href="/employees/{{ $employee->id }}">Detail</a>
                        <a class="btn btn-sm btn-dark rounded-pill mx-2" href="/employees/edit/{{ $employee->id }}">Modifier</a>
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
            <p class="alert alert-success">
                {{ $message }}
            </p>
        @endif
</div>        
@endsection