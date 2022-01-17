<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Employee;
use App\Models\Postule;
use Auth;
use PDF;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostulesController extends Controller
{
    public function postuler($offerId, Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                Postule::create($request->all());
                return redirect('/')->with('message', 'Votre postulation faite avec succès');
            } else {
                $offre = Offre::findOrFail($offerId);

                return view('postules.form', ['offre'=>$offre]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function list()
    {
       if (Auth::user() && Auth::user()->type == 'admin') {
        $postules = DB::table('postules')
            ->join('offres', 'postules.idoffre', '=', 'offres.id')
            ->join('users', 'postules.idemp', '=', 'users.id')
            ->select('postules.*', 'offres.*', 'users.*')
            ->paginate(3);

        return view('postules.list', ['postules'=>$postules]);
    }

    if (Auth::user() && Auth::user()->type == 'user') {
        $postules = DB::table('postules')
            ->join('offres', 'postules.idoffre', '=', 'offres.id')
            ->join('users', 'postules.idemp', '=', 'users.id')
            ->select('postules.*', 'offres.*', 'users.*')
            ->where('users.id', Auth::user()->id)
            ->paginate(3);

        return view('postules.list', ['postules'=>$postules]);
    }
    }
}
