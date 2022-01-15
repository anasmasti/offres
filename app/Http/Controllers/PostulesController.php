<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Employee;
use App\Models\Postule;
use Auth;
use PDF;
use Illuminate\Support\Facades\DB;

class PostulesController extends Controller
{
    public function postuler(Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $request->validate([
                    'idemp' => 'required',
                    'idoffre' => 'required',
                ]);
                Postule::create($request->all());
                return redirect('/postules')->with('message', 'Votre postulation faite avec succès');
            } else {
                $employees = Employee::latest()->paginate(100);
                $offres = Offre::latest()->paginate(100);

                return view('postules.form', ['employees'=>$employees, 'offres'=>$offres]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function list()
    {
        $postules = DB::table('postules')
            ->join('offres', 'postules.idoffre', '=', 'offres.id')
            ->join('employees', 'postules.idemp', '=', 'employees.id')
            ->select('postules.*', 'offres.*', 'employees.*')
            ->get();

        return view('postules.list', ['postules'=>$postules]);
    }
}
