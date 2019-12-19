<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class AdminController extends Controller
{
    public function index() {

        if (Gate::denies('access-admin')) {
            return redirect()->back()->with(['message' => 'У вас нет прав']);
        }

        return view('admin.index');
    }
}
