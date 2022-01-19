<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(User $user, Request $request)
    { 
        if (Auth::user()) {
        if ($request -> isMethod('POST')) {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required',
            'cv' => 'required',
            'email' => 'sometimes|required|email', Rule::unique('users')->ignore(Auth::user()->id),
            'password' => 'required|string|min:8'
        ]);

        $cv = $request->file('cv');
      
        $name =  time() . "-cv." . $cv->getClientOriginalExtension();
        $path = 'img/employees/';
        $cv_url = $path . $name;
        $cv->move($path, $name);

        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->tel = $request->tel;
        $user->cv = $cv_url;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return Redirect::to('/users/'.Auth::user()->id)->with('message', 'Informaions modifié avec succès');
            } else {
                $user = Auth::user();
                return view('users.edit', compact('user'));
            }
        } else {
            return redirect('/login');
        }
    }

    public function destroy($idemp)
    {
        if (Auth::user()) {
            $employee = User::findOrFail($idemp);
            $employee -> delete();
            Session::flush();
            Auth::logout();
            return redirect('/')->with('message', 'Votre compte est supprimé');
        } else {
            return redirect('/login');
        }    
    }
}