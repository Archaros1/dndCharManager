<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function profil(Request $request)
    {
        if (Auth::user() && Auth::user()->id) {
            $user = Auth::user();
            $characters = $user->characters;
            // dd($characters);
            return view('user.profil', [
                'user' => $user,
                'characters' => $characters,
            ]);
        }

        return redirect('/home');
    }
}
