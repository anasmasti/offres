@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
            <label class="form-label">Nom</label>
            <input class="form-control" type="text" name="name" placeholder="Nom" >
            @if ($errors->has('name'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
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

                       

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
