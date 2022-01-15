@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/postules/postuler" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Employés</label>
            <select class="form-select" aria-label="Default select example" name="idemp">
                @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }}</option>
                @endforeach
            </select>
            @if ($errors->has('idemp'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('idemp') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Offres</label>
            <select class="form-select" aria-label="Default select example" name="idoffre">
                @foreach ($offres as $offre)
                    <option value="{{ $offre->id }}">{{ $offre->title }}</option>
                @endforeach
            </select>
            @if ($errors->has('idoffre'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('idoffre') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Date</label>
            <input class="form-control" type="date" name="date">
            @if ($errors->has('date'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
            @endif
        </div>
        
        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Postuler</button>
            <a class="btn btn-secondary" href="/postules">Retourner</a>
        </div>
    </form>
</div>    
@endsection