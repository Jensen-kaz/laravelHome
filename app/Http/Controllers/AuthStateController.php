<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthStateController extends Controller
{

    public function state()
    {
        if (Auth::check()) {
            $currentUser = Auth::user();
            dd($currentUser);
            return view('auth-state.state')->with('currentUser', $currentUser);
        }
    }
}
