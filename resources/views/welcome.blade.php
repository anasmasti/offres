@extends('layouts.app')

@section('content')
       <div class="container-fluid py-5 mt-lg-5" >
            <h1 class="display-5 fw-bold mb-4">Offres d'emploi</h1>
            <div class="col-12 row">
                  @foreach ($offres as $offre)
                        <div class="card bg-white border-0 text-white col-4" >
                              <img src="{{ $offre->image_url }}" style="filter: brightness(70%); height: 12rem" class="card-img">
                              <div class="card-img-overlay p-4">
                                    <h3 class="card-title fw-bold">{{ $offre->title }}</h3>
                                    <p class="card-text mb-5">{!! $offre->desc !!}</p>
                                    <p class="card-text">{{date('d-m-Y', strtotime($offre->updated_at)) }}</p>
                              </div>
                        </div>
                  @endforeach
            </div>
      </div>
@endsection
