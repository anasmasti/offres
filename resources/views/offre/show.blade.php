@extends('layouts.app')

@section('content')
<div class="p-5">
    <h1>
        {{ $offre->title }}
    </h1>
    <ul>
        <li>ID <strong>{{ $offre->id }}</strong></li>
    </ul>
</div>    
@endsection