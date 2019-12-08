<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            $param = $request->all();
            Session::flash('comment_unauth_user', 'Вы не авторизованы');
            return redirect(url('articles/view', ['id' => $param['articleId']]));
        }

        return $next($request);
    }
}
