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
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Mail\UpdateMail;
use App\Mail\CancelMail;
use App\Mail\BackMail;


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
        $vijay = Application::where('isDeleted','N')->where('status','Pending')->orderBy('id', 'desc')->get();
        $room = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id')->get();

        return view('admin.guestHouseApplications', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('room',$room)->with('user_access',$user_accesses);
    }
  public function ViewRoomAllotment($id){
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
        $vijay = Application::where('isDeleted','N')->where('id',$id)->orderBy('id', 'desc')->first();
        $room = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id')->get();
        $bed = DB::table('bed_master')->get();
    
        $bookings = DB::table('bookings')->select('bookings.*','guestroom_master.name as room_name','room_master.room_no as room_number')
          ->join('guestroom_master','guestroom_master.id','=','bookings.room_type')
          ->join('room_master','room_master.id','=','bookings.room_no')
          ->where('bookings.isDeleted','N')->where('bookings.application_id',$vijay->application_id)->orderBy('bookings.id', 'desc')->get();

        return view('admin.ViewRoomAllotment', $data)->with('item',$vijay)->with('bed',$bed)->with('bookings',$bookings)->with('menu',$menuData)->with('room',$room)->with('user_access',$user_accesses);
    }
  public function update_allotment(Request $request)
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
								['user_access_types.menu_name','Guest House Management'],
								['user_access_types.sub_menu','Pending Applications']
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
        $checkRoomCount = DB::table('applications')->where('application_id', $request->get('user_id'))->first();
        $checkBookingCount = DB::table('bookings')->where('application_id', $request->get('user_id'))->count('id');
       
        if($checkRoomCount->room == $checkBookingCount){
          $message = 'Number of required rooms exceeding.';
       
        session()->put('message', 'Number of required rooms exceeding.');
  
        return redirect()->back()->with('status', $message);
        }
        
        if($request->get('beds_nn')){
        $bedwise = $request->get('beds_nn');
       
        $bedNumbers = implode(',', $bedwise);
        //dd($bedNumbers);
    
        }else{
        $checkBed = DB::table('bed_master')->where('room_id', $request->get('room_no'))->get();
        $bedNumbers = $checkBed->pluck('id')->implode(',');
        }
          
        $booking_data = array(
        'application_id' => $request->get('user_id'),
        'no_of_room' => $request->get('rooms'),
        'bed_id' => $bedNumbers,
        'room_no' => $request->get('room_no'),
        'bed_no' => $request->get('no_bed'),
        'floor' => $request->get('floor'),
        'room_type' => $request->get('room_cat'),
        'booking_from' => $request->get('arrival'),
        'booking_to' => $request->get('departure'),
        'booking_type' => $request->get('inlineRadioOptions'),
        
        'created_at' => date('Y-m-d h:i:s'),
       
        'created_by' => session()->get('Loggeduser'),
        );
    
        $booking = DB::table('bookings')->insert($booking_data);
        if($booking){
        $application = DB::table('applications')->where('id', $request->get('id'))->update(array('booking_type' => $request->get('inlineRadioOptions'), 'updated_at' => date('Y-m-d h:i:s')));
        }
       
 
        $message = 'Room added successfully.';
       
        session()->put('message', 'Room added successfully');
  
        return redirect()->back()->with('status', $message);
    }
  public function confirm_allotment(Request $request)
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
								['user_access_types.menu_name','Guest House Management'],
								['user_access_types.sub_menu','Pending Applications']
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
       
          
        $booking_data = array(
        'status' => $request->get('status'),
        'updated_at' => date('Y-m-d h:i:s'),
       
        'updated_by' => session()->get('Loggeduser'),
        );
    
        $booking = DB::table('bookings')->where('application_id', $request->get('app_id'))->update($booking_data);
        if($booking){
        $application = DB::table('applications')->where('application_id', $request->get('app_id'))->update(array('status' => 'Approved', 'booking_status' => 'Approved', 'updated_at' => date('Y-m-d h:i:s')));
        }
        $application = Application::where('application_id', $request->get('app_id'))->firstOrFail();

        // Send mail
        Mail::to($application->email)->send(new UpdateMail($application));
 
        $message = 'Application Id ' . $request->get('app_id') . ' is approved successfully';
       
        session()->put('message', 'Application Id ' . $request->get('app_id') . ' is approved successfully');
  
        return redirect()->back()->with('status', $message);
    }
  public function delallottment($id){
        $imagem = DB::table('bookings')->where('id', $id)->delete();

        if($imagem){

        return back()->with('success','Content Deleted Successfully.');
        }else{
            return back()->with('fail','Content Not Deleted Successfully.');

        }
    }
  public function SearchApplications(){
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
								['user_access_types.sub_menu','Search Applications']
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
        $vijay = Application::where('isDeleted','N')->where('status','Pending')->orderBy('id', 'desc')->get();
        $room = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id')->get();

        return view('admin.SearchApplications', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('room',$room)->with('user_access',$user_accesses);
    }
  public function GetSearchApplications(Request $request){
    
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
								['user_access_types.sub_menu','Search Applications']
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
    
        $start = $request->get('from_date');
        $end = $request->get('to_date');
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
       
    
        $vijay = Application::where('isDeleted','N')
        ->whereBetween(DB::raw("DATE_FORMAT(date_of_arrival, '%Y-%m-%d')"), [$start, $end])
        ->where('status','Pending')->orderBy('id', 'desc')->get();   
    
        $room = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id')->get();

        return view('admin.ViewSearchApplications', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('room',$room)->with('user_access',$user_accesses);
    }
  public function ViewRoomStatus(){
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
								['user_access_types.sub_menu','View Room Status']
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
        $vijay = Application::where('isDeleted','N')->where('status','Pending')->orderBy('id', 'desc')->get();
        $room = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id')->get();
    


        return view('admin.ViewRoomStatus', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('room',$room)->with('user_access',$user_accesses);
    }
  public function GetViewRoomStatus(Request $request)
    {
        $CheckUser = app('App\Http\Controllers\AdminControllers')->CheckUser();
        if ($CheckUser) {
            return redirect('/admin-panel/');
        }

        $user_accesses = DB::table('user_access_types')
            ->join('user_accesses', 'user_access_types.id', '=', 'user_accesses.access_type')
            ->where([
                ['user_accesses.user_type', session()->get('Loggeduser')],
                ['user_access_types.menu_name', 'Guest House Management'],
                ['user_access_types.sub_menu', 'View Room Status']
            ])
            ->get();

        if ($user_accesses->isEmpty() || $user_accesses[0]->fn_view == 'N') {
            session()->put('message', 'Access denied');
            return redirect('/admin-panel/dashboard');
        }

        // Get date and time ranges
        $checkin = $request->get('from_date') . ' ' . $request->get('from_time');
        $checkout = $request->get('to_date') . ' ' . $request->get('to_time');

        // Optional: filter by specific guesthouse ID if needed
        // Example: $id = $request->get('guesthouse_id');
        // Remove the below line if no ID filtering is needed
        // You must handle `$id` from somewhere (route or query)
        // Otherwise comment/remove the next where condition
        //$id = 1; // <-- set this dynamically if needed

        // Get all rooms
        $rooms = DB::table('room_master as r')
            ->join('guestroom_master as gr', 'gr.id', '=', 'r.room_name')
            ->where('r.isDeleted', 'N')
            ->where('r.status', 'Active')
            //->where('gr.id', $id) // Uncomment and use if $id is available
            ->select('r.id as room_id', 'r.room_no', 'gr.name')
            ->get();

        // Get all overlapping bookings
        $bookings = DB::table('bookings as bk')
            ->join('room_master as r', 'bk.room_no', '=', 'r.id')
            ->where('bk.isDeleted', 'N')
            ->where(function ($q) use ($checkin, $checkout) {
                $q->where('bk.booking_from', '<', $checkout)
                  ->where('bk.booking_to', '>', $checkin);
            })
            ->select('bk.bed_id', 'bk.booking_type', 'r.id as room_id')
            ->get();

        // Get list of occupied bed IDs
        $occupiedBeds = [];
        foreach ($bookings as $bk) {
            $beds = explode(',', $bk->bed_id);
            foreach ($beds as $bedId) {
                $bedId = trim($bedId);
                if (!empty($bedId)) {
                    $occupiedBeds[] = (int)$bedId;
                }
            }
        }
        $occupiedBeds = collect($occupiedBeds);

        // Build room availability status
        $roomAvailability = [];

        foreach ($rooms as $room) {
            $beds = DB::table('bed_master')
                ->where('room_id', $room->room_id)
             //   ->where('isDeleted', 'N')
                ->select('id', 'bed')
                ->get();

            $bedStatuses = [];
            $occupiedCount = 0;

            foreach ($beds as $bed) {
                $status = $occupiedBeds->contains($bed->id) ? 'occupied' : 'available';
                if ($status === 'occupied') $occupiedCount++;

                $bedStatuses[] = [
                    'bed_id' => $bed->id,
                    'bed_name' => $bed->bed,
                    'status' => $status,
                ];
            }

            // Set room status
            $roomStatus = 'available';
            if ($occupiedCount === count($bedStatuses)) {
                $roomStatus = 'fully occupied';
            } elseif ($occupiedCount > 0) {
                $roomStatus = 'partially occupied';
            }

            $roomAvailability[] = [
                'room_id' => $room->room_id,
                'room_no' => $room->room_no,
                'room_cat' => $room->name,
                'room_status' => $roomStatus,
                'beds' => $bedStatuses,
            ];
        }

        // Return JSON for AJAX
        return response()->json($roomAvailability);
    }

 public function ApprovedApplications(){
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
								['user_access_types.sub_menu','Approved Applications']
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
        $vijay = Application::where('isDeleted','N')->where('status','Approved')->orderBy('id', 'desc')->get();
        $room = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id')->get();

        return view('admin.guestHouseApplications', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('room',$room)->with('user_access',$user_accesses);
    }
  public function RejectedApplications(){
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
								['user_access_types.sub_menu','Rejected Applications']
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
        $vijay = Application::where('isDeleted','N')->where('status','Rejected')->orderBy('id', 'desc')->get();
        $room = DB::table('guestroom_master')->where('isDeleted','N')->orderBy('id')->get();

        return view('admin.guestHouseApplications', $data)->with('ruchi',$vijay)->with('menu',$menuData)->with('room',$room)->with('user_access',$user_accesses);
    }
 public function ViewApplications($id){
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
       $tableData = Application::where('id', $id)
    ->where('isDeleted', 'N')
    ->latest('id')
    ->first();

$guestData = DB::table('guests')
    ->select('guests.*', 'guest_category.name as cat_name')
    ->join('guest_category', 'guest_category.id', '=', 'guests.category')
    ->where('guests.application_id', $tableData->application_id)
    ->get();



        if($tableData->status == 'Approved'){
        $bookingData = DB::table('bookings')
        ->select(
            'bookings.*',
            'guestroom_master.name as room_cat',
            'room_master.room_no as room_number',
            DB::raw('GROUP_CONCAT(bed_master.bed) as bed_names') 
        )
        ->join('guestroom_master', 'guestroom_master.id', '=', 'bookings.room_type')
        ->join('room_master', 'room_master.id', '=', 'bookings.room_no')
        ->leftJoin('bed_master', function($join) {
            $join->on(DB::raw("FIND_IN_SET(bed_master.id, bookings.bed_id)"), '>', DB::raw('0'));
        })
        ->where('bookings.application_id', $tableData->application_id)
        ->groupBy('bookings.id') 
        ->get();
        
        return view('admin.ViewguestHouseApplications', $data)->with('tableData',$tableData)->with('bookingData',$bookingData)->with('guestData',$guestData)->with('menu',$menuData)->with('user_access',$user_accesses);
        }else{

          return view('admin.ViewguestHouseApplications', $data)->with('tableData',$tableData)->with('guestData',$guestData)->with('menu',$menuData)->with('user_access',$user_accesses); 
        }
    }

public function SaveRejectApplications(Request $request)
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
  
        $application = Application::find($request->get('token'));
        
        $application_data = array(
        'status' => 'Rejected',
        'remarks' => $request->get('remark'),
        'updated_at' => date('Y-m-d h:i:s'),
        'updated_by' => session()->get('Loggeduser'),
        );
        
        DB::table('applications')->where('id', $request->get('token'))->update($application_data);
  
       

        // Send mail
        Mail::to($application->email)->send(new CancelMail($application));
 
        $message = 'Application Id ' . $application->application_id . ' is rejected due to ' . $request->get('remark');
       
        session()->put('message', 'Application ' . $application->application_id . ' successfully rejected');
  
        return redirect()->back()->with('status', $message);
    }
  
public function SaveApproveApplications(Request $request)
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
								['user_access_types.menu_name','Guest House Management'],
								['user_access_types.sub_menu','Rejected Applications']
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
  
        $application = DB::table('applications')->where('id', $request->get('token'))->first();
        
        $application_data = array(
        'status' => 'Pending',
        'updated_at' => date('Y-m-d h:i:s'),
        'updated_by' => session()->get('Loggeduser'),
        );
        
        DB::table('applications')->where('id', $request->get('token'))->update($application_data);
 
        $message = 'Application Id ' . $application->application_id . ' is approved.';
       
        session()->put('message', 'Application ' . $application->application_id . ' successfully approved & added to pending list.');
  
        $application = Application::findOrFail($request->get('token'));
  
        Mail::to($application->email)->send(new RegisterMail($application));
  
        return redirect()->back()->with('status', $message);
    }
public function SaveBackApproveApplications(Request $request)
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
								['user_access_types.menu_name','Guest House Management'],
								['user_access_types.sub_menu','Approved Applications']
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
  
        $application = DB::table('applications')->where('id', $request->get('token'))->first();
        DB::table('bookings')->where('application_id', $application->application_id)->delete();
        
        $application_data = array(
        'status' => 'Pending',
        'booking_status' => 'Pending',
        'updated_at' => date('Y-m-d h:i:s'),
        'updated_by' => session()->get('Loggeduser'),
        );
        
        DB::table('applications')->where('id', $request->get('token'))->update($application_data);
 
        $message = 'Application Id ' . $application->application_id . ' is back to Pending list.';
       
        session()->put('message', 'Application ' . $application->application_id . ' successfully approved & added to pending list.');
  
        $application = Application::findOrFail($request->get('token'));
  
        Mail::to($application->email)->send(new BackMail($application));
  
        return redirect()->back()->with('status', $message);
    }

}
