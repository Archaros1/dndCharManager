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
            $user = User::find(Auth::user()->id);
            return view('user.profil', [
                'user' => $user
            ]);
        }

        return redirect('/home');
    }
}
