<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Client;
use App\Models\Vente;
use Auth;
use PDF;
use Illuminate\Support\Facades\DB;

class VenteController extends Controller
{
    public function vendre(Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $request->validate([
                    'idcli' => 'required',
                    'idpro' => 'required',
                    'qtevente' => 'required',
                    'datevente' => 'required',
                    'prixVente' => 'required',
                ]);
                Vente::create($request->all());
                return redirect('/ventes')->with('message', 'Produit vendu avec succès');
            } else {
                $clients = Client::latest()->paginate(100);
                $produits = Produit::latest()->paginate(100);

                return view('ventes.form', ['clients'=>$clients, 'produits'=>$produits]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function list()
    {
        $ventes = DB::table('ventes')
            ->join('produits', 'ventes.idpro', '=', 'produits.idpro')
            ->join('clients', 'ventes.idcli', '=', 'clients.idcli')
            ->select('ventes.*', 'produits.*', 'clients.*')
            ->get();

        return view('ventes.list', ['ventes'=>$ventes]);
    }

    public function venteByProduits()
    {
        $ventesByProduit = DB::select(DB::raw("SELECT p.idpro,p.libelle,sum(v.qtevente) as total 
            FROM produits p, ventes v WHERE v.idpro = p.idpro group by p.idpro, p.libelle, p.idpro"));

        return view('ventes.charts', ['ventesByProduit'=>$ventesByProduit]);
    }

    public function facture($idcli)
    {
        $factures = DB::table('ventes')
            ->join('produits', 'ventes.idpro', '=', 'produits.idpro')
            ->join('clients', 'ventes.idcli', '=', 'clients.idcli')
            ->select('ventes.*', 'produits.*', 'clients.*')
            ->where('ventes.idcli', $idcli)
            ->get();

        return view('ventes.facture', ['factures'=>$factures]);
    }

    public function imprimerfacture($idcli)
    {
        $factures = DB::table('ventes')
            ->join('produits', 'ventes.idpro', '=', 'produits.idpro')
            ->join('clients', 'ventes.idcli', '=', 'clients.idcli')
            ->select('ventes.*', 'produits.*', 'clients.*')
            ->where('ventes.idcli', $idcli)
            ->get();

        $pdf = PDF::loadView('ventes.facture', ['factures'=>$factures]);
        return $pdf->download('facture.pdf');
    }
}
