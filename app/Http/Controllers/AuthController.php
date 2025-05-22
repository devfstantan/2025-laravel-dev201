<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show signup page
     */
    public function signupCreate(){
        return view('auth.signup');
    }

    /**
     * handle signup submit
     */
    public function signupStore(Request $request){
        // 1- valider form
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        // 2- créer l'user
        $user = User::create($validated);
        // 3- connecter l'user
        Auth::login($user);
        // 4- redériger vers la liste des produits
        return to_route('products.index');
    }

     /**
     * Show login page
     */
    public function loginCreate(){
        
        return view('auth.login');
    }

    /**
     * handle login submit
     */
    public function loginStore(Request $request){
        // 1- valider form
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // 2- Essayer de connecter l'utilisateur
        $loggedin = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // cas de mauvais criedentials 
        if(! $loggedin){
            return back()->with('error','Email ou mot de passe incorrectes');
        }

        // 4- redériger vers la liste des produits
        return to_route('products.index');
    }

    /**
     * handle logout submit
     */
    public function logout(){
        // 1- déconnecter l'user
        Auth::logout();
        // 2- redériger vers la page de login
        return to_route('auth.login.create');
    }
}
