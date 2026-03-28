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
use App\Models\Childmenu;
use App\Models\Submenu;
use App\Models\Staffmenu;
use App\Models\Menu;
use App\Models\Guest;
use App\Models\ProfileContent;
use App\Models\Staffcontent;


class StaffController extends Controller
{

public function addstaff(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Our People Management'],
								['user_access_types.sub_menu','Our People']
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
        $vijay = DB::table('staff_cat')->select('staff_cat.*','menus.menu_name','submenus.sub_name')
          ->join('menus','menus.id','=','staff_cat.mainmenu')
          ->join('submenus','submenus.id','=','staff_cat.submenu')
          ->where('staff_cat.isDeleted','N')->orderBy('staff_cat.id')->get();
        $minu = Menu::where('isDeleted','N')->where('menu_name','Our People')->orderBy('id')->get();

        return view('admin.addstaff', $data)->with('minu',$minu)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }

 public function uploadaddstaff(Request $request){
    $validatedData = $request->validate([
        'sub_menu' => 'required',
        'main_cat' => 'required',
        'childcat' => 'required',
        'childcat_hi' => 'required'

       ]);

    $save = new Staffmenu;
    $save->submenu = $request->input('sub_menu');
    $save->mainmenu = $request->input('main_cat');
    $save->child_menu = $request->input('childcat');
    $save->childmenu_hi = $request->input('childcat_hi');
    $save->save();
    
    return redirect()->back()->with('status', 'Data Has been uploaded');

   }
  public function uploadeditstaff(Request $request){
    $validatedData = $request->validate([
        
        'position' => 'required',
        'childcat' => 'required',
        'childcat_hi' => 'required'

       ]);

    $save = Staffmenu::where('id',$request->get('id'))->first();
    
    $save->position = $request->input('position');
    $save->child_menu = $request->input('childcat');
    $save->childmenu_hi = $request->input('childcat_hi');
    $save->updated_at = date('Y-m-d h:i:s');
    $save->updated_by = session()->get('Loggeduser');
    $save->save();
    
    return redirect()->back()->with('status', 'Content Updated Successfully..');

   }
  public function staffdel($id){
        $imagem = Staffmenu::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Content Deleted Successfully.');
        }else{
            return back()->with('fail','Content Not Deleted Successfully.');

        }
    }
  public function delallottment($id){
        $imagem = DB::table('bookings')->where('id', $id)->delete();

        if($imagem){

        return back()->with('status','Content Deleted Successfully.');
        }else{
            return back()->with('status','Content Not Deleted Successfully.');

        }
    }
  public function addstaffdetails(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Our People Management'],
								['user_access_types.sub_menu','Our People Details']
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
        $vijay = ['me'=>Submenu::orderBy('id', 'desc')->get()];
        $swt = Menu::where('isDeleted','N')->where('menu_name','Our People')->get();
        $swtt = Submenu::where('isDeleted','N')->get();
        return view('admin.addstaffcontent', $data, $vijay)->with('swt',$swt)->with('swtt',$swtt)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function uploadstaffcontent(Request $request){
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Staffcontent',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
  
        $validatedData = $request->validate([
            'main' => 'required',
            'sub' => 'required',
          'name' => 'required',
            'name_hi' => 'required',
          'deg' => 'required',
            'deg_hi' => 'required',
          'area' => 'required',
            'area_hi' => 'required',
          'address' => 'required',
            'address_hi' => 'required',
          'email' => 'required',
            'contact' => 'required',
            'image' => 'required|mimes:jpg,jpeg|mimetypes:image/jpg,image/jpeg|max:2000',
            'resume' => 'nullable|mimes:pdf|mimetypes:application/pdf|max:55000',

           ]);
           
           $main_cat = $request->input('main');
           $sub_cat = $request->input('sub');
           $child_cat = $request->input('child');

          
        //    $bl_file = time().".pdf";
        //    $destinationPath = public_path('uploads/staffResume');
        //    if (!file_exists($destinationPath)) {
        //     mkdir($destinationPath, 0777, true);
        //    }
        //    $request->file('resume')->move(
        //     $destinationPath.'/', $bl_file
        //    );


            $bl_file = null;

            if ($request->hasFile('resume')) {

                $bl_file = time() . ".pdf";

                $destinationPath = public_path('uploads/staffResume');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $request->file('resume')->move($destinationPath, $bl_file);
            }
    
           $im_file = time().".jpg";
           $destinationPath = public_path('uploads/staffPics');
           if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
           }
           $request->file('image')->move(
            $destinationPath.'/', $im_file
           );


           $save = new Staffcontent;
           $save->menu = $main_cat;
           $save->submenu = $sub_cat;
           $save->childmenu = $child_cat;
           $save->name = $request->input('name');
           $save->name_hi = $request->input('name_hi');
           $save->deg = $request->input('deg');
           $save->deg_hi = $request->input('deg_hi');
           $save->area = $request->input('area');
		   $save->area_hi = $request->input('area_hi');
           $save->address = $request->input('address');
		   $save->address_hi = $request->input('address_hi');
           $save->email = $request->input('email');
		   $save->contact = $request->input('contact');
           $save->image = $im_file;
           $save->resume = $bl_file;
           $save->position = $request->input('position');
           $save->save();

           return redirect()->back()->with('status', 'Content Has been uploaded');
    
   }
  public function updatestaffcontent(Request $request)
{
    // Validate user inputs (prevents XSS)
    $validatedData = $request->validate([
        'name'          => 'required|string|max:255',
        'name_hi'       => 'required|string|max:255',
        'sub_area_menu' => 'required',
        'position'      => 'required',
        'deg'           => 'required|integer',
        'deg_hi'        => 'required',
        'address'       => 'required|string',
        'address_hi'    => 'required|string',
        'email'         => 'required|email',
        'contact'       => 'required',
    ]);

    // Sanitize all user inputs (XSS prevention)
    $clean = [];
    foreach ($validatedData as $key => $value) {
        $clean[$key] = is_string($value) ? strip_tags(trim($value)) : $value;
    }

    // Get existing record
    $staff = Staffcontent::findOrFail($request->id);

    // Fetch new degree/category
    $getDeg = DB::table('staff_cat')->where('id', $request->deg)->first();
    $deg    = strip_tags($getDeg->child_menu);
    $deg_hi = strip_tags($getDeg->childmenu_hi);

    // If childmenu changed → auto assign position
    if ($staff->childmenu != $request->deg) {

        $checkPos = DB::table('staffcontent')
            ->where('childmenu', $getDeg->id)
            ->orderByRaw('CAST(position AS UNSIGNED) DESC')
            ->first();

        $position = $checkPos ? ((int) $checkPos->position + 1) : 1;

        DB::table('staffcontent')
            ->where('id', $request->id)
            ->update([
                'childmenu' => $getDeg->id,
                'position'  => $position
            ]);
    }

    // Log action
    DB::table('action_logs')->insert([
        'ip_address' => $request->ip(),
        'action_type' => 'Edit Staffcontent',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id'    => session('Loggeduser'),
        'user_name'  => Admin::where('id', session('Loggeduser'))->value('username'),
    ]);

    // --- IMAGE UPLOAD ---
    if ($request->hasFile('image')) {

        $request->validate([
            'image' => 'mimes:jpg,jpeg|max:2000'
        ]);

        $im_file = time() . ".jpg";
        $destinationPath = public_path('uploads/staffPics');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $request->file('image')->move($destinationPath, $im_file);

    } else {
        $im_file = $staff->image;
    }

    // --- RESUME UPLOAD ---
    if ($request->hasFile('resume')) {

        $request->validate([
            'resume' => 'mimes:pdf|max:55000'
        ]);

        $bl_file = time() . ".pdf";
        $destinationPath = public_path('uploads/staffResume');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $request->file('resume')->move($destinationPath, $bl_file);

    } else {
        $bl_file = $staff->resume;
    }

    // Areas
    $area = $request->input('area', '');
    $area = is_array($area) ? implode(',', $area) : $area;
    $area = strip_tags(trim($area));

    // Final Save
    $staff->name       = $clean['name'];
    $staff->name_hi    = $clean['name_hi'];
    $staff->submenu    = $clean['sub_area_menu'];
    $staff->deg        = $deg;
    $staff->deg_hi     = $deg_hi;
    $staff->area       = $area;
    $staff->address    = $clean['address'];
    $staff->address_hi = $clean['address_hi'];
    $staff->email      = $clean['email'];
    $staff->contact    = strip_tags($request->contact);
    $staff->image      = $im_file;
    $staff->resume     = $bl_file;
    $staff->updated_by = session('Loggeduser');
    $staff->updated_at = now();
    $staff->save();

    return redirect()->back()->with('status', 'Content has been updated successfully.');
}

  public function moveUp($id)
{
    $staff = DB::table('staffcontent')->where('id', $id)->first();

    if (!$staff) {
        return response()->json(['status' => 'error', 'message' => 'Staff not found'], 404);
    }

   
    $previous = DB::table('staffcontent')
        ->where('position', '<', $staff->position)
        ->orderBy('position', 'desc')
        ->first();

    if ($previous) {
        DB::table('staffcontent')->where('id', $staff->id)->update(['position' => $previous->position]);
        DB::table('staffcontent')->where('id', $previous->id)->update(['position' => $staff->position]);
    }

    return response()->json(['status' => 'success']);
}

public function moveDown($id)
{
    $staff = DB::table('staffcontent')->where('id', $id)->first();

    if (!$staff) {
        return response()->json(['status' => 'error', 'message' => 'Staff not found'], 404);
    }


    $next = DB::table('staffcontent')
        ->where('position', '>', $staff->position)
        ->orderBy('position', 'asc')
        ->first();

    if ($next) {
        DB::table('staffcontent')->where('id', $staff->id)->update(['position' => $next->position]);
        DB::table('staffcontent')->where('id', $next->id)->update(['position' => $staff->position]);
    }

    return response()->json(['status' => 'success']);
}
  
 public function moveUparea($id)
{
    $staff = DB::table('staffcontent')->where('id', $id)->first();

    if (!$staff) {
        return response()->json(['status' => 'error', 'message' => 'Staff not found'], 404);
    }

    $previous = DB::table('staffcontent')
        ->where('area_position', '<', $staff->area_position)
        ->orderBy('area_position', 'desc')
        ->first();

    if ($previous) {
        DB::table('staffcontent')->where('id', $staff->id)->update(['area_position' => $previous->area_position]);
        DB::table('staffcontent')->where('id', $previous->id)->update(['area_position' => $staff->area_position]);
    }

    return response()->json(['status' => 'success']);
}

public function moveDownarea($id)
{
    $staff = DB::table('staffcontent')->where('id', $id)->first();

    if (!$staff) {
        return response()->json(['status' => 'error', 'message' => 'Staff not found'], 404);
    }

    $next = DB::table('staffcontent')
        ->where('area_position', '>', $staff->area_position)
        ->orderBy('area_position', 'asc')
        ->first();

    if ($next) {
        DB::table('staffcontent')->where('id', $staff->id)->update(['area_position' => $next->area_position]);
        DB::table('staffcontent')->where('id', $next->id)->update(['area_position' => $staff->area_position]);
    }

    return response()->json(['status' => 'success']);
}

public function makeHead($id, $port_dist)
{
    
    DB::table('area_master')
        ->where('id', $port_dist)
        ->update(['area_head' => $id]);

    return back()->with('status', 'Head Updated To This Area.');
}


public function managestaffcontent(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Our People Management'],
								['user_access_types.sub_menu','Our People Details']
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
        $vijay = ['me'=>Submenu::orderBy('id', 'desc')->get()];
        $swt = Submenu::select('cat_name')->groupBy('cat_name')->where('isDeleted','N')->get();
        $swtt = Submenu::where('isDeleted','N')->get();
        $stm = Staffmenu::where('isDeleted','N')->get();
        $stmm = DB::table('profile_master')->where('isDeleted','N')->get();
        $scontent = Staffcontent::where('isDeleted','N')->orderBy('created_at','desc')->get();
        return view('admin.managestaffcontent', $data, $vijay)->with('swt',$swt)->with('stmm',$stmm)->with('stm',$stm)->with('swtt',$swtt)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
public function PositionAreaWise(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Our People Management'],
								['user_access_types.sub_menu','Position Area Wise']
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
        $vijay = ['me'=>Submenu::orderBy('id', 'desc')->get()];
        $swt = Submenu::select('cat_name')->groupBy('cat_name')->where('isDeleted','N')->get();
        $swtt = Submenu::where('isDeleted','N')->get();
        $stm = Staffmenu::where('isDeleted','N')->get();
        $stmm = DB::table('profile_master')->where('isDeleted','N')->get();
        $scontent = Staffcontent::where('isDeleted','N')->orderBy('created_at','desc')->get();
        $sarea = DB::table('area_master')->where('isDeleted','N')->get();
        return view('admin.PositionAreaWise', $data, $vijay)->with('swt',$swt)->with('stmm',$stmm)->with('sarea',$sarea)->with('stm',$stm)->with('swtt',$swtt)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function SearchStaffReport(Request $request)
{
    $port_dist = $request->get('port_dist');

    if ($port_dist === 'All') {
        $firm_list = DB::table('staffcontent')
           // ->orderBy('position', 'asc')
            ->where('isDeleted', 'N')
            ->get();
    } else {
        $firm_list = DB::table('staffcontent')
            ->where('childmenu', $port_dist)
            ->where('isDeleted', 'N')
            ->orderBy('position', 'asc')
            ->get();
    }

    return response()->json($firm_list);
}
  public function SearchStaffReportArea(Request $request)
{
    $port_dist1 = $request->get('port_dist1');
    $port_dist = $request->get('port_dist');
    
    $checkId = DB::table('submenus')
    ->where('sub_name', 'like', '%' . $port_dist1 . '%')
    ->where('isDeleted', 'N')
    ->first();
   // dd($checkId->id);

        $firm_list = DB::table('staffcontent')
          ->select('staffcontent.*', 'area_master.area_head')
          ->join('area_master', function($join) {
              $join->on(DB::raw('FIND_IN_SET(area_master.id, staffcontent.area)'), '>', DB::raw('0'));
          })
          ->where('staffcontent.submenu', $checkId->id)
          ->whereRaw("FIND_IN_SET(?, staffcontent.area)", [$port_dist])
          ->where('staffcontent.isDeleted', 'N')
          ->orderBy('staffcontent.area_position', 'asc')
          ->get();



    return response()->json($firm_list);
}

  
  public function editstaffcontent($id){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Our People Management'],
								['user_access_types.sub_menu','Our People Details']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_update=='N')
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
        $vijay = ['me'=>Submenu::orderBy('id', 'desc')->get()];
        $swt = Menu::where('isDeleted','N')->get();
        $swtt = Submenu::where('isDeleted','N')->get();
        $swttt = Childmenu::where('isDeleted','N')->get();
        $stm = Staffmenu::where('isDeleted','N')->get();
        $stmm = DB::table('profile_master')->where('isDeleted','N')->get();
        $scontent = Staffcontent::where('isDeleted','N')->where('id',$id)->first();
        $area = Submenu::where('cat_name', 33)->where('isDeleted','N')->get();
        $StaffArea = DB::table('area_master')->where('isDeleted','N')->get();
        return view('admin.editstaffcontent', $data, $vijay)->with('swt',$swt)->with('stm',$stm)->with('StaffArea',$StaffArea)->with('area',$area)->with('stmm',$stmm)->with('swtt',$swtt)->with('swttt',$swttt)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  public function uploadprofilecontent(Request $request)
    {
        
        $data = ['LoggeduserInfo' => Admin::where('id', session('Loggeduser'))->first()];
        $ip = $request->ip();

        
        DB::table('action_logs')->insert([
            'ip_address' => $ip,
            'action_type' => 'Upload Staff Profile',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => session('Loggeduser'),
            'updated_by' => session('Loggeduser'),
            'user_id' => session('Loggeduser'),
            'user_name' => $data['LoggeduserInfo']->username
        ]);

        
        $validatedData = $request->validate([
            'lang' => 'required',
            'pf_type' => 'required',
            'content' => 'required',
            'staff_id' => 'required',
        ]);

        $existing = ProfileContent::where('lang', $request->lang)
            ->where('pro_cat', $request->pf_type)
            ->where('staff_id', $request->staff_id)
            ->where('isDeleted', 'N')
            ->first();

        if ($existing) {
           
            $existing->content = $request->content;
            $existing->updated_by = session('Loggeduser');
            $existing->updated_at = now();
            $existing->save();

            $message = 'Content has been updated successfully.';
        } else {
            
            $new = new ProfileContent();
            $new->lang = $request->lang;
            $new->content = $request->content;
            $new->staff_id = $request->staff_id;
            $new->pro_cat = $request->pf_type;
            $new->created_by = session('Loggeduser');
            $new->isDeleted = 'N';
            $new->save();

            $message = 'Content has been uploaded successfully.';
        }

        return redirect()->back()->with('status', $message);
    }
  public function delstaffcontent($id){
    
        $imagem = DB::table('staffcontent')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
  public function deactivestaffcontent($id){
    
        $imagem = DB::table('staffcontent')->where('id', $id)->update(array('status'=>'Inactive'));

        if($imagem){

        return back()->with('success','Data Deactivated Successfully.');
        }else{
            return back()->with('fail','Data Not Deactivated Successfully.');

        }
    }
  public function activestaffcontent($id){
    
        $imagem = DB::table('staffcontent')->where('id', $id)->update(array('status'=>'Active'));

        if($imagem){

        return back()->with('success','Data Activated Successfully.');
        }else{
            return back()->with('fail','Data Not Activated Successfully.');

        }
    }
}
