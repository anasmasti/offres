@extends('layouts.app')

@section('content')
<div class="p-5">
    <h1>
        {{ $employee->prenom }} {{ $employee->nom }}
    </h1>
    <ul>
        <li>ID <strong>{{ $employee->id }}</strong></li>
        <li>Téléphone <strong>{{ $employee->tel }}</strong></li>
    </ul>
</div>
@endsection