@extends('layouts.app')

@section('content')
<div class="p-5">
    <form action="/postules/postuler/{{$offre->id}}" method="post">
        {{ csrf_field() }}
        <div>
            <input type="hidden" name="idemp" value="{{Auth::user()->id}}">
            <input type="hidden" name="idoffre" value="{{$offre->id}}">
            <input type="hidden" name="date" value="{{Carbon\Carbon::now();}}">
        </div>
        <h1 class="mt-5 fw-bold">Voulez-vous postuler à l'offre <span class="text-primary">{{$offre->title}}</span>?</h1>
        <div class="mt-4">
            <button class="btn btn-primary rounded-pill" type="submit">Oui, Postuler maintenant</button>
        </div>
    </form>
</div>    
@endsection