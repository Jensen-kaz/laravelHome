<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class GlobalComposer {

    public function compose(View $view) {

        $view->with('currentUser', Auth::user());
    }
}
