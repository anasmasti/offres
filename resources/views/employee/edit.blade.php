@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/employees/edit/{{$employee->id}}" method="post">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Nom</label>
            <input class="form-control" type="text" name="nom" value="{{$employee->nom}}" placeholder="Nom" >
            @if ($errors->has('nom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('nom') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Prénom</label>
            <input class="form-control" type="text" name="prenom" value="{{$employee->prenom}}" placeholder="Prénom" >
            @if ($errors->has('prenom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prenom') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email" value="{{$employee->email}}" placeholder="Email" >
            @if ($errors->has('email'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Mot de passe</label>
            <input class="form-control" type="password" name="password" value="{{$employee->password}}" placeholder="Mot de passe" >
            @if ($errors->has('password'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Téléphone</label>
            <input class="form-control" type="text" name="tel" value="{{$employee->tel}}" placeholder="Téléphone" >
            @if ($errors->has('tel'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('tel') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">CV</label>
            <input class="form-control" type="file" name="cv" value="{{$employee->cv}}">
            @if ($errors->has('cv'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('cv') }}</strong>
            </span>
            @endif
        </div>

        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Modifiet</button>
            <a class="btn btn-secondary" href="/employees">Retourner</a>
        </div>
    </form>
</div>
@endsection