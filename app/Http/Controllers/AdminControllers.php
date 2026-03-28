<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Photo;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Submenu;
use App\Models\Sitecontent;
use App\Models\Childmenu;
use App\Models\Appointment;
use App\Models\Order_master;
use App\Models\Top_content;
use App\Models\News_master;
use App\Models\Tender_master;
use App\Models\DirectoryMaster;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CandidateImport;
use Carbon\Carbon;
use Str;


class AdminControllers extends Controller
{
    public function index(){
        $captcha = '';
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for ($i = 0; $i < 5; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }

    session(['captcha_text' => $captcha]); // store in session

    return view('admin.index', ['captcha' => $captcha]);
     //   return view('admin.index');
    }
  public function UserControlList($user_id)
	{
	   
		
		$flag=true;
		$user_menu=DB::table('user_access_types')->where([['user_access_types.status','1']])->get();
		$user_accesses=DB::table('user_accesses')->where([['user_type',$user_id]])->get();
		//dd($user_access);
		if($user_accesses)
		{
			foreach($user_menu as $menu)
			{
				$user_accesses1=DB::table('user_accesses')->where([['user_type',$user_id],['access_type',$menu->id]])->get();
				//$user_access1=$obj->data_select($sql);
				//print_r($user_access1);
				//print_r($user_access1);
				if(sizeof($user_accesses1)==0)
				{

					//$sql="INSERT INTO `user_access`(`user_type`, `access_type`) VALUES ('".$user_id."','".$menu['id']."')";
					//echo "user_access1";
					DB::table('user_accesses')->insert(
						['user_type' => $user_id, 'access_type' => $menu->id]
					);
					//$obj->data_insert($sql);
				}
			}
		}
		else
		{
			foreach($user_menu as $menu)
			{

				//$sql="INSERT INTO `user_access`(`user_type`, `access_type`) VALUES ('".$user_id."','".$menu['id']."')";
				DB::table('user_accesses')->insert(
						['user_type' => $user_id, 'access_type' => $menu->id]
					);
			}
		}
		$menu=DB::table('user_access_types')
			->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
			->where([
                ['user_access_types.status','1'],
				['user_accesses.user_type',$user_id]
			])->get();
		echo json_encode($menu);
	  
	}

	public function changeUserControl(Request $request)
	{
		$id=$request->get('id');
		$status=$request->get('status');
		$type=$request->get('type');
		if($type=='add')
		{
			DB::table('user_accesses')
				->where('id', $id)
				->update(array('fn_add'=>$status));
		}
		else if($type=='view')
		{
			DB::table('user_accesses')
				->where('id', $id)
				->update(array('fn_view'=>$status));
		}
		else if($type=='delete')
		{
			DB::table('user_accesses')
				->where('id', $id)
				->update(array('fn_delete'=>$status));
		}
		else if($type=='edit')
		{
			DB::table('user_accesses')
				->where('id', $id)
				->update(array('fn_update'=>$status));
		}
		else if($type=='excel')
		{
			DB::table('user_accesses')
				->where('id', $id)
				->update(array('fn_excel'=>$status));
		}
	}
   public function handle(Request $request)
    {
        $plantNo = $request->get('plant_no');
        $record = DB::table('plantredirect')->where('old_plant', $plantNo)->first();
       // dd($plantNo, $record);
        if ($record) {
            return redirect($record->target, 301);
        }

        abort(404);
    }
    public function ActionLog()
	{
		$CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Action Log'],
								['user_access_types.sub_menu','']
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
            return redirect('/dashboard');
        }
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
		$scontent=DB::table('action_logs')->orderby('id','DESC')->paginate(50);
		
		//dd($tabledata);
			return view('admin.list_action_logs', $data)
										->with('scontent',$scontent)
										->with('menu',$menuData)
										->with('user_access',$user_accesses);

	}
  public function HeritageAudioAdd(Request $request)
{
    // Validate inputs
    $request->validate([
        'audio_code'   => 'nullable|string|max:255',
        'file_name' => 'nullable|file|mimes:mp3,wav,ogg',
        'file_name2' => 'nullable|file|mimes:mp3,wav,ogg',
    ]);

    $file_en_name = null;
    $file_hi_name = null;

    // -------- English Audio Upload --------
    if ($request->hasFile('file_name')) {
        $file = $request->file('file_name');
        $file_en_name = time() . '_en.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/HeritageAudioFiles'), $file_en_name);
    }

    // -------- Hindi Audio Upload --------
    if ($request->hasFile('file_name2')) {
        $file = $request->file('file_name2');
        $file_hi_name = time() . '_hi.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/HeritageAudioFiles'), $file_hi_name);
    }

    // -------- Insert Data Using DB::table --------
    DB::table('heritage_audio')->insert([
        'sr_no'    => $request->audio_code,
        'file_en'  => $file_en_name,
        'file_hi'  => $file_hi_name,
        'isDeleted'=> 'N'
    ]);

    return back()->with('success', 'Audio inserted successfully!');
}
  public function AddUser()
	{
		$CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Add User']
							])->get();
		//dd($user_accesses);
		if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
		$tabledata=DB::table('admins')->where([['cDeleted','N']])->paginate(50);
		
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
		
			return view('admin.adduser', $data)->with('menu',$menuData)->with('tabledata',$tabledata)
									->with('user_access',$user_accesses);
	}
	public function SaveAddUser(Request $request)
	{
		$CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Add User']
							])->get();
		//dd($user_accesses);
		if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $request->validate([
            'full_name' => 'required|max:50',
            //'project' => 'requiredIf:user_type,Discom',
            'mobile' => 'required|digits:10',
            'email' => 'required|email|max:100',
            'address' => 'required|max:150',
            
            'username' => 'required|max:50|unique:admins,username',
        ]);
		$password1 = Str::random(8);
        $password = sha1($password1);
		//$prj = implode(',',$request->get('project'));
		$data=array(
            //'discom' =>$prj,
            'name' =>$request->get('full_name'),
            'contact' => $request->get('mobile'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            //'city' => $request->get('district'),
           // 'division' => $request->get('division'),
            'state' => "Uttar Pradesh",
            'username' => $request->get('username'),
            'password' => $password,
            'user_type' => $request->get('user_type'),
            'status' => $request->get('status'),
            'token_number' => hash('sha256', $password),
            
        );
		$inserted_id=DB::table('admins')->insertGetId($data);
		
		session()->put('message','User '.$request->get('username').' Created successfully with password '.$password1);
      
		return redirect('admin-panel/Add-User')->with('status','User '.$request->get('username').' Created successfully with password '.$password1);
	}
  public function ControlView()
	{
		$CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','User Control']
							])->get();
		//dd($user_accesses);
		if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_view=='N' || $user_accesses[0]->fn_add=='N')
            {
                session()->put('message','Access denied');
                return redirect('/dashboard');
            }
        }
        else
        {
            session()->put('message','Access denied');
            return redirect('/dashboard');
        }
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
		$userslist=DB::table('admins')->get();
		//dd($userslist);
		
		return view('admin.user_control', $data)
								->with('userslist',$userslist)
								->with('menu',$menuData)
								->with('user_access',$user_accesses);
	}
    public function CheckUser()
	{
		$session_id = Session::getId();
		if(session()->has('session_start'))
		{
			$user=DB::table('admins')->where('id',session()->get('Loggeduser'))->first();
			if($user->session_id!=$session_id)
			{
				app('App\Http\Controllers\AdminControllers')->logout();
				return redirect('/admin-panel');
			}
		}
		else
		{
			return redirect('/admin-panel');
		}
	}
    public function MenuList()
	{

		$menuData=array();
		$menu=DB::table('user_access_types')
			->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
			->where([
				['user_access_types.status','1'],
				['user_accesses.fn_view','Y'],
				['user_accesses.user_type',session()->get('Loggeduser')]
			])
			->groupby('user_access_types.menu_name')
			->orderby('user_access_types.priority','ASC')
			->get();
		$i=0;
		//dd($menu);
		foreach($menu as $value)
		{
			if($value->menu_type=='Main')
			{
				$menuData[$i]['menu_type']=$value->menu_type;
				$menuData[$i]['menu_name']=$value->menu_name;
				$menuData[$i]['target']=$value->target;
				$menuData[$i]['icon']=$value->icon;
				$menuData[$i]['url']=$value->url_name;
			}
			else
			{
				$temp=DB::table('user_access_types')
						->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
						->where([
                            ['user_access_types.status','1'],
							['user_access_types.menu_name',$value->menu_name],
							['user_accesses.fn_view','Y'],
							['user_accesses.user_type',session()->get('Loggeduser')]
						])
						->orderby('user_access_types.priority','ASC')
						->get();
				$menuData[$i]['menu_type']=$value->menu_type;
				$menuData[$i]['menu_name']=$value->menu_name;
				$menuData[$i]['target']=$value->target;
				$menuData[$i]['icon']=$value->icon;
				$menuData[$i]['url']=$value->url_name;
				$menuData[$i]['sub_menu']=$temp;
			}
			$i++;
		}
		return $menuData;
	}

    public function check(Request $request){
    
    $request->validate([
        'username' => 'required',
        'password' => 'required|min:5|max:12',
        'captcha_input' => 'required',

    ]);
    $password = sha1($request->password);
     $userCaptcha = $request->input('captcha_input');
    $sessionCaptcha = session('captcha_text');

    if (strcasecmp($userCaptcha, $sessionCaptcha) === 0) { // case-insensitive
        $userInfo = DB::table('admins')->where('username','=',$request->username)->first();

        if(!$userInfo){
            return redirect()->back()->with('status','we do not recognise your username !');
        }
        else{
            DB::table('room_master')->where('status', 'Active')
                ->whereNotNull('from_date')
                ->whereDate('from_date', '>=', now())
                ->update([
                    'status' => 'Blocked',
                 //   'deactive_till' => null,
                ]);
            DB::table('room_master')->where('status', 'Blocked')
                ->whereNotNull('deactive_till')
                ->whereDate('deactive_till', '<', now())
                ->update([
                    'status' => 'Active',
                    'deactive_till' => null,
                ]);
            if($password == $userInfo->password){
               // Auth::logoutOtherDevices($userInfo->id);
                session()->put('Loggeduser', $userInfo->id);
                session()->put('token', $userInfo->token);
                session()->put('session_start', 'Yes');
                $session_id = Session::getId();
                session()->put('ss_id', $session_id);
                //dd($session_id);
                DB::table('admins')
					->where('id',$userInfo->id)
					->update(array('session_id'=>$session_id,'last_login'=>date('Y-m-d H:i:s')));
                return redirect('admin-panel/dashboard');
            }else{
                return redirect()->back()->with('status','Incorrect Password !');
            }
        }
    } else {
        return back()->withErrors(['captcha_input' => 'Incorrect captcha, please try again.']);
    }
     // dd($password);
    
    }
  
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function admindash(){
      
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Dashboard'],
								['user_access_types.sub_menu','']
							])->get();
		//dd($user_accesses);
        if(session()->get('Loggeduser') == 9 || session()->get('Loggeduser') == 10){
        $now = Carbon::now()->format('Y-m-d H:i:s');

        // Step 1: Fully booked rooms (booking_type = 1)
        $fullyBookedRoomIds = DB::table('bookings as bk')
            ->join('bed_master as b', DB::raw("FIND_IN_SET(b.id, bk.bed_id)"), '>', DB::raw('0'))
            ->join('room_master as r', 'bk.room_no', '=', 'r.id')
            ->join('guestroom_master as gr', 'gr.id', '=', 'r.room_name')
            ->where('bk.isDeleted', 'N')
            ->where('bk.booking_type', 1)
            ->where('bk.status', 1)
            ->where('bk.booking_from', '<', $now)
            ->where('bk.booking_to', '>', $now)
            ->pluck('r.id')
            ->toArray();

        // Step 2: Collect booked bed IDs (booking_type = 2)
        $bedWiseBookedIds = DB::table('bookings as bk')
            ->where('bk.isDeleted', 'N')
            ->where('bk.booking_type', 2)
            ->where('bk.booking_from', '<', $now)
            ->where('bk.booking_to', '>', $now)
            ->where('bk.status', 1)
            ->pluck('bk.bed_id')
            ->flatMap(function ($bedIds) {
                return collect(explode(',', $bedIds))->map(fn($id) => trim($id));
            })
            ->unique()
            ->toArray();

        // Step 3: Get all rooms and beds
        $rooms = DB::table('room_master as r')
            ->leftJoin('bed_master as b', 'b.room_id', '=', 'r.id')
            ->join('guestroom_master as gr', 'gr.id', '=', 'r.room_name')
            ->where('r.isDeleted', 'N')
            ->where('r.status', 'Active')
            ->select(
                'r.id as room_id',
                'r.room_no',
                'gr.name as room_cat',
                'b.id as bed_id',
                'b.bed as bed_name'
            )
            ->orderBy('r.room_no')
            ->get()
            ->groupBy('room_id');

        // Step 4: Format final availability chart
        $roomAvailability = [];

        foreach ($rooms as $roomId => $beds) {
            $room = $beds->first();

            $roomData = [
                'room_id' => $roomId,
                'room_no' => $room->room_no,
                'room_cat' => $room->room_cat,
                'beds' => [],
            ];

            foreach ($beds as $bed) {
                $status = 'available';

                if (in_array($roomId, $fullyBookedRoomIds)) {
                    $status = 'occupied';
                } elseif (in_array($bed->bed_id, $bedWiseBookedIds)) {
                    $status = 'occupied';
                }

                $roomData['beds'][] = [
                    'bed_id' => $bed->bed_id,
                    'bed_name' => $bed->bed_name,
                    'status' => $status,
                ];
            }

            // Room level status
            $occupied = collect($roomData['beds'])->where('status', 'occupied')->count();
            $total = count($roomData['beds']);
            $roomData['room_status'] = $occupied === $total ? 'fully occupied' : ($occupied > 0 ? 'partially occupied' : 'available');

            $roomAvailability[] = $roomData;
        }

       // return response()->json($roomAvailability);
        $menuData=app('App\Http\Controllers\AdminControllers')->MenuList();

        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
        $img = DB::table('alert_image')->where('id', 1)->first();
        return view('admin.dashboard', $data)->with('img',$img)->with('roomAvailability',$roomAvailability)->with('menu',$menuData)->with('user_access',$user_accesses);
        }else{
          
        $menuData=app('App\Http\Controllers\AdminControllers')->MenuList();

        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
        $img = DB::table('alert_image')->where('id', 1)->first();
        return view('admin.dashboard', $data)->with('img',$img)->with('menu',$menuData)->with('user_access',$user_accesses);
          
        }
		
    }
    public function logout(){
        if(session()->has('Loggeduser')){
            session()->pull('Loggeduser');
            return redirect('admin-panel');
        }
    }
    public function slider(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Slider']
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
        $ruchi = Slider::where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.slider', $data)->with('ruchi',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function footerslider(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Footer Slider']
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
        $ruchi = DB::table('footerslider')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.footerslider', $data)->with('ruchi',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function pagebanner(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Page Banner']
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
        $ruchi = DB::table('pagebanner')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.pagebanner', $data)->with('ruchi',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function StaffProfileMaster(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Staff Profile Master']
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
        $ruchi = DB::table('profile_master')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.profile_master', $data)->with('ruchi',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function ManageStaffArea(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Staff Area']
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
        $ruchi = DB::table('area_master')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.area_master', $data)->with('swrn',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function AddNewGardenCategory(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Plants Management'],
								['user_access_types.sub_menu','Add New Garden Category']
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
        $ruchi = DB::table('plantcat_master')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.plantcat_master', $data)->with('swrn',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
   public function AddGardenAudioCategory(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Audio Management'],
								['user_access_types.sub_menu','Add Garden Audio Category']
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
        $ruchi = DB::table('audiocat_master')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.audiocat_master', $data)->with('swrn',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function SaveAddNewGardenAudio(Request $request)
{
    
    $request->validate([
        'cat'        => 'required|exists:audiocat_master,id',
        'audio_code' => 'required',
        'file_en'  => 'nullable|mimes:mp3,wav,ogg|max:10240', // 10MB limit
        'file_hi' => 'nullable|mimes:mp3,wav,ogg|max:10240',
    ]);

    try {
       
        $audi = DB::table('audiocat_master')->where('id', $request->cat)->first();
        if (!$audi) {
            return back()->with('fail', 'Invalid audio category.');
        }

        $file1 = null;
        $file2 = null;

        if ($request->hasFile('file_en')) {
            $file1 = time() . '_1_' . $request->file('file_en')->getClientOriginalName();
            $request->file('file_en')->move(public_path('uploads/audio_en'), $file1); 
        }

        if ($request->hasFile('file_hi')) {
            $file2 = time() . '_2_' . $request->file('file_hi')->getClientOriginalName();
            $request->file('file_hi')->move(public_path('uploads/audio_hi'), $file2); 
        }


        // ✅ Insert into DB
        DB::table('all_garden_audio')->insert([
            'audio_cat'   => $request->cat,
            'sr_no'       => $request->audio_code,
            'file_en'   => $file1,
            'file_hi'  => $file2,
            'audio_lang'  => $audi->audio_lang, // from audiocat_master
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return back()->with('status', 'Audio uploaded successfully!');
    } catch (\Exception $e) {
        return back()->with('fail', 'Error: ' . $e->getMessage());
    }
}
public function update_newaudio(Request $request)
{
    
    $request->validate([
       // 'cat'        => 'required|exists:audiocat_master,id',
        'audio_code' => 'required',
       // 'file_en'  => 'nullable|mimes:mp3,wav,ogg|max:10240', // 10MB limit
       // 'file_hi' => 'nullable|mimes:mp3,wav,ogg|max:10240',
    ]);

    try {
       
        $audi = DB::table('all_garden_audio')->where('id', $request->audio_id)->first();
        if (!$audi) {
            return back()->with('fail', 'Invalid audio.');
        }else{
        
        $file1 = $audi->file_en;
        $file2 = $audi->file_hi;
        }


        if ($request->hasFile('file_en')) {
            $file1 = time() . '_1_' . $request->file('file_en')->getClientOriginalName();
            $request->file('file_en')->move(public_path('uploads/audio_en'), $file1); 
        }

        if ($request->hasFile('file_hi')) {
            $file2 = time() . '_2_' . $request->file('file_hi')->getClientOriginalName();
            $request->file('file_hi')->move(public_path('uploads/audio_hi'), $file2); 
        }


        // ✅ Insert into DB
        DB::table('all_garden_audio')->where('id', $request->audio_id)->update([
           // 'audio_cat'   => $request->cat,
           // 'sr_no'       => $request->audio_code,
            'file_en'   => $file1,
            'file_hi'  => $file2,
          //  'audio_lang'  => $audi->audio_lang, // from audiocat_master
          //  'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return back()->with('status', 'Audio updated successfully!');
    } catch (\Exception $e) {
        return back()->with('fail', 'Error: ' . $e->getMessage());
    }
}
  public function getPlantCode(Request $request)
{
    $catId = $request->cat_id;

    $plants = DB::table('new_plants_list')->where('plant_cat', $catId)->orderBy('id', 'desc')->first();
    if($plants){
      $plant_code = $plants->sr_no + 1;
    }else{
      $plant_code = 1001;
    }

    echo $plant_code;
}
 public function getAudioCode(Request $request)
{
    $catId = $request->cat_id;

    $audi = DB::table('audiocat_master')->where('id', $catId)->first();

    $plants = DB::table('all_garden_audio')
                ->where('audio_cat', $catId)
                ->orderBy('id', 'desc')
                ->first();

    if ($plants) {
        $plant_code = $plants->sr_no + 1;
    } else {
        $plant_code = 1;
    }

    return response()->json([
        'audio_lang'  => $audi->audio_lang ?? '',
        'plant_code'  => $plant_code,
    ]);
}


   public function GuestRoomMaster(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Guest Room Master']
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
        $ruchi = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.guestroom_master', $data)->with('ruchi',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function AddGuestRoom(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Add Guest Room']
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
        $ruchi = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id', 'desc')->get();
        $rooms = DB::table('room_master')->where('isDeleted','N')->orderBy('room_no')->get();
        $bed = DB::table('bed_master')->orderBy('bed')->get();

        return view('admin.add_guestroom', $data)->with('ruchi',$ruchi)->with('rooms',$rooms)->with('bed', $bed)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    
     public function addpdf(){
       
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Site Content'],
								['user_access_types.sub_menu','Upload PDF']
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
        //$ruchi = Slider::where('isDeleted','N')->orderBy('id', 'desc')->get();
        $pdf_file = DB::table('pdf_file')->where('isDeleted','N')->orderBy('id', 'desc')->get();
        return view('admin.addpdf', $data)->with('pdf_file',$pdf_file)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function AnnualProcurementPlan(){
       
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Tenders'],
								['user_access_types.sub_menu','Annual Procurement Plan']
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
        //$ruchi = Slider::where('isDeleted','N')->orderBy('id', 'desc')->get();
        $pdf_file = DB::table('annfile')->where('isDeleted','N')->orderBy('id', 'desc')->get();
        return view('admin.AnnualProcurementPlan', $data)->with('pdf_file',$pdf_file)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function officers(){
       $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Officers Photo']
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
        $ruchi = Appointment::where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.officers', $data)->with('ruchi',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
   public function quicklinks(){
       $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Quick Links']
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
        $ruchi = DB::table('quicklinks')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.quicklinks', $data)->with('ruchi',$ruchi)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function gallery(){
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Gallery'],
								['user_access_types.sub_menu','Manage Gallery']
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
      
        $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
        $photos = DB::table('photos')->orderBy('id', 'desc')->get();
        $category = DB::table('image_category')->where('isDeleted', 'N')->orderBy('id', 'desc')->get();
        return view('admin.gallery', $data)->with('photos', $photos)->with('category', $category)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    
    public function videos(){
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Gallery'],
								['user_access_types.sub_menu','Video Gallery']
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
        $vijay = ['me'=>DB::table('videos')->where('isDeleted','N')->orderBy('id', 'desc')->get()];

        return view('admin.video', $data, $vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function addcontent(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Site Content'],
								['user_access_types.sub_menu','Add Site Content']
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
        $swt = Menu::where('isDeleted','N')->get();
        $swtt = Submenu::where('isDeleted','N')->get();
        return view('admin.addcontent', $data, $vijay)->with('swt',$swt)->with('swtt',$swtt)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function managesitecontent(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Site Content'],
								['user_access_types.sub_menu','List Site Content']
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
        $scontent = Sitecontent::where('isDeleted','N')->where('con_type','Text')->orderBy('created_at','desc')->get();
        $scontents = Sitecontent::where('isDeleted','N')->where('con_type','Pdf')->orderBy('created_at','desc')->get();
        return view('admin.managecontent', $data, $vijay)->with('swt',$swt)->with('swtt',$swtt)->with('scontents',$scontents)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function editsitecontent($id){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Site Content'],
								['user_access_types.sub_menu','List Site Content']
							])->get();
		// dd($user_accesses);
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
        // dd($data);
        $vijay = ['me'=>Submenu::orderBy('id', 'desc')->get()];
        $swt = Menu::where('isDeleted','N')->get();
        $swtt = Submenu::where('isDeleted','N')->get();
        $chld = Childmenu::where('isDeleted','N')->get();
        $scontent = Sitecontent::where('isDeleted','N')->where('id',$id)->first();
        //dd(session()->get('Loggeduser'));
        return view('admin.editscontent', $data, $vijay)->with('swt',$swt)->with('swtt',$swtt)->with('chld',$chld)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function createnewpage(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','New Page Management'],
								['user_access_types.sub_menu','Create New Page']
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
        $swt = Menu::where('isDeleted','N')->get();
        $swtt = Submenu::where('isDeleted','N')->get();
        return view('admin.createnewpage', $data, $vijay)->with('swt',$swt)->with('swtt',$swtt)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function allpages(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','New Page Management'],
								['user_access_types.sub_menu','Manage Page']
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
        
        
        $scontent = DB::table('pagecontents')->where('isDeleted','N')->orderBy('created_at','desc')->get();
    
        return view('admin.managenewpage', $data)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function editnewpage($id){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','New Page Management'],
								['user_access_types.sub_menu','Manage Page']
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
       
        $scontent = DB::table('pagecontents')->where('isDeleted','N')->where('id',$id)->first();
    
        return view('admin.editnewpage', $data)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function pageelement(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Page Element']
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
        
        
        $scontent = DB::table('maincontent')->get();
    
        return view('admin.managepageelement', $data)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function editpageelement($id){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','New Page Management'],
								['user_access_types.sub_menu','Manage Page']
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
       
        $scontent = DB::table('maincontent')->where('id',$id)->first();
    
        return view('admin.editpageelement', $data)->with('scontent',$scontent)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
   public function delnewpage($id){
        $imagem = DB::table('pagecontents')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Page Deleted Successfully.');
        }else{
            return back()->with('fail','Page Not Deleted Successfully.');

        }
    }
    public function contact(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Check Feedback'],
								['user_access_types.sub_menu','']
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
        //$vijay = Contact::orderBy('id', 'desc')->get();
		$vijay = DB::table('feedbacks')->orderBy('id', 'desc')->get();
      
        return view('admin.contact', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function teachers(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Manage Officers Photo']
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
        $vijay = Teacher::where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.teachers', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function submenu(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Menus'],
								['user_access_types.sub_menu','Add Submenu']
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
        $vijay = Submenu::select('submenus.*','menus.menu_name')
        ->join('menus','menus.id','=','submenus.cat_name')
        ->where('submenus.isDeleted','N')->orderBy('submenus.id', 'desc')->get();
        $minu = Menu::where('isDeleted','N')->orderBy('id')->get();

        return view('admin.addsubmenu', $data)->with('ruchi',$vijay)->with('minu',$minu)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function getSubmenu($cat){

        $data = Submenu::where('cat_name',$cat)->where('isDeleted','N')->pluck('sub_name');
        return response()->json($data);
    }
    public function addchildmenu(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Menus'],
								['user_access_types.sub_menu','Add Childmenu']
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
        $vijay = Childmenu::where('isDeleted','N')->orderBy('id')->get();
        $minu = Menu::where('isDeleted','N')->orderBy('id')->get();

        return view('admin.addchildmenu', $data)->with('minu',$minu)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function addmenu(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Menus'],
								['user_access_types.sub_menu','Add Menu']
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
        $vijay = Menu::where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.addmenu', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function addguestcategory(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Guest Category']
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
        $vijay = DB::table('guest_category')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.addguestcategory', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function AddAdvertisement(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Recruitment Management'],
								['user_access_types.sub_menu','Add Advertisement']
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
        $vijay = DB::table('advertisement')->select('advertisement.*','recruit_type.name')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('advertisement.isDeleted','N')->orderBy('advertisement.id', 'desc')->get();
        $minu = DB::table('recruit_type')->orderBy('id')->get();

        return view('admin.add_advertisement', $data)->with('ruchi',$vijay)->with('minu',$minu)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function ManageAdvertisement(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Recruitment Management'],
								['user_access_types.sub_menu','Add Advertisement']
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
        $vijay = DB::table('advertisement')->select('advertisement.*','recruit_type.name')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('advertisement.isDeleted','N')->where('advertisement.archived','N')->orderBy('advertisement.id', 'desc')->get();
       $title = 'Manage Current Advertisement';
        

        return view('admin.ManageAdvertisement', $data)->with('swrn',$vijay)->with('title',$title)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function ManageAdvertisementArchive(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Recruitment Management'],
								['user_access_types.sub_menu','Add Advertisement']
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
        $vijay = DB::table('advertisement')->select('advertisement.*','recruit_type.name')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('advertisement.isDeleted','N')->where('advertisement.archived','Y')->orderBy('advertisement.id', 'desc')->get();
       $title = 'Manage Archived Advertisement';
        

        return view('admin.ManageAdvertisement', $data)->with('swrn',$vijay)->with('title',$title)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function ManageAdvertisementDetail(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Recruitment Management'],
								['user_access_types.sub_menu','Add Advertisement']
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
        $vijay = DB::table('recruitment')->select('recruitment.*','advertisement.ad_no','recruit_type.name')
        ->join('advertisement','advertisement.id','=','recruitment.advt_no')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('recruitment.isDeleted','N')->orderBy('recruitment.id', 'desc')->get();
        

        return view('admin.ManageAdvertisementDetail', $data)->with('swrn',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
   public function PositionRecruitment(){
        
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Recruitment Management'],
								['user_access_types.sub_menu','Add Advertisement']
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
        $vijay = DB::table('recruitment')->select('recruitment.*','advertisement.ad_no','recruit_type.name')
        ->join('advertisement','advertisement.id','=','recruitment.advt_no')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('recruitment.isDeleted','N')->orderBy('recruitment.id', 'desc')->get();
       $rec_type = DB::table('recruit_type')->get();
        
       // dd($vijay);
        return view('admin.PositionRecruitment', $data)->with('rec_type',$rec_type)->with('swrn',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
public function getAdvertisement($id)
{
    $data = DB::table('advertisement')->where('recruit_type', $id)->get();
   
    return response()->json($data);
}
public function getRecruitments(Request $request)
{
    $data = DB::table('recruitment')->select('recruitment.*','advertisement.ad_no','recruit_type.name as rname')
        ->join('advertisement','advertisement.id','=','recruitment.advt_no')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('recruitment.rec_type', $request->stafftype)
        ->where('recruitment.advt_no', $request->contype)
        ->where('recruitment.isDeleted', 'N')
        ->orderByRaw("CASE WHEN recruitment.position IS NULL THEN 999999 ELSE recruitment.position END ASC")
        ->get();

    // If positions are NULL, assign positions automatically
    $updated = false;
    $pos = 1;

    foreach ($data as $item) {
        if (is_null($item->position)) {
            DB::table('recruitment')
                ->where('id', $item->id)
                ->update(['position' => $pos]);

            $updated = true;
        }
        $pos++;
    }

    // Re-fetch sorted updated data
    if ($updated) {
        $data = DB::table('recruitment')->select('recruitment.*','advertisement.ad_no','recruit_type.name as rname')
            ->join('advertisement','advertisement.id','=','recruitment.advt_no')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
            ->where('recruitment.rec_type', $request->stafftype)
            ->where('recruitment.advt_no', $request->contype)
            ->orderBy('recruitment.position')
            ->get();
    }

    return response()->json($data);
}

public function updatePosition(Request $request)
{
    foreach ($request->order as $item) {
        DB::table('recruitment')->where('id', $item['id'])
            ->update(['position' => $item['position']]);
    }

    return response()->json(['status' => 'success']);
}



 public function PositionRecruitmentReport(Request $request)
{
    $port_dist1 = $request->get('port_dist1');
    $port_dist = $request->get('port_dist');
    
    $checkId = DB::table('submenus')
    ->where('sub_name', 'like', '%' . $port_dist1 . '%')
    ->where('isDeleted', 'N')
    ->first();
   // dd($checkId->id);

        $firm_list = DB::table('recruitment')->select('recruitment.*','advertisement.ad_no','recruit_type.name')
        ->join('advertisement','advertisement.id','=','recruitment.advt_no')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('recruitment.advt_no', $port_dist)->where('recruitment.rec_type', $port_dist1)
        ->where('recruitment.isDeleted','N')->orderBy('recruitment.id', 'desc')->get();;



    return response()->json($firm_list);
}

   public function ViewAdvtDetail($id){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Recruitment Management'],
								['user_access_types.sub_menu','Add Advertisement']
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
        $vijay = DB::table('recruitment')->select('recruitment.*','advertisement.ad_no','recruit_type.name')
        ->join('advertisement','advertisement.id','=','recruitment.advt_no')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('recruitment.isDeleted','N')->where('recruitment.advt_no', $id)->orderBy('recruitment.id', 'desc')->get();
        

        return view('admin.ManageAdvertisementDetail', $data)->with('swrn',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function AddAdvertisementDetails(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Recruitment Management'],
								['user_access_types.sub_menu','Add Advertisement Details']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $vijay = DB::table('advertisement')->select('advertisement.*','recruit_type.name')
        ->join('recruit_type','recruit_type.id','=','advertisement.recruit_type')
        ->where('advertisement.isDeleted','N')->orderBy('advertisement.id', 'desc')->get();
        $minu = DB::table('recruit_type')->orderBy('id')->get();

        return view('admin.addAdvertDetail', $data)->with('ruchi',$vijay)->with('minu',$minu)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function fetchRectype(Request $request)
    {
        $advertisements = DB::table('advertisement')
            ->where('recruit_type', $request->get('rec_id'))
            ->where('isDeleted', 'N')
            ->orderBy('id', 'desc')
            ->get(['id', 'ad_no']); // Select only needed columns for efficiency

        return response()->json([
            'advt_no' => $advertisements
        ]);
    }

  public function OrganizationMaster(){
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','Organization Master']
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
        $vijay = DB::table('organizations')->where('isDeleted','N')->orderBy('id', 'desc')->get();

        return view('admin.OrganizationMaster', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function delgallery($id){
        $imagem = Photo::where('id', $id)->first();
        $res = Photo::where('id', $id)->delete();
        if($res){
        unlink("uploads/".$imagem->image);
        return back()->with('success','Picture Deleted Successfully.');
        }else{
            return back()->with('fail','Picture Not Deleted Successfully.');

        }
    }
public function audiodelete($id){
        $imagem = Photo::where('id', $id)->first();
        $res = DB::table('heritage_audio')->where('id', $id)->delete();
        if($res){
        
        return back()->with('success','Audio Deleted Successfully.');
        }else{
            return back()->with('fail','Audio Not Deleted Successfully.');

        }
    }
    public function delslider($id){
        $imagem = Slider::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Picture Deleted Successfully.');
        }else{
            return back()->with('fail','Picture Not Deleted Successfully.');

        }
    }
  public function delfooterslider($id){
        $imagem = DB::table('footerslider')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Picture Deleted Successfully.');
        }else{
            return back()->with('fail','Picture Not Deleted Successfully.');

        }
    }
   public function newsdelete($id){
    $del = DB::table('news_master')->where('id', $id)->update(array('status'=>'0'));
    if($del){
    return back()->with('status','Content De-Activated Successfully.');
    }else{
    return back()->with('status', 'Content not De-Activated.');
    }
    }
public function newsback($id){
    $del = DB::table('news_master')->where('id', $id)->update(array('status'=>'1'));
    if($del){
    return back()->with('status','Content Activated Successfully.');
    }else{
    return back()->with('status', 'Content not Activated.');
    }
    }
    public function delofficers($id){
        $imagem = Appointment::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Content Deleted Successfully.');
        }else{
            return back()->with('fail','Content Not Deleted Successfully.');

        }
    }
  public function quicklinksdel($id){
        $imagem = DB::table('quicklinks')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Content Deleted Successfully.');
        }else{
            return back()->with('fail','Content Not Deleted Successfully.');

        }
    }
  public function delsitecontent($id){
        $imagem = Sitecontent::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Content Deleted Successfully.');
        }else{
            return back()->with('fail','Content Not Deleted Successfully.');

        }
    }
    public function delchildmenu($id){
        $imagem = Childmenu::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Content Deleted Successfully.');
        }else{
            return back()->with('fail','Content Not Deleted Successfully.');

        }
    }
    public function delappoint($id){
        //$imagem = Contact::where('id', $id)->delete();
      	  $imagem = DB::table('feedbacks')->where('id', $id)->delete();
        if($imagem){

        return back()->with('success','Message Deleted Successfully.');
        }else{
            return back()->with('fail','Message Not Deleted Successfully.');

        }
    }
    public function delteacher($id){
        $imagem = Teacher::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
  public function delsubmenu($id){
        $imagem = Submenu::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
    public function delmenu($id){
        $imagem = Menu::where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
    public function delvideo($id){
        $imagem = DB::table('videos')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
  public function delprofilemaster($id){
        $imagem = DB::table('profile_master')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
   public function delareamaster($id){
        $imagem = DB::table('area_master')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
  public function delNewGardenCategory($id){
    
        $check = DB::table('new_plants_list')->where('plant_cat', $id)->where('isDeleted','N')->first();
        if($check){
          return back()->with('status','This Garden Category Already Have Plant Details, Delete All Plant Details Under This Category Then Only You Can Delete This Category.');
        }
        $imagem = DB::table('plantcat_master')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
   public function advtdetaildel($id){
        $imagem = DB::table('recruitment')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
   public function delrecruitlisting($id){
        $imagem = DB::table('listing_master_recruit')->where('id', $id)->delete();

        if($imagem){

        return back()->with('status','Data Deleted Successfully.');
        }else{
            return back()->with('status','Data Not Deleted Successfully.');

        }
    }
   public function deltenderlisting($id){
        $imagem = DB::table('listing_master')->where('id', $id)->delete();

        if($imagem){

        return back()->with('status','Data Deleted Successfully.');
        }else{
            return back()->with('status','Data Not Deleted Successfully.');

        }
    }
   public function Advtdel($id){
        $imagem = DB::table('advertisement')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('status','Data Deleted Successfully.');
        }else{
            return back()->with('status','Data Not Deleted Successfully.');

        }
    }
  public function delGuestRoomMaster($id){
        $imagem = DB::table('guestroom_master')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
  
  public function delguestcategory($id){
        $imagem = DB::table('guest_category')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
  public function delOrganizationMaster($id){
        $imagem = DB::table('organizations')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
   public function delAnnualPro($id){
        $imagem = DB::table('annfile')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
  
  public function read_language($id)
    {
        $category = DB::table('directory_category_master')
            ->where('language', $id)
            ->get();
            return response()->json($category);
    }
  
  public function phone_directory()
    {
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
    	$category_master = DB::table('directory_category_master')->where('language', 'English')->get();
    	$category_hii = DB::table('directory_category_master')->where('language', 'Hindi')->get();
    	$directory = DB::table('directory_master')->orderBy('id', 'desc')->get();
        return view('admin.phone-directory', $data)->with('directory', $directory)->with('category_hii', $category_hii)->with('category_master', $category_master);
    }

  public function phone_directory_search($id)
    {
    	$category_id = DB::table('directory_category_master')->where('id', $id)->where('language', 'English')->first();
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
    	$category_master = DB::table('directory_category_master')->where('language', 'English')->get();
    	$category_hii = DB::table('directory_category_master')->where('language', 'Hindi')->get();
    	
    	$directory = DB::table('directory_master')->where('category', $id)->orderBy('id', 'asc')->get(); 
        return view('admin.phone-directory', $data)->with('category_id', $category_id)->with('directory', $directory)->with('category_hii', $category_hii)->with('category_master', $category_master);
    }
  
    public function office_orders()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Office Orders'],
								['user_access_types.sub_menu','']
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
        return view('admin.office_orders', $data)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function office_orders_list(){
       $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Office Orders'],
								['user_access_types.sub_menu','']
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
        $order = DB::table('order_master')->orderBy('id', 'desc')->get();
        return view('admin.office_orders_list', $data)->with('order',$order)->with('menu',$menuData)->with('user_access',$user_accesses);
    }

    public function addorders(Request $request) {
    // Validate incoming request data
    $validatedData = $request->validate([
        'order_no' => 'required',
        'subject' => 'required',
        'subject_hi' => 'required',
        'order_date' => 'required',
        'file' => 'required|mimes:pdf|max:8048'
    ]);

    // Get logged in user info
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
    $ip = $request->ip();

    // Insert action log
    DB::table('action_logs')->insert([
        'ip_address' => $ip,
        'action_type' => 'Update Sitecontent',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id' => session('Loggeduser'),
        'user_name' => $data['LoggeduserInfo']->username
    ]);

    // Check if file upload is valid
    if ($request->file('file')->isValid()) {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $imageName = 'office-order-' . time() . '.' . $extension;
        $file->move(public_path('uploads/office_order/'), $imageName);
    } else {
        return redirect()->back()->withInput()->withErrors(['file' => 'File upload failed']);
    }

    // Save orders
    if ($request->subject) {
        $order = new Order_master;
        $order->order_no = $request->order_no;
        $order->category = $request->category;
        $order->language = 'English';
        $order->status = 1;
        $order->subject = $request->subject;
        $order->order_date = $request->order_date;
        $order->file_name = $imageName; // Assuming $imageName is accessible here
        $order->save();
    }

    if ($request->subject_hi) {
        $order2 = new Order_master;
        $order2->order_no = $request->order_no;
        $order2->language = 'Hindi';
        $order2->category = $request->category;
        $order2->status = 1;
        $order2->subject = $request->subject_hi;
        $order2->order_date = $request->order_date;
        $order2->file_name = $imageName; // Assuming $imageName is accessible here
        $order2->save();
    }

    return redirect('admin-panel/office_orders')->with('status', 'Data Has been uploaded');
}


    public function order_edit($id)
    {
        $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Office Orders'],
								['user_access_types.sub_menu','']
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
        $order = DB::table('order_master')->where('id', $id)->first();
        return view('admin.order_edit', $data)->with('order', $order)->with('menu',$menuData)->with('user_access',$user_accesses);
    }

   public function ordersedit(Request $request)
{
    $validatedData = $request->validate([
        'order_no' => 'required',
        'subject' => 'required',
        'order_date' => 'required',
        'file' => 'nullable|mimes:pdf|max:2048', // Adjust maximum file size as needed
    ]);

    // Fetch logged-in user info
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
    $ip = $request->ip();

    // Insert action log
    DB::table('action_logs')->insert([
        'ip_address' => $ip,
        'action_type' => 'Update Office Orders',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id' => session('Loggeduser'),
        'user_name' => $data['LoggeduserInfo']->username
    ]);

    // Find the order by ID
    $order = Order_master::find($request->id);
    if (!$order) {
        return redirect()->back()->with('error', 'Order not found');
    }

    // Update order fields
    $order->order_no = $request->order_no;
    $order->category = $request->category; // Make sure 'category' is coming from your form
    $order->subject = $request->subject;
    $order->order_date = $request->order_date;

    // Handle file upload
    if ($request->file('file')) {
        $file = $request->file('file');

        // Validate file
        if ($file->isValid()) {
            $extension = $file->getClientOriginalExtension();
            $imageName = 'office-order-' . time() . '.' . $extension;
            $file->move(public_path('uploads/office_order/'), $imageName);
            $order->file_name = $imageName;
        } else {
            return redirect()->back()->withInput()->withErrors(['file' => 'File upload failed']);
        }
    }

    // Save the order
    $order->save();

    return redirect('admin-panel/office_orders_list')->with('status', 'Data has been updated');
}



    public function topcontent()
    {
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
        $content = DB::table('top_content')->where('isDeleted', 'N')->orderBy('id', 'desc')->get(); 
        return view('admin.topcontent', $data)->with('content', $content);
    }

    public function uploadtopcontent(Request $request){
        $validatedData = $request->validate([
            'con_type' => 'required',
            'position' => 'required',
            'heading' => 'required',
			'heading_hi' => 'required',
            'file' => 'nullable|mimes:pdf',
            'file_hi' => 'nullable|mimes:pdf',
        ]);
      
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Upload Top Content',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
      
        $order = New Top_content;
        $order->con_type = $request->con_type;
         $order->position = $request->position;
        $order->heading = $request->heading;
      	$order->text_color = $request->text_color;
      	$order->background_color = $request->background_color;
		$order->heading_hi = $request->heading_hi;
      	$order->effect = $request->effect;
        $order->link = $request->link;
        if ($request->file) {
            $image = $request->file;
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move(public_path('uploads/'), $imageName);
            $order->file = $imageName;
        }
		if ($request->file_hi) {
            $imagehi = $request->file_hi;
            $extensionhi = $imagehi->getClientOriginalExtension();
            $imageNamehi = time() . '.' . $extensionhi;
            $imagehi->move(public_path('uploads/'), $imageNamehi);
            $order->file_hi = $imageNamehi;
        }
        $order->save();
        return redirect('admin-panel/topcontent')->with('status', 'Data has been uploaded');
    }

    public function topcondel($id){
        $imagem = Top_content::where('id', $id)->update(array('isDeleted'=>'Y'));
        if($imagem){
        return back()->with('success','Content Deleted Successfully.');
        }else{
            return back()->with('fail','Content Not Deleted Successfully.');
        }
    }

 public function topcontentedit($id){
        $content = Top_content::where('id', $id)->where('isDeleted', 'N')->first();
        
        if($content){
            $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
            return view('admin.topcontentedit', $data)->with('content', $content);
        }else{
            return back()->with('fail','Content Not found !.');
        }
    }



  public function topcontenteditdata(Request $request) {
    $validatedData = $request->validate([
        'con_type' => 'required',
        'position' => 'required',
        'heading' => 'required',
        'heading_hi' => 'required',
        'file' => 'nullable|mimes:pdf',
        'file_hi' => 'nullable|mimes:pdf',
    ]);
    
    $data = ['LoggeduserInfo' => Admin::where('id', session('Loggeduser'))->first()];
   
    $ip = $request->ip();
    
    // Log the action of uploading top content
    DB::table('action_logs')->insert([
        'ip_address' => $ip,
        'action_type' => 'Upload Top Content',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id' => session('Loggeduser'),
        'user_name' => $data['LoggeduserInfo']->username
    ]);

    $order = Top_content::where('id', $request->id)->first();
    
    if (!$order) {
        return redirect()->back()->with('fail', 'Top content not found');
    }
    
    // Update the record with the new data
    $order->con_type = $request->con_type;
    $order->position = $request->position;
    $order->heading = $request->heading;
    $order->text_color = $request->text_color;
    $order->background_color = $request->background_color;
    $order->heading_hi = $request->heading_hi;
    $order->effect = $request->effect;
    $order->link = $request->link;
    
    // Handle the file upload if a file is provided
    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/'), $imageName);
        $order->file = $imageName;
    }
    
    // Handle the file_hi upload if a file_hi is provided
    if ($request->hasFile('file_hi')) {
        $imagehi = $request->file('file_hi');
        $imageNamehi = time() . '.' . $imagehi->getClientOriginalExtension();
        $imagehi->move(public_path('uploads/'), $imageNamehi);
        $order->file_hi = $imageNamehi;
    }
    $order->save();
    
    return redirect('admin-panel/topcontent')->with('status', 'Data has been uploaded');
}






    public function add_news()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','News & Notification']
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
        $section_master = DB::table('section_master')->get(); 
        return view('admin.addnews', $data)->with('section_master', $section_master)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  
    public function newsadd(Request $request){
        $validatedData = $request->validate([
            'subject_hi' => 'required',
            'subject' => 'required',
            'section' => 'required',
           
            'news_date' => 'required'
           ]);

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'News Add',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
          if($request->file_name){
            
           $validatedData = $request->validate([
            'subject_hi' => 'required',
            'subject' => 'required',
            'section' => 'required',
            'document_language' => 'required',
            'news_date' => 'required',
            'file_name' => 'required|mimes:pdf|max:8048'
           ]);
      
      	  $image = $request->file_name;
           $extenstion = $image->getClientOriginalExtension();
           $imageName = 'News-'.time().'.'.$extenstion;
           ///$image->move('uploads/news', $imageName);
           $image->move(public_path('uploads/news/'), $imageName);
            
          $News = new News_master;
           $News->section = $request->section;
           $News->document_language = $request->document_language;
           $News->status = 1;
           $News->subject = $request->subject;
           $News->subject_hi = $request->subject_hi;
           $News->news_date = $request->news_date;
           $News->file_name = $imageName;
           $News->save();
            
          }else{
      
           $News = new News_master;
           $News->section = $request->section;
           $News->document_language = $request->document_language;
           $News->status = 1;
           $News->subject = $request->subject;
           $News->subject_hi = $request->subject_hi;
           $News->news_date = $request->news_date;
           $News->link = $request->link;
           $News->save();
            
          }
      
      
           return redirect('admin-panel/add-news')->with('status', 'Data Has been uploaded');
       }
  
  
  
       public function news_list(){
         $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Master'],
								['user_access_types.sub_menu','News & Notification']
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
        $section = DB::table('section_master')
                    ->get();
        $news = DB::table('news_master')
            
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('admin.news_list', $data)->with('news',$news)->with('section',$section)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  public function AddTestCategory()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Admit Card Management'],
								['user_access_types.sub_menu','Add Test Category']
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
        $ruchi = DB::table('test_cat')->where('isDeleted','N')->get(); 
        $testp = DB::table('exam_paper')->get(); 
        return view('admin.addtest', $data)->with('ruchi', $ruchi)->with('testp', $testp)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  
    public function SaveAddTestCategory(Request $request){
        $validatedData = $request->validate([
            'subject_hi' => 'required',
            'subject' => 'required',
           // 'deg' => 'required',
            'advt_no' => 'required'
           ]);

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Test Category Add',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
        $data = array(
        'test_name'=> $request->get('subject'),
        'test_name_hi' => $request->get('subject_hi'),
       //  'for_post'=> $request->get('deg'),
        'advt_no' => $request->get('advt_no'),
        'created_by' => session('Loggeduser')
        );
          
        $test_id = DB::table('test_cat')->insertGetId($data);
        
       
            
        return redirect('admin-panel/AddTestCategory')->with('status', 'Data Has been uploaded');
       }
  public function AddDeg()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Admit Card Management'],
								['user_access_types.sub_menu','Add Designation/Post']
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
        $ruchi = DB::table('test_cat')->where('isDeleted','N')->get(); 
        $deg_item = DB::table('test_deg')->get(); 
        $testp = DB::table('exam_paper')->get(); 
        return view('admin.add_deg', $data)->with('ruchi', $ruchi)->with('testp', $testp)->with('deg_item', $deg_item)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function SaveAddDeg(Request $request){
        $validatedData = $request->validate([
           // 'subject_hi' => 'required',
            'deg' => 'required',
           // 'deg' => 'required',
            'advt_no' => 'required'
           ]);

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Test Designation Add',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
          
        $test_id = DB::table('test_cat')->where('advt_no', $request->get('advt_no'))->first();
    
        $data = array(
          'test_id' => $test_id->id,
         'deg'=> $request->get('deg'),
        'advt_no' => $request->get('advt_no'),
        'created_by' => session('Loggeduser')
        );
    
        DB::table('test_deg')->insert($data);
        
        $multi_count = count($request->papername);
        if($multi_count>0) {
        
        
        for($i=0;$i<$multi_count;$i++){
        $data2 = array(
            'papername'=>$request['papername'][$i],
            'paper_start_date'=>$request['paper_start_date'][$i],
            'paper_start_time'=>$request['paper_start_time'][$i],
            'paper_end_time'=>$request['paper_end_time'][$i],
            'test_id'=>$test_id->id,
            
        ); 
        DB::table('exam_paper')->insert($data2);
        }
        }
            
        return redirect()->back()->with('status', 'Data Has been uploaded');
       }
   
  public function AddCandidateExcel()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Admit Card Management'],
								['user_access_types.sub_menu','Upload Excel']
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
        $ruchi = DB::table('candidate_excel_collection')->where('isDeleted','N')->get(); 
        $tempD = DB::table('test_cat')->where('isDeleted','N')->orderby('id', 'desc')->get(); 
        $testp = DB::table('exam_paper')->get(); 
        return view('admin.UploadCandidateExcel', $data)->with('ruchi', $ruchi)->with('tempD', $tempD)->with('testp', $testp)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function SaveAddCandidateExcel(Request $request){
        $validatedData = $request->validate([
            'exam_cat' => 'required',
           ]);

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Candidates Excel File Upload',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
        
        session()->put('cat', $request->get('exam_cat'));
        Excel::import(new CandidateImport, $request->file('file')->store('public/upload'));
        $hcont = DB::table('admit_card_nw')->where('test_id','=',$request->get('exam_cat'))->get();
    	$worldc = $hcont->count();
        
        $data = array(
        'test_id'=> $request->get('exam_cat'),
        'count' => $worldc,
        'created_by' => session('Loggeduser')
        );
        
        DB::table('candidate_excel_collection')->insert($data);
        
        
            
        return redirect()->back()->with('status', 'Excel File Imported Successfully.');
       }
       public function updateFreeze(Request $request)
{

    DB::table('candidate_excel_collection')
    ->where('id',$request->id)
    ->update([
        'freeze_status'=>$request->freeze
    ]);

    return response()->json(['status'=>true]);

}



public function updateFormat(Request $request)
{

    $check = DB::table('candidate_excel_collection')
            ->where('id',$request->id)
            ->first();

    if($check->freeze_status==1){

        return response()->json(['status'=>false,'msg'=>'Already Freezed']);

    }

    DB::table('candidate_excel_collection')
    ->where('id',$request->id)
    ->update([
        'format'=>$request->format
    ]);

    return response()->json(['status'=>true]);

}
  public function excelCollDelete($id){
        $data = array(
            'isDeleted'=>'Y',
        );
        $res1 = DB::table('candidate_excel_collection')->where('id',$id)->first();
        $ret = DB::table('admit_card')->where('test_id','=',$res1->test_id)->delete();
        $res = DB::table('candidate_excel_collection')->where('id',$id)->update($data);
        
        return redirect()->back()->with('status','Content Deleted Successfully.');

    }
    public function CandidateList($id)
    {
       
        $menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
      
        $data = Admin::where('id','=',session('Loggeduser'))->first();
        // Fetch candidates where test_id matches route id
        $candidates = DB::table('admit_card_nw')
            ->where('test_id', $id)
            ->get();
        $excel_col = DB::table('candidate_excel_collection')
            ->where('test_id', $id)
            ->first();

        // Return to view (if using Blade)
        return view('admin.candidate_list', compact('candidates', 'id'))->with('excel_col', $excel_col)->with('LoggeduserInfo', $data)->with('menu',$menuData);

        // OR return JSON (for API / AJAX)
        // return response()->json([
        //     'status' => true,
        //     'data' => $candidates
        // ]);
    }
public function updateCandidate(Request $request)
{
    DB::table('admit_card_nw')
        ->where('id', $request->id)
        ->update([
            'roll_no' => $request->roll_no,
            'application_no' => $request->application_no,
            'candidate_name' => $request->candidate_name,
            'father_name' => $request->father_name,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'gender' => $request->gender,
            'caste_category' => $request->caste_category,
            'type_of_disability' => $request->type_of_disability,
            'email' => $request->email,
        ]);

    return back()->with('success', 'Candidate updated successfully');
}

public function getCandidate($id)
{
    $candidate = DB::table('admit_card_nw')
        ->where('id', $id)
        ->first();

    return response()->json($candidate);
}

    public function delcandidatedelete($id)
    {
        $data = array(
            'isDeleted'=>'Y',
        );
        
        $res = DB::table('admit_card_nw')->where('id',$id)->update($data);
        
        return redirect()->back()->with('status','Content Deleted Successfully.');

    }
  
   public function update_testcat(Request $request){
        $validatedData = $request->validate([
            'menu_hi' => 'required',
            'menu' => 'required'
           ]);

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Test Category Update => '.$request->get('menu'),
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
        $data = array(
        'test_name'=> $request->get('menu'),
        'test_name_hi' => $request->get('menu_hi'),
        'updated_at' => date('Y-m-d h:i:s'),
        'updated_by' => session('Loggeduser')
        );
          
        DB::table('test_cat')->where('id',$request->get('user_id'))->update($data);
            
        return redirect('admin-panel/AddTestCategory')->with('status', 'Data Has been updated successfully..');
       }
   public function testdelete($id){
        $imagem = DB::table('test_cat')->where('id', $id)->update(array('isDeleted'=>'Y'));
        if($imagem){
        return back()->with('status','Content Deleted Successfully.');
        }else{
            return back()->with('status','Content Not Deleted Successfully.');
        }
    }
  
  
  
    public function PlantsList(){
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Plants Management'],
								['user_access_types.sub_menu','Plants']
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
        $section = DB::table('section_master')
                    ->get();
        $plants = DB::table('plant_list')
            ->where('isDeleted', 'N')
            ->orderBy('id')
            ->paginate(20);
        return view('admin.plant_list', $data)->with('plants',$plants)->with('section',$section)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function AddNewPlants()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Plants Management'],
								['user_access_types.sub_menu','Add New Plants']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $section_master = DB::table('section_master')->get(); 
        $section_cat = DB::table('plantcat_master')->where('isDeleted','N')->get(); 
      
        $plants = DB::table('new_plants_list')
            ->orderByDesc('sr_no')
            ->first();
      
        return view('admin.addnewplants', $data)->with('section_master', $section_master)->with('section_cat', $section_cat)->with('plants', $plants)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
public function ManageNewPlantsCols($id)
{
    $CheckUser = app('App\Http\Controllers\AdminControllers')->CheckUser();
    if ($CheckUser) {
        return redirect('/admin-panel/');
    }

    $user_accesses = DB::table('user_access_types')
        ->join('user_accesses', 'user_access_types.id', '=', 'user_accesses.access_type')
        ->where([
            ['user_accesses.user_type', session()->get('Loggeduser')],
            ['user_access_types.menu_name', 'Plants Management'],
            ['user_access_types.sub_menu', 'Add New Plants']
        ])->get();

    if (!$user_accesses || $user_accesses[0]->fn_add == 'N') {
        session()->put('message', 'Access denied');
        return redirect('/admin-panel/dashboard');
    }

    $menuData = app('App\Http\Controllers\AdminControllers')->MenuList();

    $data = [
        'LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first(),
        'section_master' => DB::table('section_master')->get(),
        'section_cat' => DB::table('plantcat_master')->where('isDeleted', 'N')->get(),
        'plants' => DB::table('new_plants_list')->orderByDesc('sr_no')->first(),
        'plants_data' => DB::table('dynamic_plant_data')->where('plant_id', $id)->get(),
        'menu' => $menuData,
        'user_access' => $user_accesses,
        'id' => $id  // ✅ this was missing
    ];

    return view('admin.extraCols', $data);
}

    public function ManageNewPlants(){
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Plants Management'],
								['user_access_types.sub_menu','Add New Plants']
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
        $section = DB::table('section_master')
                    ->get();
        $plants = DB::table('new_plants_list')->select('new_plants_list.*','plantcat_master.cat as pl_cat')
            ->join('plantcat_master','plantcat_master.id','=','new_plants_list.plant_cat')
            ->where('new_plants_list.isDeleted', 'N')
            ->orderBy('new_plants_list.id')
            ->paginate(20);
        return view('admin.new_plant_list', $data)->with('plants',$plants)->with('section',$section)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function add_plants()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Plants Management'],
								['user_access_types.sub_menu','Plants']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $section_master = DB::table('section_master')->get(); 
      
        $plants = DB::table('plant_list')
            ->orderByDesc('sr_no')
            ->first();
      
        return view('admin.addplants', $data)->with('section_master', $section_master)->with('plants', $plants)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  
    public function plantsadd(Request $request){
      
        $validatedData = $request->validate([
            'plant_code' => 'required',
            'plant_name_en' => 'required',
            'plant_name_hi' => 'required',
            'author' => 'required',
            'com_name_en' => 'required',
            'family_en' => 'required',
            'native_en' => 'required',
            'uses_en' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'locality' => 'required',
           ]);
      
      
        $check = DB::table('plant_list')->where('sr_no',$request->get('plant_code'))->first();
        
        if($check){
          return redirect()->back()->with('status', 'Plant Code Already Taken..');
        }

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'New Plant Add',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
      
      
      	   
      
      if($request->file_name){
           
           $image = $request->file_name;
           $extenstion = $image->getClientOriginalExtension();
           $imageName = 'Plant-'.$request->get('plant_code').'-'.date('Ymdhis').'.'.$extenstion;
           ///$image->move('uploads/news', $imageName);
           $image->move(public_path('uploads/DRC_image_files/'), $imageName);
        
           $data = array(
            'sr_no' => $request->get('plant_code'),
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
            'image' => $imageName,
            'created_by' => session('Loggeduser')
           );
      }else{
           $data = array(
            'sr_no' => $request->get('plant_code'),
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
            'created_by' => session('Loggeduser')
           );
      }
           DB::table('plant_list')->insert($data);
     
           return redirect()->back()->with('status', 'Plant detail Has been uploaded successfully..');
       }
  public function edit_NewPlants($id)
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Plants Management'],
								['user_access_types.sub_menu','Add New Plants']
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
        $section_master = DB::table('section_master')->get(); 
      
        $plants = DB::table('new_plants_list')
            ->where('id',$id)
            ->first();
      
        return view('admin.editnewplants', $data)->with('section_master', $section_master)->with('plants', $plants)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function updateNewPlants(Request $request){
      
        $validatedData = $request->validate([
            'plant_name_en' => 'required',
            'plant_name_hi' => 'required',
            'author' => 'required',
            'com_name_en' => 'required',
            'family_en' => 'required',
            'native_en' => 'required',
            'uses_en' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'locality' => 'required',
           ]);
      
      
       

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Edit Plant Code -'.$request->get('plant_code'),
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
       if($request->file_name){
          // dd($request->file_name);
           $image = $request->file_name;
           $extenstion = $image->getClientOriginalExtension();
           $imageName = 'Plant-'.$request->get('plant_code').'-'.date('Ymdhis').'.'.$extenstion;
           ///$image->move('uploads/news', $imageName);
           $image->move(public_path('uploads/plant_image_files/'), $imageName);
        
           $data = array(
            
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
            'image' => $imageName,
             'updated_by' => session('Loggeduser'),
             'updated_at' => date('Y-m-d h:i:s')
           );
      }else{
           $data = array(
            
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
             'updated_by' => session('Loggeduser'),
             'updated_at' => date('Y-m-d h:i:s')
           );
      }
           DB::table('new_plants_list')->where('id',$request->get('id'))->update($data);
     
           return redirect()->back()->with('status', 'Plant detail Has been updated successfully..');
       }
  public function deleteNewPlants($id){
        $imagem = DB::table('new_plants_list')->where('id', $id)->update(array('isDeleted'=>'Y'));
        if($imagem){
        return back()->with('status','Plant Deleted Successfully.');
        }else{
            return back()->with('status','Plant Not Deleted Successfully.');
        }
    }
 public function deletenewcol($id){
        $imagem = DB::table('dynamic_plant_data')->where('id', $id)->delete();
        if($imagem){
        return back()->with('status','Plant Col Deleted Successfully.');
        }else{
            return back()->with('status','Plant Col Not Deleted Successfully.');
        }
    }
    public function edit_plants($id)
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Plants Management'],
								['user_access_types.sub_menu','Plants']
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
        $section_master = DB::table('section_master')->get(); 
      
        $plants = DB::table('plant_list')
            ->where('id',$id)
            ->first();
      
        return view('admin.editplants', $data)->with('section_master', $section_master)->with('plants', $plants)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  public function plantsedit(Request $request){
      
        $validatedData = $request->validate([
            'plant_name_en' => 'required',
            'plant_name_hi' => 'required',
            'author' => 'required',
            'com_name_en' => 'required',
            'family_en' => 'required',
            'native_en' => 'required',
            'uses_en' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'locality' => 'required',
           ]);
      
      
       

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Edit Plant Code -'.$request->get('plant_code'),
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
       if($request->file_name){
          // dd($request->file_name);
           $image = $request->file_name;
           $extenstion = $image->getClientOriginalExtension();
           $imageName = 'Plant-'.$request->get('plant_code').'-'.date('Ymdhis').'.'.$extenstion;
           ///$image->move('uploads/news', $imageName);
           $image->move(public_path('uploads/DRC_image_files/'), $imageName);
        
           $data = array(
            
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
            'image' => $imageName,
             'updated_by' => session('Loggeduser'),
             'updated_at' => date('Y-m-d h:i:s')
           );
      }else{
           $data = array(
            
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
             'updated_by' => session('Loggeduser'),
             'updated_at' => date('Y-m-d h:i:s')
           );
      }
           DB::table('plant_list')->where('id',$request->get('id'))->update($data);
     
           return redirect()->back()->with('status', 'Plant detail Has been updated successfully..');
       }

    public function plantdelete($id){
        $imagem = DB::table('plant_list')->where('id', $id)->update(array('isDeleted'=>'Y'));
        if($imagem){
        return back()->with('status','Plant Deleted Successfully.');
        }else{
            return back()->with('status','Plant Not Deleted Successfully.');
        }
    }
  public function SaveAddNewPlants(Request $request){
      
        $validatedData = $request->validate([
            'plant_code' => 'required',
            'plant_name_en' => 'required',
            'plant_name_hi' => 'required',
            'author' => 'required',
            'com_name_en' => 'required',
            'family_en' => 'required',
          //  'native_en' => 'required',
          //  'uses_en' => 'required',
          //  'latitude' => 'required',
          //  'longitude' => 'required',
          //  'locality' => 'required',
           ]);
      
      
     //   $check = DB::table('new_plants_list')->where('sr_no',$request->get('plant_code'))->first();
        
    //    if($check){
     //     return redirect()->back()->with('status', 'Plant Code Already Taken..');
     //   }

      	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'New Plant Add',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
      
      
      
      	   
      
      if($request->file_name){
           
           $image = $request->file_name;
           $extenstion = $image->getClientOriginalExtension();
           $imageName = 'Plant-'.$request->get('plant_code').'-'.date('Ymdhis').'.'.$extenstion;
           ///$image->move('uploads/news', $imageName);
           $image->move(public_path('uploads/plant_image_files/'), $imageName);
        
           $data = array(
             'plant_cat' => $request->get('cat'),
            'sr_no' => $request->get('plant_code'),
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
            'image' => $imageName,
            'created_by' => session('Loggeduser')
           );
      }else{
           $data = array(
             'plant_cat' => $request->get('cat'),
            'sr_no' => $request->get('plant_code'),
            'plant_name_en' => $request->get('plant_name_en'),
            'plant_name_hi' => $request->get('plant_name_hi'),
            'author' => $request->get('author'),
            'com_name_en' => $request->get('com_name_en'),
            'family_en' => $request->get('family_en'),
            'native_en' => $request->get('native_en'),
            'uses_en' => $request->get('uses_en'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
            'locality' => $request->get('locality'),
            'created_by' => session('Loggeduser')
           );
      }
           DB::table('new_plants_list')->insert($data);
     
           return redirect()->back()->with('status', 'Plant detail Has been uploaded successfully..');
       }

public function SaveNewCols(Request $request)
{
    // Validate inputs
    $request->validate([
        'col_id'          => 'required|integer',
        'serial_no'       => 'required|array',
        'serial_no.*'     => 'required',
        'column_name'     => 'required|array',
        'column_name.*'   => 'required|string|max:255',
        'column_value'    => 'required|array',
        'column_value.*'  => 'required|string|max:255',
    ]);

    $plantId = $request->col_id;

    // Loop through dynamic rows
    foreach ($request->serial_no as $key => $serialNo) {

        DB::table('dynamic_plant_data')->insert([
            'plant_id'     => $plantId,
            'sr_no'    => $serialNo,
            'column_name'  => $request->column_name[$key],
            'column_value' => $request->column_value[$key],
          
           
        ]);
    }

    return redirect()->back()->with('success', 'New columns inserted successfully!');
}

  
  public function HeritageAudioList(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Audio Management'],
								['user_access_types.sub_menu','Heritage Garden Audio List']
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
        $section = DB::table('section_master')
                    ->get();
        $plants = DB::table('heritage_audio')
            ->where('isDeleted', 'N')
            ->orderBy('id')
            ->paginate(20);
        return view('admin.heritage_audio_list', $data)->with('plants',$plants)->with('section',$section)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function ManageNewGardenAudio(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Audio Management'],
								['user_access_types.sub_menu','Add Garden Audio']
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
        $section = DB::table('section_master')
                    ->get();
        $plants = DB::table('all_garden_audio')->select('all_garden_audio.*','audiocat_master.cat')
            ->join('audiocat_master','audiocat_master.id','=','all_garden_audio.audio_cat')
            ->where('all_garden_audio.isDeleted', 'N')
            ->orderBy('all_garden_audio.id')
            ->paginate(20);
        return view('admin.all_audio_list', $data)->with('plants',$plants)->with('section',$section)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function AddNewGardenAudio()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Audio Management'],
								['user_access_types.sub_menu','Add Garden Audio']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $section_master = DB::table('section_master')->get(); 
        $section_cat = DB::table('audiocat_master')->where('isDeleted','N')->get(); 
      
        $audio = DB::table('all_garden_audio')
            ->orderByDesc('id')
            ->first();
      
        return view('admin.addnewaudio', $data)->with('section_master', $section_master)->with('section_cat', $section_cat)->with('audio', $audio)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
    public function AddHeritageAudio()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Audio Management'],
								['user_access_types.sub_menu','Heritage Garden Audio List']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $section_master = DB::table('section_master')->get(); 
      
        $audio = DB::table('heritage_audio')
            ->orderByDesc('id')
            ->first();
      
        return view('admin.addheritageaudio', $data)->with('section_master', $section_master)->with('audio', $audio)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  public function GardenAudioList(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Audio Management'],
								['user_access_types.sub_menu','Botanic Garden Audio List']
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
        $section = DB::table('section_master')
                    ->get();
        $plants = DB::table('garden_audio')
            ->where('isDeleted', 'N')
            ->orderBy('id')
            ->paginate(20);
        return view('admin.botanic_audio_list', $data)->with('plants',$plants)->with('section',$section)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
   public function AddGardenAudio()
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Audio Management'],
								['user_access_types.sub_menu','Botanic Garden Audio List']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $section_master = DB::table('section_master')->get(); 
      
        $audio = DB::table('garden_audio')
            ->orderByDesc('id')
            ->first();
      
        return view('admin.addgardenaudio', $data)->with('section_master', $section_master)->with('audio', $audio)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  public function activateQuicklink($id)
    {
        // Update the status of the quicklink to 'Active'
        DB::table('quicklinks')
            ->where('id', $id)
            ->update(['status' => 'Active']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Quicklink activated successfully.');
    }

    // Method to deactivate a quicklink
    public function deactivateQuicklink($id)
    {
        // Update the status of the quicklink to 'Inactive'
        DB::table('quicklinks')
            ->where('id', $id)
            ->update(['status' => 'Inactive']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Quicklink deactivated successfully.');
    }
  public function addTender()
    {
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Tenders'],
								['user_access_types.sub_menu','New Tender']
							])->get();
		//dd($user_accesses);
      if($user_accesses!=null)
        {
            if($user_accesses[0]->fn_add=='N')
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
        $department_master = DB::table('department_master')
          		->get(); 
    $category_master = DB::table('category_master')
          		->orderBy('name', 'asc')
          		->get(); 
        return view('admin.addTender', $data)
          		->with('department_master', $department_master)
          		->with('category_master', $category_master)->with('menu',$menuData)->with('user_access',$user_accesses);
    }
  
  public function add_tender(Request $request){
      
        $validatedData = $request->validate([
            'tender_no' => 'required|unique:tender_master,tender_no',
            'advt_date' => 'required',
            'opening_date' => 'required',
            'file' => 'mimes:pdf,zip,doc,docx,xls,xlsx|max:55048',
        ]);


    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Add Tender',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
    
           $News = new Tender_master;
           $News->tender_no = $request->tender_no;
           $News->advt_date = $request->advt_date;
           $News->language = 'English';
           $News->status = 1;
           $News->name_of_material = $request->name_of_material;
           $News->start_date = $request->start_date;
           $News->start_time = $request->start_time;
           $News->pre_start_date = $request->pre_start_date;
           $News->pre_start_time = $request->pre_start_time;
           $News->last_date = $request->last_date;
           $News->last_time = $request->last_time;
 		   $News->opening_date = $request->opening_date;
           $News->opening_time = $request->opening_time;

           $image = $request->file;
           $destinationPath = public_path('uploads/tender');
           $extenstion = $image->getClientOriginalExtension();
           $imageName = 'Tenders-Notice-' . time() . '.' . $extenstion; 
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $imageName
            );
          //$image->move($destinationPath.'/', $imageName);
           $News->file = $imageName;
    
           $News->save();
           return redirect('admin-panel/addTender')->with('status', 'Data Has been uploaded');

       }
  
    public function currentTenders()
     {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Tenders'],
								['user_access_types.sub_menu','Current Tenders']
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
      $department_master = DB::table('department_master')
                  ->get(); 
      $category_master = DB::table('category_master')
                  ->orderBy('name', 'asc')
                  ->get(); 
      $tender_master = DB::table('tender_master')
                  ->orderBy('id', 'desc')
                  ->where('opening_date', '>=', date('Y-m-d'))
                  ->get();

          return view('admin.currentTenders', $data)
                  ->with('department_master', $department_master)
                  ->with('category_master', $category_master)
            	  ->with('tender_master', $tender_master)->with('menu',$menuData)->with('user_access',$user_accesses);
      }
  	public function edit_tender($id)
    {
      $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Tenders'],
								['user_access_types.sub_menu','Current Tenders']
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
      
        $tender_master = DB::table('tender_master')
            ->where('id', $id)
            ->first();
      $department_master = DB::table('department_master')
                  ->get(); 
      $category_master = DB::table('category_master')
                  ->orderBy('name', 'asc')
                  ->get(); 
        return view('admin.edit_tender', $data)
          			->with('department_master', $department_master)
            	    ->with('category_master', $category_master)
          			->with('tender_master',$tender_master)->with('menu',$menuData)->with('user_access',$user_accesses);

    }
  
 public function EditTender(Request $request){
    // Validate the incoming request data
    $validatedData = $request->validate([
        'tender_no' => 'required',
        'opening_date' => 'required',
        'category' => 'required',
    ]);
   if($request->get('category') == 2 || $request->get('category') == 3 || $request->get('category') == 4 || $request->get('category') == 5){
     $validatedData = $request->validate([
       
        'file' => 'required|mimes:pdf,zip,doc,docx,xls,xlsx|max:55048',
    ]);
   }

    // Log the action
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
    $ip = $request->ip();
    DB::table('action_logs')->insert([
        'ip_address' => $ip,
        'action_type' => 'Update Tender',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id' => session('Loggeduser'),
        'user_name' => $data['LoggeduserInfo']->username
    ]);

    // Find the tender to update
    $tender = Tender_master::find($request->id);
    $tender->tender_no = $request->tender_no;
    $tender->advt_date = $request->advt_date;
    $tender->name_of_material = $request->name_of_material;
    $tender->start_date = $request->start_date;
    $tender->start_time = $request->start_time;
    $tender->pre_start_date = $request->pre_start_date;
    $tender->pre_start_time = $request->pre_start_time;
    $tender->last_date = $request->last_date;
    $tender->last_time = $request->last_time;
    $tender->opening_date = $request->opening_date;
    $tender->opening_time = $request->opening_time;
    $tender->category = $request->category;

    // Handle file upload
    if ($request->hasFile('file')) {
        if ($request->category == 5){
        $file = $request->file('file'); 
        $extension = $file->getClientOriginalExtension(); 
        $fileName = 'Tenders-Notice-' . time() . '.' . $extension; 
       
           $destinationPath = public_path('uploads/tender/Amended');
          
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $fileName
            );
        $tender->amend_file = $fileName; 
        }elseif($request->category == 4){
         $file = $request->file('file'); 
        $extension = $file->getClientOriginalExtension(); 
        $fileName = 'Tenders-Notice-' . time() . '.' . $extension; 
       
           $destinationPath = public_path('uploads/tender/Retender');
          
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $fileName
            );
        $tender->retender_file = $fileName;  
        }elseif($request->category == 3){
          $file = $request->file('file'); 
        $extension = $file->getClientOriginalExtension(); 
        $fileName = 'Tenders-Notice-' . time() . '.' . $extension; 
       
           $destinationPath = public_path('uploads/tender/DateExtend');
          
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $fileName
            );
        $tender->date_extend_file = $fileName;  
        }elseif($request->category == 2){
           $file = $request->file('file'); 
        $extension = $file->getClientOriginalExtension(); 
        $fileName = 'Tenders-Notice-' . time() . '.' . $extension; 
       
           $destinationPath = public_path('uploads/tender/Cancelled');
          
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $fileName
            );
        $tender->cancelled_file = $fileName; 
        }elseif($request->category == 1){
          $file = $request->file('file'); 
        $extension = $file->getClientOriginalExtension(); 
        $fileName = 'Tenders-Notice-' . time() . '.' . $extension; 
       
           $destinationPath = public_path('uploads/tender');
          
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $fileName
            );
        $tender->file = $fileName; 
        }
    }

    // Save the updated tender
    $tender->save();

    // Redirect to the current tenders page with a success message
    return redirect('admin-panel/currentTenders')->with('status', 'Data has been uploaded');
}

  
  public function archiveTenders()
     {
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel/');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Tenders'],
								['user_access_types.sub_menu','Archive Tenders']
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
      $department_master = DB::table('department_master')
                  ->get(); 
      $category_master = DB::table('category_master')
                  ->orderBy('name', 'asc')
                  ->get(); 
      $tender_master = DB::table('tender_master')
                  ->orderBy('id', 'desc')
                  ->where('opening_date', '<', date('Y-m-d'))
                  ->get();

          return view('admin.archiveTenders', $data)
                  ->with('department_master', $department_master)
                  ->with('category_master', $category_master)
            	  ->with('tender_master', $tender_master)->with('menu',$menuData)->with('user_access',$user_accesses);
      }
  
  public function deactivate($id){
        $imagem = Tender_master::where('id', $id)->update(array('status'=>'0'));

        if($imagem){

        return back()->with('success','Data Deactivate Successfully.');
        }else{
            return back()->with('fail','Data Not Deactivate Successfully.');

        }
    }

  public function activate($id){
        $imagem = Tender_master::where('id', $id)->update(array('status'=>'1'));

        if($imagem){

        return back()->with('success','Data Activate Successfully.');
        }else{
            return back()->with('fail','Data Not Activate Successfully.');

        }
    }
  
  public function add_listing($id)
    {
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
        return view('admin.add_listing', $data)->with('menu', $menuData)->with('tender_id', $id);
    }
  
  public function saveadd_listing(Request $request){
    // Validate the incoming request data
    $validatedData = $request->validate([
        'file' => 'mimes:pdf,zip,doc,docx,xls,xlsx|max:55048',
    ]);
  

    // Log the action
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
    $ip = $request->ip();
    DB::table('action_logs')->insert([
        'ip_address' => $ip,
        'action_type' => 'Update PO',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id' => session('Loggeduser'),
        'user_name' => $data['LoggeduserInfo']->username
    ]);



    // Handle file upload
    if ($request->hasFile('file')) {
       
        $file = $request->file('file'); 
        $extension = $file->getClientOriginalExtension(); 
        $fileName = 'Tenders-Notice-' . time() . '.' . $extension; 
       
           $destinationPath = public_path('uploads/tender/PO');
          
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $fileName
            );
    
    }
    $data = array(
    'tender_id' => $request->tender_id,
    'title' => $request->title,
    'file' => $fileName,
    );
    DB::table('listing_master')->insert($data);
    if($request->get('checkFile') == 'PO'){
    DB::table('tender_master')->where('id', $request->tender_id)->update(array('po_status' => 1));
    }
    
    return redirect()->back()->with('status', 'Data has been uploaded.');
} 
  public function view_listing($id)
  {
    $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
    $menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
    $listing_master = DB::table('listing_master')
                  ->where('tender_id', $id)
                  ->get(); 
    return view('admin.view_listing', $data)->with('listing_master', $listing_master)->with('menu', $menuData);
  }
  
  public function add_listing_recruit($id)
    {
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
        $listing_master = DB::table('listing_master_recruit')
                  ->where('recruit_id', $id)
                  ->get(); 
       // dd($id);
        return view('admin.add_listing_recruit', $data)->with('menu', $menuData)->with('recruit_id', $id)->with('listing_master', $listing_master);
    }
  
  public function saveadd_listing_recruit(Request $request){
    // Validate the incoming request data
    $validatedData = $request->validate([
     //   'file' => 'mimes:pdf,zip,doc,docx,xls,xlsx|max:55048',
      'title_en' => 'required',
      'title_hi' => 'required',
      'con_type' => 'required',
    ]);
    if ($request->get('con_type') == 'pdf') {
      $validatedData = $request->validate([
        'file' => 'mimes:pdf,zip,doc,docx,xls,xlsx|max:55048',
     
    ]);
    } elseif ($request->get('con_type') == 'link') {
      $validatedData = $request->validate([
        'link' => 'required',
     
    ]);
    }

    // Log the action
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
    $ip = $request->ip();
    DB::table('action_logs')->insert([
        'ip_address' => $ip,
        'action_type' => 'Update Recruitment',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id' => session('Loggeduser'),
        'user_name' => $data['LoggeduserInfo']->username
    ]);



    // Handle file upload
    if ($request->get('con_type') == 'pdf') {
       
        $file = $request->file('file'); 
        $extension = $file->getClientOriginalExtension(); 
        $fileName = 'Recruitment-File-' . time() . '.' . $extension; 
       
           $destinationPath = public_path('uploads/RecruitmentFile');
          
           if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }
            $request->file('file')->move(
                $destinationPath.'/', $fileName
            );
    $data = array(
    'recruit_id' => $request->recruit_id,
    'title_en' => $request->title_en,
      'title_hi' => $request->title_hi,
      'con_type' => $request->con_type,
    'file' => $fileName,
    );
    }elseif ($request->get('con_type') == 'link') {
     
    $data = array(
    'recruit_id' => $request->recruit_id,
    'title_en' => $request->title_en,
    'title_hi' => $request->title_hi,
    'con_type' => $request->con_type,
    'link' => $request->link,
    );
    }
    
    DB::table('listing_master_recruit')->insert($data);
   
    
    return redirect()->back()->with('status', 'Data has been uploaded.');
} 
  public function view_listing_recruit($id)
  {
    $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
    $menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
    $listing_master = DB::table('listing_master')
                  ->where('tender_id', $id)
                  ->get(); 
    return view('admin.view_listing_recruit', $data)->with('listing_master', $listing_master)->with('menu', $menuData);
  }
public function delstArea($id){
        $imagem = DB::table('area_master')->where('id', $id)->update(array('isDeleted'=>'Y'));

        if($imagem){

        return back()->with('success','Data Deleted Successfully.');
        }else{
            return back()->with('fail','Data Not Deleted Successfully.');

        }
    }
public function import44(Request $request)
{
    $request->validate([
        'category' => 'required',
        'category_hi' => 'required',
        'file' => 'required|mimes:xlsx',
        'file_hi' => 'required|mimes:xlsx',
    ]);

    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];

    // Import English data
    $category = $request->category;
    $file = $request->file('file');
    Excel::import(new DirectoryImport('English', $category), $file);

    // Import Hindi data
    $category_hi = $request->category_hi;
    $file_hi = $request->file('file_hi');
    Excel::import(new DirectoryImport('Hindi', $category_hi), $file_hi);

    // Log action
    $ip = $request->ip();
    DB::table('action_logs')->insert([
        'ip_address' => $ip,
        'action_type' => 'Add Phone Directory',
        'created_at' => now(),
        'updated_at' => now(),
        'created_by' => session('Loggeduser'),
        'updated_by' => session('Loggeduser'),
        'user_id' => session('Loggeduser'),
        'user_name' => $data['LoggeduserInfo']->username
    ]);

    return redirect()->back()->with('success', 'Excel files imported successfully.');
}


  
   public function import(Request $request)
  {
      $request->validate([
          'category' => 'required',
          'category_hi' => 'required',
          'file' => 'required|mimes:csv,txt',
          'file_hi' => 'required|mimes:csv,txt',
      ]);

      	 $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Add Phone Directory',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
     
      // English data
      $category = $request->category;
      $file = $request->file('file');
      $fileContents = file($file->getPathname());

      // Hindi data
      $category_hi = $request->category_hi;
      $file_hi = $request->file('file_hi');
      $fileContents_hi = file($file_hi->getPathname());

      $dataToInsert = [];

      // Process English data
      foreach ($fileContents as $line) {
          $data = str_getcsv($line);

          $dataToInsert[] = [
              'name' => $data[0] ?? '',
              'designation' => $data[1] ?? '',
              'area' => $data[2] ?? '',
              'twitter' => $data[3] ?? '',
              'email' => $data[4] ?? '',
              'contact' => $data[5] ?? '',
              'language' => 'English',
              'category' => $category,
          ];
      }

      // Process Hindi data
      foreach ($fileContents_hi as $line2) {
          $data2 = str_getcsv($line2);

          $dataToInsert[] = [
              'name' => $data2[0] ?? '',
              'designation' => $data2[1] ?? '',
              'area' => $data2[2] ?? '',
              'twitter' => $data2[3] ?? '',
              'email' => $data2[4] ?? '',
              'contact' => $data2[5] ?? '',
              'language' => 'Hindi',
              'category' => $category_hi,
          ];
      }

      DB::table('directory_master')->where('category', $category_hi)->delete();
      DB::table('directory_master')->where('category', $category)->delete();
      DB::table('directory_master')->insert($dataToInsert);
      return redirect()->back()->with('success', 'CSV files imported successfully.');
  }

public function delete_phone_directory($id)
{
    DB::table('directory_master')->where('id', $id)->delete();
    return redirect()->back()->with('success', 'Deleting successfully.');
}
public function delUser($id)
{
    DB::table('admins')->where('id', $id)->delete();
    return redirect()->back()->with('success', 'User Deleted Successfully.');
}
public function edit_phone_directory($id)
{
  $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
  $category_master = DB::table('directory_category_master')->where('language', 'English')->get();
  $category_hii = DB::table('directory_category_master')->where('language', 'Hindi')->get();
  $directory_master = DB::table('directory_master')->where('id', $id)->orderBy('id', 'asc')->first();
   
    return view('admin.edit-phone-directory', $data)->with('directory_master', $directory_master)->with('category_hii', $category_hii)->with('category_master', $category_master);
}
  
  
  public function update_directory(Request $request)
{
    
     $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
          $ip = $request->ip();
          $order = DB::table('action_logs')->insert([
              'ip_address' => $ip,
              'action_type' => 'Update Phone Directory',
              'created_at' => now(),
              'updated_at' => now(),
              'created_by' => session('Loggeduser'),
              'updated_by' => session('Loggeduser'),
              'user_id' => session('Loggeduser'),
              'user_name' => $data['LoggeduserInfo']->username
          ]);
    

    $directory_master = DB::table('directory_master')->where('id', $request->id)->first();
    if ($directory_master) {
    DB::table('directory_master')->where('id', $request->id)->update([
        'category' => $request->category,
        'name' => $request->name,
        'designation' => $request->designation,
        'area' => $request->area,
        'twitter' => $request->twitter,
        'email' => $request->email,
        'contact' => $request->contact,
    ]);

    return redirect('admin-panel/phone-directory')->with('status', 'Data has been updated');
} else {
    return redirect()->back()->with('error', 'Record not found');
}

}

  
  
  public function office_active($id){
        $imagem = DB::table('appointments')->where('id', $id)->update(array('status'=>'Deactivate'));

        if($imagem){

        return back()->with('success','Data Deactivate Successfully.');
        }else{
            return back()->with('fail','Data Not Deactivate Successfully.');

        }
    }

  public function office_deactivate($id){
        $imagem = DB::table('appointments')->where('id', $id)->update(array('status'=>'Active'));
        if($imagem){

        return back()->with('success','Data Activate Successfully.');
        }else{
            return back()->with('fail','Data Not Activate Successfully.');

        }
    }
  public function quicklinks_active($id){
        $imagem = DB::table('quicklinks')->where('id', $id)->update(array('status'=>'Deactivate'));

        if($imagem){

        return back()->with('success','Data Deactivate Successfully.');
        }else{
            return back()->with('fail','Data Not Deactivate Successfully.');

        }
    }
  public function changestatusrooms($cat,$id){
        if($cat == 'Active'){
          $imagem = DB::table('room_master')->where('id', $id)->update(array('status'=>'Active'));

        if($imagem){

        return back()->with('success','Room Activated Successfully.');
        }else{
            return back()->with('fail','Room Not Activated Successfully.');

        }
        }else{
          $imagem = DB::table('room_master')->where('id', $id)->update(array('status'=>'Blocked'));

        if($imagem){

        return back()->with('success','Room Blocked Successfully.');
        }else{
            return back()->with('fail','Room Not Blocked Successfully.');

        } 
        }
        
    }
   public function blockRoom($id, Request $request)
{
    $from_date = date("Y-m-d", strtotime($request->input('from_date')));
    if($from_date == date('Y-m-d')){
    $imagem = DB::table('room_master')->where('id', $id)->update(array('status'=>'Blocked','deactive_till'=>$request->input('deactive_till'),'from_date'=>$request->input('from_date')));
      
    $room = DB::table('room_master')->where('id', $id)->first();
    
    return redirect()->back()->with('status', 'Room blocked till '.$room->deactive_till);
    }else{
    $imagem = DB::table('room_master')->where('id', $id)->update(array('deactive_till'=>$request->input('deactive_till'),'from_date'=>$request->input('from_date')));
      
    $room = DB::table('room_master')->where('id', $id)->first();
    
    return redirect()->back()->with(
    'status',
    'Room will be blocked from ' . $room->from_date . ' to ' . $room->deactive_till
    );

    }
    
}

public function activateRoom($id)
{
    
    $imagem = DB::table('room_master')->where('id', $id)->update(array('status'=>'Active','deactive_till'=> null,'from_date'=> null));
    $room = DB::table('room_master')->where('id', $id)->first();

    return redirect()->back()->with('success', 'Room activated successfully');
}


  public function quicklinks_deactivate($id){
        $imagem = DB::table('quicklinks')->where('id', $id)->update(array('status'=>'Active'));
        if($imagem){

        return back()->with('success','Data Activate Successfully.');
        }else{
            return back()->with('fail','Data Not Activate Successfully.');

        }
    }
   public function delAddGuestRoom($id){
        $imagem = DB::table('quicklinks')->where('id', $id)->update(array('status'=>'Active'));
        if($imagem){

        return back()->with('success','Data Activate Successfully.');
        }else{
            return back()->with('fail','Data Not Activate Successfully.');

        }
    }
  
  
  public function slider_active($id){
        $imagem = DB::table('sliders')->where('id', $id)->update(array('status'=>'Deactivate'));

        if($imagem){

        return back()->with('success','Data Deactivate Successfully.');
        }else{
            return back()->with('fail','Data Not Deactivate Successfully.');

        }
    }

  public function slider_deactivate($id){
        $imagem = DB::table('sliders')->where('id', $id)->update(array('status'=>'Active'));
        if($imagem){

        return back()->with('success','Data Activate Successfully.');
        }else{
            return back()->with('fail','Data Not Activate Successfully.');

        }
    }
    
    public function alert_image(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
    'image_hi' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
    ]);

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $imageName = 'alert_image_' . time() . '.' . $extension;
        $file->move(public_path('img'), $imageName);
    }
    if ($request->hasFile('image_hi')) {
        $file = $request->file('image_hi');
        $extension = $file->getClientOriginalExtension();
        $imageHiName = 'alert_image_hi_' . time() . '.' . $extension; // different naming to avoid conflicts
        $file->move(public_path('img'), $imageHiName);
    }
    $imagem = DB::table('alert_image')->where('id', 1)->update([
        'image' => $imageName,
        'image_hi' => $imageHiName
    ]);
    if ($imagem) {
        return back()->with('success', 'Alert image successfully updated.');
    } else {
        return back()->with('fail', 'Alert image not updated.');
    }
}

  
    
}

