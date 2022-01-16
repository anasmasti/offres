@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 p-3" style="box-shadow: -3px 10px 20px 0px rgb(0 0 0 / 7%);border-radius:23px;">
                <div class="card-header bg-white display-4 border-0 fw-bold">{{ __("S'inscrire") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
            <input class="form-control" type="text" name="name" placeholder="Nom" >
            @if ($errors->has('name'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <input class="form-control" type="text" name="prenom" placeholder="Prénom" >
            @if ($errors->has('prenom'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prenom') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <input class="form-control" type="email" name="email" placeholder="Email" >
            @if ($errors->has('email'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <input class="form-control" type="password" name="password" placeholder="Mot de passe" >
            @if ($errors->has('password'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <input class="form-control" type="text" name="tel" placeholder="Téléphone" >
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

                       

                        <div class="row mb-0 mt-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary rounded-pill">
                                    {{ __("S'inscrire maintenant") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
