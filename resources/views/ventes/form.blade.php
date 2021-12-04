@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/ventes/vendre" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Client</label>
            <select class="form-select" aria-label="Default select example" name="idcli">
                @foreach ($clients as $cli)
                <option value="{{ $cli->idcli }}">{{ $cli->nom }} {{ $cli->prenom }}</option>
                @endforeach
            </select>
            @if ($errors->has('idcli'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('idcli') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Produit</label>
            <select class="form-select" aria-label="Default select example" name="idpro">
                @foreach ($produits as $pro)
                    <option value="{{ $pro->idpro }}">{{ $pro->libelle }}</option>
                @endforeach
            </select>
            @if ($errors->has('idpro'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('idpro') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Date de vente</label>
            <input class="form-control" type="date" name="datevente">
            @if ($errors->has('datevente'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('datevente') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Qte vente</label>
            <input class="form-control" type="text" name="qtevente" placeholder="Qte Vente" >
            @if ($errors->has('qtevente'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('qtevente') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Prix de vente</label>
            <input class="form-control" type="text" name="prixVente" placeholder="Qte Vente" >
            @if ($errors->has('prixVente'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prixVente') }}</strong>
            </span>
            @endif
        </div>
        
        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Vendre</button>
            <a class="btn btn-secondary" href="/ventes">Retourner</a>
        </div>
    </form>
</div>    
@endsection