<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class MustBeAdmin
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
        $id = Auth::user()->id;
        $user = Auth::user();
        $admin = User::find($id)->role->title === 'Administratorius';

        if($user && $admin)
        {
            return $next($request);
        }

        else{
        //return view('errors.notAdmin');
        return redirect('/');
        }
    }
}
