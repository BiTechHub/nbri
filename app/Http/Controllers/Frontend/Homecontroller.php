<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use App\Models\Visitor;
use App\Models\Feedback;
use Illuminate\Support\Facades\Http;

class Homecontroller extends Controller
{
public function home()
{
$slider = Slider::where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
$fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
$officer =DB::table('appointments')->where('status','Active')->where('isDeleted','N')->orderBy('position','asc')->get();

$news_i = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '1')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news_h = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '2')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
$news = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '4')
        ->where('language', 'English')
        ->orderBy('created_at', 'desc')
        ->get();
$news_w = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '6')
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get();
$news_pr = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '5')
//        ->where('language', 'English')
        ->orderBy('created_at', 'desc')
        ->get();
  
  $latestPhotos = DB::table('photos')
        ->orderBy('id', 'desc')
        ->take(4)
        ->get();
  $latestVideo = DB::table('videos')
       ->where('isDeleted','N')
        ->orderBy('id', 'desc')
        ->first();
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
  $quicklinks = DB::table('quicklinks')
    ->where('status', 'Active')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $maincontent = DB::table('maincontent')
    ->where('lang', 'English')->get();
 
  return view('frontend.index')
        ->with('slider',$slider)
        ->with('fslider',$fslider)
        ->with('officer',$officer)
        ->with('maincontent',$maincontent)
        ->with('news_i',$news_i)
        ->with('news_h',$news_h)
        ->with('news_w',$news_w)
        ->with('news_pr',$news_pr)
        ->with('news_n',$news_n)
        ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
        ->with('quicklinks', $quicklinks)
        ->with('news',$news)
    	->with('latestPhotos',$latestPhotos)
        ->with('latestVideo',$latestVideo);
}
public function checkStatusAjax(Request $request)
    {
        $ref = $request->reference;

        // Validate reference
        if (!$ref) {
            return response()->json([
                'status'  => 'error',
                'booking_status' => 'Reference not provided.'
            ]);
        }

        // Check in database
        $data = DB::table('applications')->where('application_id', $ref)->first();

        if (!$data) {
            return response()->json([
                'status'  => 'error',
                'booking_status' => 'Booking not found.'
            ]);
        }

        // Return status based on DB field
        switch (strtolower($data->status)) {
            case 'approved':
                $statusType = 'success';
                break;

            case 'pending':
                $statusType = 'pending';
                break;

            case 'rejected':
            default:
                $statusType = 'rejected';
                break;
        }

        return response()->json([
            'status' => $statusType,
            'booking_status' => $data->status
        ]);
    }

public function checkStatusAjax11(Request $request)
{
    $secretKey = "6LemSQ8sAAAAABIiZ0e-pwaZ8ckJxwHoQcmejgTt";
    $token = $request->captcha_token;

    // Verify Captcha
    $response = Http::withoutVerifying()
    ->asForm()
    ->post("https://www.google.com/recaptcha/api/siteverify", [
        'secret' => $secretKey,
        'response' => $token
    ]);


    $verify = $response->json();

    if (!$verify['success']) {
        return response()->json([
            "status" => "error",
            "message" => "Captcha verification failed."
        ]);
    }

    $ref = $request->reference;

    $data = DB::table('applications')
                ->where('application_id', $ref)
                ->first();

    if (!$data) {
        return response()->json([
            "status"  => "error",
            "booking_status" => "Not Found"
        ]);
    }

    if ($data->status == 'Approved') {
        return response()->json([
            "status" => "success",
            "booking_status" => "Approved"
        ]);
    }

    if ($data->status == 'Pending') {
        return response()->json([
            "status" => "pending",
            "booking_status" => "Pending"
        ]);
    }

    return response()->json([
        "status" => "rejected",
        "booking_status" => "Rejected"
    ]);
}


 public function newplants($cat, $id)
{
 //  dd($cat);
  $plant_catname = DB::table('plantcat_master')->where('id', $cat)->where('isDeleted','N')->first();
  $plant_detail = DB::table('new_plants_list')
    ->where('sr_no', $id)
    ->where('plant_cat', $cat)
    ->where('isDeleted', 'N')
    ->first();
  
    $plant_data = DB::table('dynamic_plant_data')
    ->where('plant_id', $plant_detail->id)
    ->get();

  $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();

 
  return view('frontend.allplant')
        ->with('plant_detail', $plant_detail)
        ->with('plant_catname', $plant_catname)
        ->with('plant_data', $plant_data)
        ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
} 
public function drcbanthracsirnbri(Request $request)
{
  $plant_no = $request->get('plant_no');
  $plant_detail = DB::table('plant_list')
    ->where('sr_no', $plant_no)
    ->where('isDeleted', 'N')
    ->first();
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();

 
  return view('frontend.botanicplant')
        ->with('plant_detail', $plant_detail)
        ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}
  
public function heritagegardenaudio(Request $request)
{
  $plant_no = $request->get('plant_no');
  $plant_detail = DB::table('heritage_audio')
    ->where('sr_no', $plant_no)
    ->first();
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();

 
  return view('frontend.heritageaudio')
        ->with('plant_detail', $plant_detail)
        ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}

public function newgardenaudio($cat, $id)
{
  $plant_no = $id;
  $plant_detail = DB::table('all_garden_audio')
   ->select('all_garden_audio.*','audiocat_master.cat')
   ->join('audiocat_master','all_garden_audio.audio_cat','=','audiocat_master.id')
    ->where('all_garden_audio.audio_cat', $cat)
    ->where('all_garden_audio.sr_no', $id)
    ->first();
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();

 
  return view('frontend.newgardenaudio')
        ->with('plant_detail', $plant_detail)
        ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}


public function botanicalgardenaudio(Request $request)
{
  $plant_no = $request->get('plant_no');
  $plant_detail = DB::table('garden_audio')
    ->where('sr_no', $plant_no)
    ->first();
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();

 
  return view('frontend.botanicaudio')
        ->with('plant_detail', $plant_detail)
        ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}
  
public function RecruitmentListing($id, $cat)
{
    
    $menu = DB::table('menus')
        ->where('isDeleted', 'N')
        ->orderBy('position', 'ASC')
        ->get();

    $submenu = DB::table('submenus')
        ->where('isDeleted', 'N')
        ->get();

    $childmenu = DB::table('childmenus')
        ->where('isDeleted', 'N')
        ->get();

    $advt_no = DB::table('advertisement')
        ->where('recruit_type', $id)
        ->where('isDeleted', 'N')
        ->where('archived', 'N')
        ->orderBy('id', 'desc')
        ->get();

    $advt = DB::table('recruitment')
        ->where('rec_type', $id)
        ->where('isDeleted', 'N')
        ->orderBy('position', 'desc')
        ->get();

    $list = DB::table('listing_master_recruit')->get();

    return view('frontend.recruitment', compact(
        'advt_no',
        'advt',
        'list',
        'menu',
        'submenu',
        'childmenu'
    ));
}

  
public function hometest()
{
$slider = Slider::where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
$officer =DB::table('appointments')->where('status','Active')->where('isDeleted','N')->orderBy('position','asc')->get();
$content = DB::table('top_content')->where('isDeleted', 'N')->orderBy('position','asc')->get(); 
$news_i = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '1')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news_h = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '2')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '3')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '4')
        ->where('language', 'English')
        ->orderBy('created_at', 'desc')
        ->get();
  
  $latestPhotos = DB::table('photos')
        ->orderBy('id', 'desc')
        ->take(4)
        ->get();
  $latestVideo = DB::table('videos')
        ->orderBy('id', 'desc')
        ->first();
  $category = DB::table('image_category')
    ->where('isDeleted', 'N')->orderBy('id', 'desc')->where('isDeleted', 'N')->get();
 
  return view('frontend.index1')
        ->with('slider',$slider)
        ->with('officer',$officer)
        ->with('news_i',$news_i)
        ->with('news_h',$news_h)
        ->with('news_n',$news_n)
        ->with('category', $category)
        ->with('news',$news)
    	->with('latestPhotos',$latestPhotos)
        ->with('latestVideo',$latestVideo)
        ->with('content',$content);
}

public function hometest1()
{
$slider = Slider::where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
$officer =DB::table('appointments')->where('status','Active')->where('isDeleted','N')->orderBy('position','asc')->get();
$content = DB::table('top_content')->where('isDeleted', 'N')->orderBy('position','asc')->get(); 
$news_i = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '1')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news_h = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '2')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '3')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '4')
        ->where('language', 'English')
        ->orderBy('created_at', 'desc')
        ->get();
$news_w = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '6')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
$news_pr = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '5')
        ->where('language', 'English')
        ->orderBy('created_at', 'desc')
        ->get();
  
  $latestPhotos = DB::table('photos')
        ->orderBy('id', 'desc')
        ->take(4)
        ->get();
  $latestVideo = DB::table('videos')
        ->orderBy('id', 'desc')
        ->first();
  $category = DB::table('image_category')
    ->where('isDeleted', 'N')->orderBy('id', 'desc')->where('isDeleted', 'N')->get();
 
  return view('frontend.index2')
        ->with('slider',$slider)
        ->with('officer',$officer)
        ->with('news_i',$news_i)
        ->with('news_h',$news_h)
        ->with('news_w',$news_w)
        ->with('news_pr',$news_pr)
        ->with('news_n',$news_n)
        ->with('category', $category)
        ->with('news',$news)
    	->with('latestPhotos',$latestPhotos)
        ->with('latestVideo',$latestVideo)
        ->with('content',$content);
}


public function index($cat)
{
    
    $scontent=DB::table('budget')
              ->where('category',$cat)
              ->where('isDeleted','N')
              ->orderBy('id','desc')
              ->get();
    
    return view('frontend.site_content')->with('scontent',$scontent)->with('cat_name',$cat);
}
  
public function StaffList($id,$cat){
        
        $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
        $menu = DB::table('menus')
        ->where('isDeleted', 'N')
        ->orderBy('position', 'ASC')
        ->get();
      $submenu = DB::table('submenus')
        ->where('isDeleted', 'N')->get();
      $childmenu = DB::table('childmenus')
        ->where('isDeleted', 'N')->get();
      $staffcat = DB::table('staff_cat')
       ->join('staffcontent','staff_cat.id','=','staffcontent.childmenu')
        ->where('staff_cat.submenu', $id)
        ->where('staff_cat.isDeleted', 'N')
       ->where('staffcontent.status','Active')
      ->where('staffcontent.isDeleted','N')
       ->select('staff_cat.*')
        ->orderBy('staff_cat.position')
        ->distinct()
        ->get();
      $staffcontent = DB::table('staffcontent')
        ->where('submenu', $id)
        ->where('status', 'Active')
        ->where('isDeleted', 'N')
        ->orderBy('position','ASC')
        ->get();
      $staffarea = DB::table('area_master')
        ->where('isDeleted', 'N')
        ->get();
     
        return view('frontend.department_staff_list')->with('news_n',$news_n)->with('staffarea',$staffarea)->with('cat',$cat)->with('staffcontent',$staffcontent)->with('staffcat',$staffcat)->with('menu',$menu)->with('submenu',$submenu)->with('childmenu',$childmenu);
    }
  
public function StaffProfile($id,$cat){
        
        $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
      $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
        $menu = DB::table('menus')
        ->where('isDeleted', 'N')->orderBy('position', 'ASC')->get();
      $submenu = DB::table('submenus')
        ->where('isDeleted', 'N')->get();
      $childmenu = DB::table('childmenus')
        ->where('isDeleted', 'N')->get();
      $staffcat = DB::table('profile_master')
        ->where('isDeleted', 'N')->orderby('position')->get();
      $staffcontent1 = DB::table('staffcontent')
        ->where('id', $id)
        ->where('isDeleted', 'N')->first();
      $staffcontent = DB::table('profile_content')
        ->where('staff_id', $id)
        ->where('lang','English')
        ->where('isDeleted', 'N')->get();
     
        
        return view('frontend.department_staff_profile')->with('news_n',$news_n)->with('fslider',$fslider)->with('cat',$cat)->with('staffcontent1',$staffcontent1)->with('staffcontent',$staffcontent)->with('staffcat',$staffcat)->with('menu',$menu)->with('submenu',$submenu)->with('childmenu',$childmenu);
    }

// introduction 
public function Introduction()
{
    return view('frontend.introduction');
}

public function urban_service_request()
{
    return view('frontend.urban_service_request');
}
// Technic 
public function Technic()
{
    return view('frontend.technic');
}

// qualitycontrol 
public function qualitycontrol()
{
    return view('frontend.quality_control');
}

// registeredproducers 
public function registeredproducers()
{
    $registerp=DB::table('location')
               ->where('isDeleted','N')
               ->orderBy('id','desc')
               ->get();
    return view('frontend.registered_producers')->with('cat_name',$registerp);
}



// rabikharif 
public function rabikharif($location_id)
{
    $rabisterp=DB::table('course_type')
            ->where('isDeleted','N')
            ->get();
    return view('frontend.rabi_kharif')->with('rabisterp',$rabisterp)->with('location_id',$location_id);

}

// finalrabi 
public function finalrabi(Request $request)
{

    $rabggterp=DB::table('course')
            ->where('location_id',$request->location_id)
            ->where('course_type',$request->id)
            ->where('isDeleted','N')
            ->get();

    return view('frontend.final_rabi')->with('rabggterp',$rabggterp);
}



     
// formerdata 
public function formerdata()
{
    $registerp=DB::table('location')
                ->where('isDeleted','N')
                ->orderBy('id','desc')
                ->get();
    return view('frontend.farmer-data')->with('cat_name',$registerp);
}

// rabikharif 
 public function getdata($location_id)
 {
     $rabisterp=DB::table('course_type')
                ->where('isDeleted','N')
                ->get();
     return view('frontend.farmerget-data')->with('rabisterp',$rabisterp)->with('location_id',$location_id);

 }


// finalrabi 
public function finalgetdata(Request $request)
{

    $rabggterp=DB::table('farmerdata')
                ->where('location_id',$request->location_id)
                ->where('course_type',$request->id)
                ->where('isDeleted','N')
                ->get();

    return view('frontend.finalget-data')->with('rabggterp',$rabggterp);
}

// rolling 
public function rolling()
{
    return view('frontend.rolling_page');
        
}


    // roll data  
public function roll($dataname)
{

    $radddbggterp=DB::table('seed_plan')
    ->where('cat',$dataname)
    ->orderBy('id','desc')
    ->get();

return view('frontend.rolling_data')->with('rabdsggterp',$radddbggterp);
       
 }


//  feedback  submit
public function feedbacksubmit(Request $request)
{
   $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|max:255',
    'mobile' => 'required|string|max:20',
    'feedback' => 'required|string',
]);
    $data = new Feedback;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->mobile = $request->mobile;
    $data->feedback = $request->feedback;
    $data->save();
    return redirect()->back()->with('message','Feedback Subbmited Successfully !'); 
}


      
    //  feedback 
public function links()
{

    return view('frontend.links');
    
 }

public function actsRules()
{
    return view('frontend.page');
    
 }

public function gallery()
{
  	$menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
    $photos = DB::table('photos')->orderBy('id', 'desc')->get();
    $category = DB::table('image_category')
    ->where('isDeleted', 'N')->orderBy('id', 'desc')->where('isDeleted', 'N')->get();
    return view('frontend.gallery')
      ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
      ->with('photos', $photos)
      ->with('category', $category);
}

public function viewgallery($id,$cat)
{
  	$imgcate ="Independence Day 15.08.2023";
    $photos = DB::table('photos')->where('category', $id)->orderBy('id', 'desc')->get();
    $category = DB::table('image_category')
    ->where('isDeleted', 'N')->where('id', $id)->where('isDeleted', 'N')->first();
    return view('frontend.gallery_view')->with('photos', $photos)->with('category', $category)->with('imgcate', $imgcate);
}


public function img($id)
{
 	$photos = DB::table('photos')->where('category', $id)->orderBy('id', 'desc')->get();
    return response()->json($photos);
}
  
public function getpositiondata($id, $pos)
{
 	$data = DB::table('staffcontent')->where('childmenu', $id)->where('position', $pos)->orderBy('id', 'desc')->get();
    return response()->json($data);
}
public function getprofilepositiondata($id)
{
 	$data = DB::table('profile_master')->where('position', $id)->where('isDeleted', 'N')->orderBy('id', 'desc')->get();
    return response()->json($data);
}


 public function video()
 {
   $menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
     $videos = DB::table('videos')->where('isDeleted','N')->orderBy('id', 'desc')->get();
     return view('frontend.video')
       ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
       ->with('videos', $videos);
     
  }

 //Hindi

 public function hindi()
 {
     return view('hindi.index');
     
  }

public function childmenuPage($menu, $submenu, $childmenu, $name = null)
{
  
 
   	$menu2 = DB::table('menus')->where('id', $menu)->where('isDeleted', 'N')->first()->menu_name ;
	$submenu2 = DB::table('submenus')->where('id', $submenu)->where('isDeleted', 'N')->first()->sub_name ;
  $childmenu2 = DB::table('childmenus')->where('id', $childmenu)->where('isDeleted', 'N')->first()->child_menu ;
  $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
  $page_id = $menu2;
    $sitecontents = DB::table('sitecontents')
        ->where('main_cat', $menu)
        ->where('sub_cat', $submenu)
        ->where('child_cat', $childmenu)
		->where('language', 'English')
      ->where('isDeleted', 'N')
		->orderBy('id','desc')
      
        ->first();
  
  $menus = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();

    return view('frontend.about')
        ->with('sitecontents', $sitecontents)
        ->with('fslider', $fslider)
        ->with('submenu2', $submenu2)
      	->with('page_id', $page_id)
      	->with('main_cat', $menu)
        ->with('menu2', $menu2)
        ->with('menu', $menus)
      ->with('news_n', $news_n)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}
public function submenuPage($menu, $submenu, $name = null)
{
    // Fetch menu and submenu names
    $menuRecord = DB::table('menus')
        ->where('id', $menu)
        ->where('isDeleted', 'N')
        ->first();

    $submenuRecord = DB::table('submenus')
        ->where('id', $submenu)
        ->where('isDeleted', 'N')
        ->first();

    if (!$menuRecord || !$submenuRecord) {
        abort(404); // or handle gracefully
    }

    $menuName = $menuRecord->menu_name;
    $submenuName = $submenuRecord->sub_name;

    $page_id = $menuName;

    // Get the main content
    $sitecontents = DB::table('sitecontents')
        ->where('main_cat', $menu)
        ->where('sub_cat', $submenu)
        ->where('language', 'English')
        ->where('isDeleted', 'N')
        ->orderBy('id', 'desc')
        ->first();

    // Load global menu data
    $menus = DB::table('menus')->where('isDeleted', 'N')->orderBy('position', 'ASC')->get();
    $submenus = DB::table('submenus')->where('isDeleted', 'N')->get();
    $childmenus = DB::table('childmenus')->where('isDeleted', 'N')->get();
    $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
    // Latest news
    $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();

    // Submenu area
    $submenu_area = DB::table('submenus')
        ->where('id', $submenu)
        ->where('isDeleted', 'N')
        ->first();

    // Staff data - correctly interpolating submenu name
    $area = DB::table('area_master')
    ->where('area', 'like', '%' . $submenu_area->sub_name . '%')
    ->first();
    if($area){
    $staff_area = DB::table('staffcontent as s')
    ->join('area_master as a', DB::raw("FIND_IN_SET(a.id, s.area)"), '>', DB::raw('0'))
    ->select('s.*', 'a.area as area_name', 'a.area_head')
    ->whereRaw("FIND_IN_SET(?, s.area)", [$area->id])
    ->where('s.submenu', '!=', 113)
    ->where('a.id', '=', $area->id)
    ->where('s.status','Active')
    ->where('s.isDeleted', 'N')
    ->orderByRaw("CASE WHEN s.id = a.area_head THEN 0 ELSE 1 END") 
    ->orderBy('s.area_position') // then by position
    ->get();

   // dd($staff_area);
    $tech_staff_area = DB::table('staffcontent as s')
        ->join('area_master as a', DB::raw("FIND_IN_SET(a.id, s.area)"), '>', DB::raw('0'))
        ->select('s.*', 'a.area as area_name', 'a.area_head')
        ->whereRaw("FIND_IN_SET(?, s.area)", [$area->id])
        ->where('s.submenu', '=', 113)
        ->where('a.id', '=', $area->id)
        ->where('s.status','Active')
        ->where('s.isDeleted', 'N')
        ->orderByRaw("CASE WHEN s.id = a.area_head THEN 0 ELSE 1 END") 
        ->orderBy('s.area_position')
        ->get();

    }else{
      $staff_area = '';
      $tech_staff_area = '';
    }
    if($submenu == 88 || $submenu == 89){
    return view('frontend.about_prj', [
        'sitecontents' => $sitecontents,
        'submenu2' => $submenuName,
        'page_id' => $page_id,
        'fslider' => $fslider,
        'main_cat' => $menu,
        'menu2' => $menuName,
        'menu' => $menus,
        'submenu' => $submenus,
        'childmenu' => $childmenus,
        'news_n' => $news_n,
        'staff_area' => $staff_area,
        'tech_staff_area' => $tech_staff_area,
    ]);
    }else{
    return view('frontend.about', [
        'sitecontents' => $sitecontents,
        'submenu2' => $submenuName,
        'page_id' => $page_id,
        'fslider' => $fslider,
        'main_cat' => $menu,
        'menu2' => $menuName,
        'menu' => $menus,
        'submenu' => $submenus,
        'childmenu' => $childmenus,
        'news_n' => $news_n,
        'staff_area' => $staff_area,
        'tech_staff_area' => $tech_staff_area,
    ]);
   }
}


public function menuPage($menu, $name = null)
{
    $menu2 = DB::table('menus')->where('id', $menu)->where('isDeleted', 'N')->first()->menu_name ;
   $sitecontents = DB::table('sitecontents')
        ->where('main_cat', $menu)
        ->where('language', 'English')
        ->where('sub_cat', NULL)
        ->first();
  $menus = DB::table('menus')
    ->where('isDeleted', 'N')->orderBy('position', 'ASC')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
  $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
  
    return view('frontend.about')
            ->with('sitecontents', $sitecontents)
            ->with('fslider', $fslider)
            ->with('menu2', $menu2)
            ->with('menu', $menus)
            ->with('main_cat', $menu)
           ->with('news_n', $news_n)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}

public function read_data($id)
{
    $result = DB::table('directory_master')
        ->where('category', $id)
        ->where('language', 'English')
        ->where('status', '1')
      	->orderBy('id', 'asc')
        ->get();
    return response()->json($result);

}


public function read_map($id)
{
    $menu = 24;
    $submenu = 65;
    
    $category11 = DB::table('directory_category_master')
    ->where('id', $id)
        ->where('language', 'English')
        ->first();
    $name = $category11->name;
    
   	$menu2 = DB::table('menus')->where('id', $menu)->where('isDeleted', 'N')->first()->menu_name ;
	$submenu2 = DB::table('submenus')->where('id', $submenu)->where('isDeleted', 'N')->first()->sub_name ;
  
  $page_id = $menu2;
    $sitecontents = DB::table('sitecontents')
        ->where('main_cat', $menu)
        ->where('sub_cat', $submenu)
		->where('language', 'English')
      ->where('isDeleted', 'N')
		->orderBy('id','desc')
      
        ->get();
    $directorymaster = DB::table('directory_master')
        ->where('category', $id)
        ->where('language', 'English')
        ->where('status', '1')
        ->orderBy('id', 'desc')
        ->get();
        
    $category = DB::table('directory_category_master')
        ->where('language', 'English')
        ->get();
    return view('frontend.page')
        ->with('sitecontents', $sitecontents)
        ->with('directorymaster', $directorymaster)
        ->with('category', $category)
        ->with('submenu', $submenu2)
      	->with('page_id', $page_id)
      	->with('main_cat', $menu)
      	->with('name', $name)
        ->with('menu', $menu2);
}


public function officeOrders()
{
    $currentYear = now()->year;
    $order = DB::table('order_master')
        ->where('language', 'English')
        ->whereYear('created_at', $currentYear)
        ->orderBy('id', 'desc')
        ->get();
    return view('frontend.office-orders')->with('order', $order);
        
}

public function officeOrdersArchive()
{
  $currentYear = now()->year;
  $orders = DB::table('order_master')
    ->where('language', 'English')
    ->whereYear('created_at', '<>', $currentYear)
    ->orderBy('id', 'desc')
    ->get();
  return view('frontend.office-orders-archive')->with('order', $orders);
}

public function news($id)
{
	$currentYear = now()->year;
    $section = DB::table('section_master')
                ->where('id', $id)
                ->first();
if($id == 3){
    $news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', $id)
		->whereYear('created_at', $currentYear)
        ->orderBy('id', 'desc')
        ->paginate(20);
} else {
	 $news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', $id)
        ->orderBy('id', 'desc')
        ->paginate(20);
}
    return view('frontend.news')->with('news',$news)->with('section',$section);
}
public function newsen($id)
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderBy('position', 'ASC')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
  $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
	$news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();
    $news_detail = DB::table('pagecontents')
        ->where('slug', $id)
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();

    return view('frontend.newslink')
      ->with('menu', $menu)
       ->with('fslider', $fslider)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
      ->with('news_detail',$news_detail)
      ->with('news_n',$news_n);
}
public function searchCandidate(Request $request)
{
    $query = $request->query('query');

    $data = DB::table('admit_card')
        ->where('application_no', 'LIKE', "%{$query}%")
        ->orWhere('candidate_name', 'LIKE', "%{$query}%")
        ->limit(10)
        ->get(['candidate_name', 'application_no']);

    return response()->json($data);
}

// Admit Card
public function searchCandidateNew(Request $request)
{
    
    $query = $request->query('query');

    $data = DB::table('admit_card_nw')
        ->where('application_no', 'LIKE', "%{$query}%")
        ->orWhere('candidate_name', 'LIKE', "%{$query}%")
        ->limit(10)
        ->get(['candidate_name', 'application_no']);

    return response()->json($data);
}

public function ListExams()
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
	$news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();
    
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
  $test = DB::table('test_cat')
        ->where('isDeleted', 'N')
        ->orderBy('id', 'desc')
        
        ->get();

    return view('frontend.list_exams')
      ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
       ->with('test', $test)
      ->with('news_n',$news_n);
}
public function ListExamsAdmitCard($id,$cat)
{
    
    
    $menu = DB::table('menus')
        ->where('isDeleted', 'N')
        ->orderby('position')
        ->get();

    $submenu = DB::table('submenus')
        ->where('isDeleted', 'N')
        ->get();

    $childmenu = DB::table('childmenus')
        ->where('isDeleted', 'N')
        ->get();

    $news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();

    $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();

    $test = DB::table('test_cat')
        ->where('isDeleted', 'N')
        ->orderBy('id', 'desc')
        ->get();

    /* Selected Exam */
    $exam = DB::table('test_cat')
        ->where('id',$id)
        ->where('isDeleted','N')
        ->first();

    return view('frontend.admitCardForm')
        ->with('menu',$menu)
        ->with('submenu',$submenu)
        ->with('childmenu',$childmenu)
        ->with('test',$test)
        ->with('exam',$exam)   // new
        ->with('test_id',$id)
        ->with('news_n',$news_n);
}

public function news_archive()
{
	$currentYear = now()->year;
    $section = DB::table('section_master')
                ->where('id', 3)
                ->first();
    $news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', 3)
		->whereYear('created_at', '<>', $currentYear)
        ->orderBy('id', 'desc')
        ->paginate(20);
	$status = "Archive";
    return view('frontend.news')
		->with('news',$news)
		->with('status',$status)
		->with('section',$section);
}
public function OrganisationStructure()
{
    return view('frontend.Organisation-Structure');
}
public function electrical_accident()
{
    return view('frontend.electrical-accident');
}

public function consumer_forms()
{
    return view('frontend.consumer-forms');
}



public function tenders_notice()
{
  
   $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();

$department_master = DB::table('department_master')
              ->get(); 
  $category_master = DB::table('category_master')
              ->orderBy('name', 'asc')
              ->get(); 
  $tender_master = DB::table('tender_master')->select('tender_master.*','category_master.name as cat_name')
              ->join('category_master','category_master.id','=','tender_master.category')
              ->orderBy('id', 'desc')
              ->where('opening_date', '>=', date('Y-m-d'))
              ->get();
  $tender_masterf = DB::table('tender_master')->select('tender_master.*','category_master.name as cat_name')
              ->join('category_master','category_master.id','=','tender_master.category')
              ->orderBy('id', 'desc')
              ->where('po_status', '=', 1)
              ->get();
  $tender_masterar = DB::table('tender_master')->select('tender_master.*','category_master.name as cat_name')
    ->join('category_master','category_master.id','=','tender_master.category')
  ->orderBy('id', 'desc')
  ->where('opening_date', '<', date('Y-m-d'))
  ->get();
  $annplan = DB::table('annfile')
  ->orderBy('id', 'desc')
  ->where('isDeleted', '=', 'N')
  ->get();
  $extra_list = DB::table('listing_master')
  ->orderBy('id')
  ->get();

      return view('frontend.tenders-notice')
             ->with('menu', $menu)
              ->with('submenu', $submenu)
              ->with('childmenu', $childmenu)
              ->with('department_master', $department_master)
              ->with('category_master', $category_master)
              ->with('tender_masterf', $tender_masterf)
              ->with('tender_masterar', $tender_masterar)
              ->with('annplan', $annplan)
              ->with('extra_list', $extra_list)
        	  ->with('tender_master', $tender_master);
}

public function tender_notice_archive()
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();

$department_master = DB::table('department_master')
              ->get(); 
$category_master = DB::table('category_master')
  ->orderBy('name', 'asc')
             	->get(); 
$tender_master = DB::table('tender_master')
  ->orderBy('id', 'desc')
  ->where('opening_date', '<', date('Y-m-d'))
  ->get();

return view('frontend.tender-notice-archive')
  ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
  ->with('department_master', $department_master)
  ->with('category_master', $category_master)
  ->with('tender_master', $tender_master);

}
  
public function RecruitmentNotice()
{
  
   $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();


  $recruit_type = DB::table('recruit_type')
              ->orderBy('id')
              ->get();

      return view('frontend.recruit_type')
             ->with('menu', $menu)
              ->with('submenu', $submenu)
              ->with('childmenu', $childmenu)
        	  ->with('recruit_type', $recruit_type);
}

// Admit Card

 public function SearchAdmitCard(Request $request)
	{
		
		$reg=$request->get('reg');
		$dob=$request->get('dob');

		$port_data=DB::table('admit_card_nw')->where(DB::raw("DATE_FORMAT(date_of_birth, '%Y-%m-%d')"), $dob)
								->where('application_no', $reg)
								->get(); 
                if($port_data->isNotEmpty()){
                 DB::table('admit_card_nw')->where('application_no', $reg)->update(array('login' => '1'));
                }
		
		echo $port_data;
	}
  public function SearchAdmitCardTemp(Request $request)
	{
		
		$reg=$request->get('reg');
		$dob=$request->get('dob');

		$port_data=DB::table('admit_card')->where(DB::raw("DATE_FORMAT(date_of_birth, '%Y-%m-%d')"), $dob)
								->where('application_no', $reg)
								->get(); 
                if($port_data->isNotEmpty()){
                 DB::table('admit_card')->where('application_no', $reg)->update(array('login' => '1'));
                }
		
		echo $port_data;
	}
public function downloadAdmitCard1($roll_no)
{
    // Update download status
    DB::table('admit_card')
        ->where('application_no', $roll_no)
        ->update(['download' => '1']);
    $check = DB::table('admit_card')
        ->where('application_no', $roll_no)->first();
    // File path
    $filePath = public_path('Final_Advt_012024_JHT_and_SO_Admitcards_for/' . $check->roll_no . '.pdf');

    // Check file exists
    if (!file_exists($filePath)) {
        return abort(404, 'File not found');
    }

    // Return file for download
    return response()->file($filePath);
}

  public function ListExamsAdmitCardTemp()
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
	$news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();
    
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
  $test = DB::table('test_cat')
        ->where('isDeleted', 'N')
        ->orderBy('id', 'desc')
        
        ->get();

    return view('frontend.admitCardFormTemp')
      ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
      ->with('test', '')
      ->with('test_id', '')
      ->with('news_n',$news_n);
}
public function ListExamsAdmitCardTemp1()
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
	$news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();
    
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
  $test = DB::table('test_cat')
        ->where('isDeleted', 'N')
        ->orderBy('id', 'desc')
        
        ->get();

    return view('frontend.admitCardFormTemp')
      ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
      ->with('test', '')
      ->with('test_id', '')
      ->with('news_n',$news_n);
} 
public function ListExamsAdmitCardTemp2()
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
	$news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();
    
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
  $test = DB::table('test_cat')
        ->where('isDeleted', 'N')
        ->orderBy('id', 'desc')
        
        ->get();

    return view('frontend.admitCardFormTemp')
      ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
      ->with('test', '')
      ->with('test_id', '')
      ->with('news_n',$news_n);
} 

// Admit Card
public function downloadAdmitCard2($reg)
{

    DB::table('admit_card_nw')
        ->where('application_no', $reg)
        ->update(['download' => '1']);

    $port_data = DB::table('admit_card_nw')
        ->where('application_no', $reg)
        ->first();

    if(!$port_data){
        abort(404);
    }

    $test_cat = DB::table('test_cat')
        ->where('id', $port_data->test_id)
        ->where('isDeleted', 'N')
        ->first();

    $exam_paper = DB::table('exam_paper')
        ->where('test_id', $port_data->test_id)
        ->orderBy('id')
        ->get();

    /*
    Get Admit Card Format
    */
    $format = DB::table('candidate_excel_collection')
                ->where('test_id',$port_data->test_id)
                ->value('format');

    /*
    Format based view loading
    (Currently all formats using same view)
    */

    if($format == 1){
        $view = 'frontend.printAdmitCard';
    }
    elseif($format == 2){
        $view = 'frontend.printAdmitCard';
    }
    elseif($format == 3){
        $view = 'frontend.printAdmitCard';
    }
    else{
        $view = 'frontend.printAdmitCard';
    }

    return view($view, compact('port_data','test_cat','exam_paper','format'));

}
  public function GuestHouseBooking()
	{
		 $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
        $menu = DB::table('menus')
          ->where('isDeleted', 'N')->get();
        $submenu = DB::table('submenus')
          ->where('isDeleted', 'N')->get();
        $childmenu = DB::table('childmenus')
          ->where('isDeleted', 'N')->get();
  
        $org_data=DB::table('organizations')
          ->where('isDeleted', 'N')
		  ->get(); 
  
        //dd($port_data);
		
		return view('frontend.guest_book_form')->with('org', $org_data)
          ->with('menu', $menu)
          ->with('submenu', $submenu)
          ->with('childmenu', $childmenu)
          ->with('news_n', $news_n);
	}

public function bill_calculator()
{
    return view('frontend.bill-calculator');
}

public function calculateBilling(Request $request)
{
// dd($request->toArray()); // Uncomment for debugging purposes

$request->validate([
    'tarrif' => 'required',
    'supply_type' => 'required',
    'from_date' => 'required|date',
    'to_date' => 'required|date',
    'load' => 'required|numeric',
    'current_month_reading' => 'required|numeric',
    'previous_month_reading' => 'required|numeric',
]);

$tarrif = $request->tarrif;
$supply_type = $request->supply_type;
$from_date = $request->from_date;
$to_date = $request->to_date;
$load = $request->load;
$current_month_reading = $request->current_month_reading;
$previous_month_reading = $request->previous_month_reading;

if ($tarrif == "LMV 1") {
    $supply_type = "ST10";
} else {
    $supply_type = "ST20";
}

$from_date = explode("-", $from_date);
$from_date = $from_date[2] . "-" . $from_date[1] . "-" . $from_date[0];
$to_date = explode("-", $to_date);
$to_date = $to_date[2] . "-" . $to_date[1] . "-" . $to_date[0];
$ts1 = strtotime($from_date);
$ts2 = strtotime($to_date);
$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);
$month1 = date('m', $ts1);
$month2 = date('m', $ts2);
$total_month = (($year2 - $year1) * 12) + ($month2 - $month1);
$total_unit = $current_month_reading - $previous_month_reading;

$fixed_charge_val = 0;
$ed_charge_val = 0;
$slab = 0;

if ($supply_type == "ST10") {
    if ($load <= 1 && $total_unit <= 100) {
        $slab = 3.00;
        $fixed_charge_val = 50;
        $ed_charge_val = 5;
    } else {
        if ($total_unit <= 150) {
            $slab = 5.50;
        } else if ($total_unit > 150 && $total_unit <= 300) {
            $slab = 6.00;
        } else if ($total_unit > 300 && $total_unit <= 500) {
            $slab = 6.50;
        } else if ($total_unit > 500) {
            $slab = 7.00;
        }
        $fixed_charge_val = 110;
        $ed_charge_val = 5;
    }
}

if ($supply_type == "ST20") {
    if ($total_unit <= 300) {
        $slab = 7.50;
    } else if ($total_unit > 300 && $total_unit <= 1000) {
        $slab = 8.40;
    } else if ($total_unit > 1000) {
        $slab = 8.75;
    }

    if ($load <= 2) {
        $fixed_charge_val = 330;
    } else if ($load > 2 && $load <= 4) {
        $fixed_charge_val = 390;
    } else if ($total_unit > 4) {
        $fixed_charge_val = 450;
    }

    $ed_charge_val = 7.50;
}

$total_fixed_charge = $fixed_charge_val * $load * $total_month;
$total_energy_charge = $slab * $total_unit;
$total_ed_charge = (($total_fixed_charge + $total_energy_charge) * $ed_charge_val) / 100;
$total_rsc_charge = (($total_fixed_charge + $total_energy_charge) * 0) / 100;
$total_charges = $total_fixed_charge + $total_energy_charge + $total_ed_charge + $total_rsc_charge;

if ($from_date != "") {
    $from_date = explode("-", $from_date);
    $from_date = $from_date[2] . "-" . $from_date[1] . "-" . $from_date[0];
}

if ($to_date != "") {
    $to_date = explode("-", $to_date);
    $to_date = $to_date[2] . "-" . $to_date[1] . "-" . $to_date[0];
}

return redirect('bill-calculator')
  	->with('total_month', $total_month)
	->with('total_unit', $total_unit)
  	->with('total_energy_charge', $total_energy_charge)
    ->with('total_fixed_charge', $total_fixed_charge)
    ->with('total_ed_charge', $total_ed_charge)
    ->with('total_rsc_charge', $total_rsc_charge)
    ->with('total_charges', $total_charges)
  	->with('previous_month_reading', $previous_month_reading)
	->with('current_month_reading', $current_month_reading)
  	->with('load', $load)
    ->with('to_date', $to_date)
    ->with('from_date', $from_date)
    ->with('supply_type', $supply_type)
    ->with('tarrif', $tarrif);
}




public function theftassessmentcalculator()
{

    return view('frontend.theft-assessment-calculator');
}

public function assessment_calculator(Request $request)
{

//dd($request->toArray());
 
 $request->validate([
    'nirdharit_load' => 'required|numeric',
    'awadhi_mahino_mai' => 'required|numeric',
    'vidyut_aapurti' => 'required|numeric',
    'load_factor' => 'required',
    'area_type' => 'required', 
]);
 
 
 
   $nirdharit_load = $request->nirdharit_load;
   $awadhi_mahino_mai = $request->awadhi_mahino_mai;
   $vidyut_aapurti = $request->vidyut_aapurti;
   $load_factor = $request->load_factor;
   $area_type = $request->area_type;
 
 if($load_factor=="A")
{
    $load_factor_val=0.30;
}

if($load_factor=="B")
{
    $load_factor_val=0.50;
}

if($load_factor=="C")
{
    $load_factor_val=0.50;
}

if($load_factor=="D")
{
    $load_factor_val=0.75;
}

if($load_factor=="E")
{
    $load_factor_val=0.30;
}

if($load_factor=="F")
{
    $load_factor_val= 0.50;
}

$nirdharit_ikai=$nirdharit_load*$load_factor_val*($awadhi_mahino_mai*30)*$vidyut_aapurti;

if($area_type=="Domestic")
{
    if($nirdharit_ikai>(150*$awadhi_mahino_mai))
    {
        $slab1=150*5.5*$awadhi_mahino_mai;
    }
    else
    {
        $slab1=$nirdharit_ikai*5.5;
    }

    if($nirdharit_ikai>(300*$awadhi_mahino_mai))
    {
        $slab2=150*$awadhi_mahino_mai*6;
    }
    else
    {
        if($nirdharit_ikai>(150*$awadhi_mahino_mai))
        {
            $slab2=($nirdharit_ikai-(150*$awadhi_mahino_mai))*6;
        }
        else
        {
            $slab2=0;
        }
    }


    if($nirdharit_ikai>(500*$awadhi_mahino_mai))
    {
        $slab3=200*$awadhi_mahino_mai*6.5;
    }
    else
    {
        if($nirdharit_ikai>(300*$awadhi_mahino_mai))
        {
            $slab3=($nirdharit_ikai-(300*$awadhi_mahino_mai))*6.5;
        }
        else
        {
            $slab3=0;
        }
    }


    if($nirdharit_ikai>(500*$awadhi_mahino_mai))
    {
        $slab4=($nirdharit_ikai-(500*$awadhi_mahino_mai))*7;
    }
    else
    {
        $slab4=0;
    }
}


if($area_type=="Commercial")
{
    if($nirdharit_ikai>(300*$awadhi_mahino_mai))
    {
        $slab1=300*7.5*$awadhi_mahino_mai;
    }
    else
    {
        $slab1=$nirdharit_ikai*7.5;
    }

    if($nirdharit_ikai>(1000*$awadhi_mahino_mai))
    {
        $slab2=700*$awadhi_mahino_mai*8.4;
    }
    else
    {
        if($nirdharit_ikai>(300*$awadhi_mahino_mai))
        {
            $slab2=($nirdharit_ikai-300)*8.4;
        }
        else
        {
            $slab2=0;
        }
    }


    if($nirdharit_ikai>(1000*$awadhi_mahino_mai))
    {
        $slab3=($nirdharit_ikai-(1000*$awadhi_mahino_mai))*8.75;
    }
    else
    {
        $slab3=0;
    }

    $slab4=0;
}

$slab5=$slab1+$slab2+$slab3+$slab4;
$slab6=$slab5*2;
$nirdharan_dhanrashi=$slab6*1.075;
 
return redirect('theft-assessment-calculator')
	->with('nirdharit_ikai', $nirdharit_ikai)
	->with('nirdharan_dhanrashi', $nirdharan_dhanrashi)
  
  	->with('nirdharit_load', $nirdharit_load)
    ->with('awadhi_mahino_mai', $awadhi_mahino_mai)
    ->with('vidyut_aapurti', $vidyut_aapurti)
    ->with('load_factor', $load_factor)
    ->with('area_type', $area_type);


}

public function estimate_calculator()
{

$loadmaster = DB::table('load_range_master')
              ->get(); 
$areamaster = DB::table('area_type_master')
              ->get(); 
$linemaster = DB::table('line_installation_option_master')
              ->get();
    return view('frontend.estimate-calculator')
      				->with('loadmaster', $loadmaster)
      				->with('areamaster', $areamaster)
      				->with('linemaster', $linemaster);
}


public function estimateCalculator(Request $request)
{
    

//dd($request->toArray());

   $load_range = $request->load_range;
   $length_of_overhead_line = $request->length_of_overhead_line;
   $length_of_underground_line = $request->length_of_underground_line;
   $line_installation_option = $request->line_installation_option;
   $area_type = $request->area_type;

	$total_length_of_line=$length_of_overhead_line+$length_of_underground_line;

      

$overhead_rate_sel = DB::table('rate_master')
  ->orderBy('id', 'desc')
  ->where('line_installation_id', $line_installation_option)
  ->where('area_id', $area_type)
  ->where('load_id', $load_range)
  ->where('category_id', '1')
  ->first();

	$overhead_rate=$overhead_rate_sel->rate;
    $overhead_applicant_percentage=$overhead_rate_sel->applicant_percentage;

       

 $underground_rate_sel = DB::table('rate_master')
  ->orderBy('id', 'desc')
  ->where('line_installation_id', $line_installation_option)
  ->where('area_id', $area_type)
  ->where('load_id', $load_range)
  ->where('category_id', '2')
  ->first();

$underground_rate = $underground_rate_sel->rate;
$underground_applicant_percentage = $underground_rate_sel->applicant_percentage;

$cost_of_overhead_line=$overhead_rate*$length_of_overhead_line;
$cost_of_underground_line=$underground_rate*$length_of_underground_line;
$total_estimate_licensee_exclusive_gst=$cost_of_overhead_line+$cost_of_underground_line;
$gst=($total_estimate_licensee_exclusive_gst*18)/100;
$total_estimate_licensee_inclusive_gst=$total_estimate_licensee_exclusive_gst+$gst;
$total_estimate_applicant_exclusive_gst=($total_estimate_licensee_exclusive_gst*$underground_applicant_percentage)/100;
$total_estimate_applicant_inclusive_gst=$gst+$total_estimate_applicant_exclusive_gst;


return redirect('estimate-calculator')
	->with('cost_of_overhead_line', $cost_of_overhead_line)
	->with('cost_of_underground_line', $cost_of_underground_line)
  	->with('total_estimate_licensee_exclusive_gst', $total_estimate_licensee_exclusive_gst)
    ->with('total_estimate_licensee_inclusive_gst', $total_estimate_licensee_inclusive_gst)
    ->with('total_estimate_applicant_exclusive_gst', $total_estimate_applicant_exclusive_gst)
    ->with('gst', $gst)
    ->with('total_estimate_applicant_inclusive_gst', $total_estimate_applicant_inclusive_gst)
 	->with('area_type', $area_type)
    ->with('line_installation_option', $line_installation_option)
    ->with('length_of_underground_line', $length_of_underground_line)
    ->with('length_of_overhead_line', $length_of_overhead_line)
    ->with('load_range', $load_range);
  }


public function copyright_policy()
{

    return view('frontend.copyright-policy');
}

public function hyperlink_policy()
{

    return view('frontend.hyperlink-policy');
}

public function privacy_policy()
{
    return view('frontend.privacy-policy');
}

public function terms_condition()
{
    return view('frontend.terms-condition');
}

public function security_policy()
{
    return view('frontend.security-policy');
}

public function accessibility_statement()
{
    return view('frontend.accessibility-statement');
}

public function disclaimer()
{
    return view('frontend.disclaimer');
}

public function help()
{
    return view('frontend.help');
}

public function screen_reader_access()
{
    return view('frontend.screen-reader-access');
}

public function feedback()
{
    return view('frontend.feedback');
}

public function download_forms()
{
    return view('frontend.download-forms');
}


public function faq()
{
    return view('frontend.faq');
}
public function CyberSecurity()
{
    return view('frontend.cyber_security');
}
public function rti()
{
    return view('frontend.rti');
}

public function sitemap()
{
    $menu = DB::table('menus')
    ->where('isDeleted', 'N')->orderby('position')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
	$news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->orderBy('id', 'desc')
        ->first();
    return view('frontend.sitemap')
       ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}

public function about()
{
    return view('frontend.about');
}



public function prepaid_meter_recharge()
{
return view('frontend.prepaid-meter-recharge');
}

public function consumer_grievance()
{
return view('frontend.consumer-grievance');
}


public function ImportantLink()
{
	$news_i = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '1')
        ->orderBy('created_at', 'desc')
        ->get();
    return view('frontend.ImportantLink')->with('news_i', $news_i);
}
public function Highlights()
{
 	$news_h = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'English')
        ->where('section', '2')
        ->orderBy('created_at', 'desc')
        ->get();
    return view('frontend.Highlights')->with('news_h', $news_h);
}
public function NewsNotifications($cat)
{
    $menu = DB::table('menus')
    ->where('isDeleted', 'N')
    ->orderBy('position', 'ASC')
    ->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
  if($cat == 'WhatsNew'){
    $news_n = DB::table('news_master')
        ->where('status', '1')
       // ->where('document_language', 'English')
        ->where('section', 6)
        ->orderBy('id', 'desc')
        ->get();
   // dd($news_n);
  }elseif($cat == 'NbriNews'){
    $news_n = DB::table('news_master')
        ->where('status', '1')
      //  ->where('document_language', 'English')
        ->where('section', 5)
        ->orderBy('id', 'desc')
        ->get();
  }else{
	$news_n = DB::table('news_master')
        ->where('status', '1')
      //  ->where('document_language', 'English')
        ->where('section', 3)
        ->orderBy('created_at', 'desc')
        ->get();
  }
    return view('frontend.NewsNotifications')
      ->with('menu', $menu)
      ->with('submenu', $submenu)
      ->with('childmenu', $childmenu)
      ->with('news_n', $news_n);
}
  



public function tarrif_order()
{
    return view('frontend.tarrif-order');
}

public function phone_directory($id)
{
     $new_directory = DB::table('office_hierarchy')
                ->where('category', $id)
                ->get();
    return view('frontend.phone-directory')->with('new_directory', $new_directory)->with('name', $id);
}
public function phone_geographic($id)
{
     $new_directory = DB::table('office_geographic')
                ->where('district', $id)
                ->get();
    return view('frontend.office_geographic')->with('new_directory', $new_directory)->with('name', $id);
}



}
