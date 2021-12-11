@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/produit/add" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <label class="form-label">Libelle</label>
            <input class="form-control" type="text" name="libelle" placeholder="Libelle" >
            @if ($errors->has('libelle'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('libelle') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Prix</label>
            <input class="form-control" type="text" name="prix" placeholder="Prix" >
            @if ($errors->has('prix'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('prix') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Marque</label>
            <input class="form-control" type="text" name="marque" placeholder="Marque" >
            @if ($errors->has('marque'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('marque') }}</strong>
            </span>
            @endif
        </div>

        <div class="my-3">
            <label class="form-label">Dans le stock</label>
            <input class="form-control" type="text" name="qteStock" placeholder="qteStock" >
            @if ($errors->has('qteStock'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('qteStock') }}</strong>
            </span>
            @endif
        </div>

        <div>
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="image">
            @if ($errors->has('image'))
            <span role="alert" class="text-danger">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
            @endif
        </div>

        <div class="mt-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" id="summernote" cols="30" rows="10"></textarea>
        </div>
        
        <div class="mt-5">
            <button class="btn btn-primary" type="submit">Ajouter</button>
            <a class="btn btn-secondary" href="/produits">Retourner</a>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
      </script>
</div>    
@endsection