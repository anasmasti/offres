@extends('layouts.app')

@section('content')
<div class="p-5">
    <h1>
        {{ $produit->libelle }}
    </h1>
    <ul>
        <li>Prix <strong>{{ $produit->prix }}MAD</strong></li>
        <li>Marque <strong>{{ $produit->marque }}</strong></li>
    </ul>
</div>    
@endsection