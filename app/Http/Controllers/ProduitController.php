<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Auth;

class ProduitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($idpro)
    {
        $produit = Produit::findOrFail($idpro);

        return view('produit.show', ['produit'=>$produit]);
    }

    public function index()
    {
        $produits = Produit::latest()->paginate(3);

        return view('produit.list', ['produits'=>$produits]);
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $request->validate([
                    'marque' => 'required',
                    'prix' => 'required',
                    'image' => 'required',
                ]);

                $image = $request->file('image');
                $Name =  time() . "-photo." . $image->getClientOriginalExtension();

                $path = 'img/produits/';
                $image_url = $path . $Name;
                $image->move($path, $Name);

                Produit::create([
                    'libelle' => $request->libelle,
                    'marque' => $request->marque,
                    'prix' => $request->prix,
                    'qteStock' => $request->qteStock,
                    'image' => $image_url,
                  ]);

                return redirect('/produits')->with('message', 'Produit ajouté avec succès');
            } else {
                return view('produit.add');
            }
        } else {
            return redirect('/login');
        }
    }

    public function update($idpro, Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $produit = Produit::findOrFail($idpro);

                $request->validate([
                    'marque' => 'required',
                    'prix' => 'required',
                ]);

                $produit -> update($request->all());

                return redirect('/produits')->with('message', 'Produit modifié avec succès');
            } else {
                $produit = Produit::findOrFail($idpro);
                return view('produit.edit', ['produit'=>$produit]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function destroy($idpro)
    {
        if (Auth::user()) {
            $produit = Produit::findOrFail($idpro);
            $produit -> delete();

            return redirect('/produits')->with('message', 'Produit supprimé avec succès');
        } else {
            return redirect('/login');
        }
    }
}
