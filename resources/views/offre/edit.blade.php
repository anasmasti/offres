@extends('layouts.app')

@section('content')
<div class="p-5">
    <h1 class="fw-bold mb-5">
        Modifier l'offre <span class="text-primary">{{$offre->title}}</span> 
    </h1>
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
            <label class="form-label">Image URL</label>
            <input class="form-control" type="text" name="image_url" value="{{$offre->image_url}}" placeholder="URL" >
            @if ($errors->has('image_url'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('image_url') }}</strong>
            </span>
            @endif
        </div>

        <div class="mt-3">
            <label class="form-label"><strong>Etat :</strong>&nbsp;&nbsp;&nbsp;</label>
            Expirer <input class="form-check-input" type="radio" name="etat" id="etat" value="0" {{ ($offre->etat=="0")? "checked" : "" }}>&nbsp;
            En cour <input class="form-check-input" type="radio" name="etat" id="etat" value="1"{{ ($offre->etat=="1")? "checked" : "" }}>
        </div>

        <div class="mt-2">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="desc" id="summernote" cols="30" rows="10"  ></textarea>
        </div>

        <div class="mt-5">
            <button class="btn btn-primary rounded-pill" type="submit">Modifiet</button>
            <a class="btn btn-dark rounded-pill" href="/offres">Retourner</a>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
        
      </script>
</div>
@endsection