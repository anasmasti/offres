@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/offres/edit/{{$offre->id}}" method="post">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Titre</label>
            <input class="form-control" type="text" name="title" value="{{$offre->title}}" placeholder="Titre" >
            @if ($errors->has('title'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>

        <div class="mt-3">
            <label class="form-label"><srrong>Etat</srrong>&nbsp;&nbsp;&nbsp;</label>
            Expirer <input class="form-check-input" type="radio" name="etat" id="etat">
            Non <input class="form-check-input" type="radio" name="etat" id="etat" checked>
        </div>

        <div class="mt-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="desc" id="summernote" cols="30" rows="10" value="{{$offre->desc}}"></textarea>
        </div>

        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Modifiet</button>
            <a class="btn btn-secondary" href="/offres">Retourner</a>
        </div>
    </form>
</div>
@endsection