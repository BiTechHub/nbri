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


class AdmitCardControllers extends Controller
{

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
                echo "Access Denied if fnview";exit;
                session()->put('message','Access denied');
                return redirect('/admin-panel/dashboard');
            }
        }
        else
        {
            echo "Access Denied else";exit;
            session()->put('message','Access denied');
            return redirect('/admin-panel/dashboard');
        }
		$menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
      
        $data = ['LoggeduserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
        $ruchi = DB::table('candidate_excel_collection')->where('isDeleted','N')->get(); 
        $tempD = DB::table('test_cat')->where('isDeleted','N')->orderby('id', 'desc')->get(); 
        $testp = DB::table('exam_paper')->get(); 
        return view('admin.admitcard.UploadCandidateExcel', $data)->with('ruchi', $ruchi)->with('tempD', $tempD)->with('testp', $testp)->with('menu',$menuData)->with('user_access',$user_accesses);
    }

    public function SaveAddCandidateExcel(Request $request){

        
        $validatedData = $request->validate([
            'exam_cat' => 'required',
           ]);

        $exam_cat = $request->exam_cat;

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
        // Excel::import(new CandidateImport, $request->file('file')->store('public/upload'));

        try {
            
            Excel::import(new CandidateImport($exam_cat), $request->file('file')->store('public/upload'));

        } catch (\Exception $e) {
            
            return back()->with('error', $e->getMessage());
        }
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
    public function excelCollDelete($id)
    {
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
            ->where('isDeleted', 'N')
            ->get();
        $excel_col = DB::table('candidate_excel_collection')
            ->where('test_id', $id)
            ->first();

        

        // Return to view (if using Blade)
        return view('admin.admitcard.candidate_list', compact('candidates', 'id'))->with('excel_col', $excel_col)->with('LoggeduserInfo', $data)->with('menu',$menuData);

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
}