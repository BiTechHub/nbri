<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use App\Models\Admin;
use App\Models\Visitor;
use App\Models\Feedback;
use App\Models\Application;
use App\Models\Guest;


class GuestHouseControllerAdmin extends Controller
{

public function PendingApplications(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Guest House Management'],
								['user_access_types.sub_menu','Pending Applications']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_view=='N')
            {
                session()->put('message','Access denied');
                return redirect('/admin-panel/dashboard');
            }
        }
        else
        {
            session()->put('message','Access denied');
            return redirect('/admin-panel/dashboard');
        }
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
        $vijay = Application::where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.addmenu', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }



}
