<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
    if(!session()->has('Loggeduser') && $request->path() != '/'){
        return redirect('/admin-panel')->with('fail','You must be logged in.');
    }
    $response=$next($request);
    $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
    $response->headers->set('Pragma','no-cache');
    $response->headers->set('Expires','Sat, 01 Jan 2020 00:00:00 GMT');
    return $response;
    }
}
