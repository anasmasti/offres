@extends('layouts.app')

@section('content')
<div class="p-5">
    <h1>
        {{ $client->prenom }} {{ $client->nom }}
    </h1>
    <ul>
        <li>ID <strong>{{ $client->idcli }}</strong></li>
        <li>Téléphone <strong>{{ $client->tel }}</strong></li>
    </ul>
</div>
@endsection