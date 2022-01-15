@extends('layouts.app')

@section('content')
<div class="p-5">
    <span class="badge bg-primary mb-2">{{date('d-m-Y', strtotime($offre->updated_at)) }}</span>
   @if ( $offre->etat == true )
    <span class="badge bg-success mb-2">En cours</span>
    @endif
    @if ( $offre->etat == false )
    <span class="badge bg-danger mb-2">Expiré</span>
    @endif
    <h1 class="fw-bold display-2 text-primary mb-4">
        {{ $offre->title }}
    </h1>
    <h4 class="fw-bold mb-4">
        Description :
    </h4>
    <div>
    {!! $offre->desc !!}
    </div>
</div>    
@endsection