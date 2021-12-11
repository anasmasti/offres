@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">
                Facture
                <strong>Date {{$factures[0]->datevente}}</strong>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">From:</h6>
                        <div>
                        <strong>MyCompany</strong>
                        </div>
                        <div>132454 casa</div>
                        <div>Email: info@webz.com.pl</div>
                        <div>Phone: +48 444 666 3333</div>
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-3">To:</h6>
                        <div>
                        <strong>{{$factures[0]->nom}} {{$factures[0]->prenom}}</strong>
                        </div>
                        <div>54545 casa</div>
                        <div>Email: marek@daniel.com</div>
                        <div>Phone: +{ (Sfactures [0]->tel}I</div>
                    </div>    
                </div>
                <div class="row">
                    <h3>Liste Commande</n3>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($factures as $ligne)
                                <tr>
                                    <td>{{$ligne->id}}</td>
                                    <td>{{$ligne->datevente}}</td>
                                    <td>{{$ligne->qtevente}}</td>
                                    <td>{{$ligne->prixVente}} MAD</td>
                                    <td>{{$ligne->nom}}</td>
                                    <td>{{$ligne->prenom}}</td>
                                    <td>{{$ligne->libelle}}</td>
                                    <td>{{$ligne->marque}}</td>
                                    <td>{{$ligne->prix}} MAD</td>
                                    <td class="bg-warning">{{$ligne->prixVente * $ligne->qtevente}} MAD</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <a class="btn btn-primary" href="/ventes/imprimerfacture/{{$factures[0]->idcli}}">Imprimer facture</a>
            </div>   
        </div> 
</div>   
@endsection