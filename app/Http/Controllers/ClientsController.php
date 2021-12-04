<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Auth;


class ClientsController extends Controller
{
    public function show($idcli)
    {
        $client = Client::findOrFail($idcli);

        return view('client.show', ['client'=>$client]);
    }

    public function index()
    {
        $clients = Client::latest()->paginate(3);

        return view('client.list', ['clients'=>$clients]);
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $request->validate([
                    'nom' => 'required',
                ]);

                Client::create($request->all());

                return redirect('/clients')->with('message', 'Client ajouté avec succès');
            } else {
                return view('client.add');
            }
        } else {
            return redirect('/login');
        }
    }

    public function update($idcli, Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $client = Client::findOrFail($idcli);

                $request->validate([
                    'nom' => 'required',
                ]);

                $client -> update($request->all());

                return redirect('/clients')->with('message', 'Client modifié avec succès');
            } else {
                $client = Client::findOrFail($idcli);
                return view('client.edit', ['client'=>$client]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function destroy($idcli)
    {
        if (Auth::user()) {
            $client = Client::findOrFail($idcli);
            $client -> delete();

            return redirect('/clients')->with('message', 'Client supprimé avec succès');
        } else {
            return redirect('/login');
        }    
    }
}
