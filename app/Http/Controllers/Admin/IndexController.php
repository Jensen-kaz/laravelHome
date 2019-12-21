<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class IndexController extends Controller
{
    public function index() {

        if (Gate::denies('access-admin')) {
            return redirect()->back();
        }

        return view('admin.index');
    }
}
