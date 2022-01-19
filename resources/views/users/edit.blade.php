@extends('layouts.app')

@section('content')
<div class="p-5">
    <form method="post" action="/users/{{$user->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('post') }}
        @if ($message = Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>C'est fait!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-5">
             <h1 class="fw-bold">
                Mon profile
            </h1>
            <form action="/users/{{ $user->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-sm btn-danger rounded-pill" type="submit">
                    Supprimer mon compte
                </button>
            </form>
        </div>
   
        <div>
        <input class="form-control" type="text" name="name" value="{{ $user->name }}"  placeholder="Nom" >
            @if ($errors->has('name'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <input class="form-control" type="text" name="prenom" value="{{ $user->prenom }}"  placeholder="Prénom" >
            @if ($errors->has('prenom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prenom') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <input class="form-control" type="email" name="email" value="{{ $user->email }}"  placeholder="Email" >
            @if ($errors->has('email'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <input class="form-control" type="password" name="password" value="{{ $user->password }}"  placeholder="Mot de passe" >
            @if ($errors->has('password'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <input class="form-control" type="text" name="tel" value="{{ $user->tel }}"  placeholder="Téléphone" >
            @if ($errors->has('tel'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('tel') }}</strong>
            </span>
            @endif
        </div>

        <div class="mt-3">
            <label class="form-label"><strong>Curriculum vitae</strong></label>
            <input class="form-control" type="file" name="cv">
            @if ($errors->has('cv'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('cv') }}</strong>
            </span>
            @endif
        </div>


        <button type="submit" class="btn btn-primary rounded-pill mt-5">Modifier mes information</button>
       
    </form>
   
    
</div>
@endsection