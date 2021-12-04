@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/clients/edit/{{$client->idcli}}" method="post">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Nom</label>
            <input class="form-control" type="text" value="{{$client->nom}}" name="nom" placeholder="Nom" >
            @if ($errors->has('nom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('nom') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Prénom</label>
            <input class="form-control" type="text" value="{{$client->prenom}}" name="prenom" placeholder="Prénom" >
            @if ($errors->has('prenom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prenom') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Téléphone</label>
            <input class="form-control" type="text" value="{{$client->tel}}" name="tel" placeholder="Téléphone" >
            @if ($errors->has('tel'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('tel') }}</strong>
            </span>
            @endif
        </div>

        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Modifiet</button>
            <a class="btn btn-secondary" href="/clients">Retourner</a>
        </div>
    </form>
</div>
@endsection