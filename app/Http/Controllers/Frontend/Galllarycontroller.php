<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Galllarycontroller extends Controller
{

    public function index()
    {
        //
        $gall=DB::table('mediaa')
        ->orderBy('id','desc')
        ->get();
        return view('frontend.gallary.gallary')->with('scdfgontent',$gall);

    }

}
