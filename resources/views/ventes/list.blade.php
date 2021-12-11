@extends('layouts.app')

@section('content')
<div class="p-3">
    <h1>
        Liste des produits
    </h1>

    <a class="btn btn-dark" href="/ventes/vendre">Une nouvelle vente</a>
    <br />
    <br />
    <br />

    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de vente</th>
                    <th>Qte de vente</th>
                    <th>Prix de vente</th>
                    <th>Nom client</th>
                    <th>Prénom client</th>
                    <th>Produit</th>
                    <th>Marque</th>
                    <th>Prix produit</th>
                    <th>Total</th>
                    <th>Facture</th>
                </tr>
            </thead>

            <tbody>
                {{-- DISPLAY DATA --}}
                @foreach ($ventes as $v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->datevente }}</td>
                    <td>{{ $v->qtevente }}</td>
                    <td>{{ $v->prixVente }}MAD</td>
                    <td>{{ $v->nom }}</td>
                    <td>{{ $v->prenom }}</td>
                    <td>{{ $v->libelle }}</td>
                    <td>{{ $v->marque }}</td>
                    <td>{{ $v->prix }} MAD</td>
                    <td class="bg-warning">{{ $v->prixVente * $v->qtevente }} MAD</td>
                    <td>
                        <a class="btn btn-light" href="/ventes/facture/{{$v->idcli}}">
                            Voir
                        </a>
                    </td>
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