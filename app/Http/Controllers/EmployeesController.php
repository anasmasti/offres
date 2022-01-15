<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Auth;


class EmployeesController extends Controller
{
    public function show($idemp)
    {
        $employee = Employee::findOrFail($idemp);

        return view('employee.show', ['employee'=>$employee]);
    }

    public function index()
    {
        $employees = Employee::latest()->paginate(3);

        return view('employee.list', ['employees'=>$employees]);
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $request->validate([
                    'nom' => 'required',
                    'prenom' => 'required',
                ]);

                $cv = $request->file('cv');
                $Name =  time() . "-cv." . $cv->getClientOriginalExtension();

                $path = 'img/employees/';
                $cv_url = $path . $Name;
                $cv->move($path, $Name);

                Employee::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'password' => $request->password,
                    'tel' => $request->tel,
                    'cv' => $cv_url,
                  ]);

                return redirect('/employees')->with('message', 'employee ajouté avec succès');
            } else {
                return view('employee.add');
            }
        } else {
            return redirect('/login');
        }
    }

    public function update($idemp, Request $request)
    {
        if (Auth::user()) {
            if ($request -> isMethod('POST')) {
                $employee = Employee::findOrFail($idemp);

                $request->validate([
                    'nom' => 'required',
                    'prenom' => 'required',
                ]);

                $employee -> update($request->all());

                return redirect('/employees')->with('message', 'employee modifié avec succès');
            } else {
                $employee = Employee::findOrFail($idemp);
                return view('employee.edit', ['employee'=>$employee]);
            }
        } else {
            return redirect('/login');
        }
    }

    public function destroy($idemp)
    {
        if (Auth::user()) {
            $employee = Employee::findOrFail($idemp);
            $employee -> delete();

            return redirect('/employees')->with('message', 'employee supprimé avec succès');
        } else {
            return redirect('/login');
        }    
    }
}
