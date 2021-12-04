@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/produits/edit/{{$produit->idpro}}" method="post">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Libelle</label>
            <input class="form-control" type="text" value="{{$produit->libelle}}" name="libelle" placeholder="Libelle" >
            @if ($errors->has('libelle'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('libelle') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Prix</label>
            <input class="form-control" type="text" value="{{$produit->prix}}" name="prix" placeholder="Prix" >
            @if ($errors->has('prix'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prix') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Marque</label>
            <input class="form-control" type="text" value="{{$produit->marque}}" name="marque" placeholder="marque" >
            @if ($errors->has('marque'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('marque') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Dans le stock</label>
            <input class="form-control" type="text" value="{{$produit->qteStock}}" name="qteStock" placeholder="qteStock" >
            @if ($errors->has('qteStock'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('qteStock') }}</strong>
            </span>
            @endif
        </div>

        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Modifiet</button>
            <a class="btn btn-secondary" href="/produits">Retourner</a>
        </div>
    </form>
</div>
@endsection