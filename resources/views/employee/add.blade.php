@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/employee/add" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Nom</label>
            <input class="form-control" type="text" name="nom" placeholder="Nom" >
            @if ($errors->has('nom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('nom') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Prénom</label>
            <input class="form-control" type="text" name="prenom" placeholder="Prénom" >
            @if ($errors->has('prenom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prenom') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" >
            @if ($errors->has('email'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Mot de passe</label>
            <input class="form-control" type="password" name="password" placeholder="Mot de passe" >
            @if ($errors->has('password'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Téléphone</label>
            <input class="form-control" type="text" name="tel" placeholder="Téléphone" >
            @if ($errors->has('tel'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('tel') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">CV</label>
            <input class="form-control" type="file" name="cv">
            @if ($errors->has('cv'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('cv') }}</strong>
            </span>
            @endif
        </div>
        
        <div class="mt-3">
            <button class="btn btn-primary" type="submit">Ajouter</button>
            <a class="btn btn-secondary" href="/employees">Retourner</a>
        </div>
    </form>
</div>    
@endsection