@extends('layouts.app')

@section('content')
<div class="p-3">
    <h1>
        Liste des produits
    </h1>

    <a class="btn btn-dark" href="/produit/add">Un nouveau produit</a>
    <br />
    <br />
    <br />

    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libelle</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                {{-- DISPLAY DATA --}}
                @foreach ($produits as $pro)
                <tr>
                    <td>{{ $pro->idpro }}</td>
                    <td>{{ $pro->libelle }}</td>
                    <td>{{ $pro->marque }}</td>
                    <td>{{ $pro->prix }}MAD</td>
                    <td class="btn-group" role="group">
                        <a class="btn btn-light" href="/produits/{{ $pro->idpro }}">Detail</a>
                        <a class="btn btn-warning" href="/produits/edit/{{ $pro->idpro }}">Modifier</a>
                        <form action="/produits/delete/{{ $pro->idpro }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav>
            {{ $produits->links() }}
        </nav>
        @if ($message = Session::get('message'))
            <p class="alert alert-success">
                {{ $message }}
            </p>
        @endif
</div>        
@endsection