<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use Auth;

class OffresController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($idoffre)
    {
        $offre = Offre::findOrFail($idoffre);

        return view('offre.show', ['offre'=>$offre]);
    }

    public function index()
    {
        $offres = Offre::latest()->paginate(3);

        return view('offre.list', ['offres'=>$offres]);
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $request->validate([
                    'title' => 'required',
                ]);


                Offre::create($request->all());

                return redirect('/offres')->with('message', 'offre ajouté avec succès');
            } else {
                return view('offre.add');
            }
        } else {
            return redirect('/login');
        }
    }

    public function update($idoffre, Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $offre = Offre::findOrFail($idoffre);

                $request->validate([
                    'title' => 'required',
                ]);

                $offre -> update($request->all());

                return redirect('/offres')->with('message', 'offre modifié avec succès');
            } else {
                $offre = Offre::findOrFail($idoffre);
                return view('offre.edit', ['offre'=>$offre]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function destroy($idoffre)
    {
        if (Auth::user()) {
            $offre = Offre::findOrFail($idoffre);
            $offre -> delete();

            return redirect('/offres')->with('message', 'offre supprimé avec succès');
        } else {
            return redirect('/login');
        }
    }

    public function afficherSitemap()
    {
        $offres = Offre::latest()->get();
        return view('sitemaps.sitemap1', ['offres'=>$offres]);
    }
}
