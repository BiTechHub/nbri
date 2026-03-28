<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

use DB;

use App\Models\Feedback;

class HindiController extends Controller
{

public function actsRules()
{
return view('hindi.Acts-Rules');

}

public function urban_service_request()
{
    return view('hindi.urban_service_request');
}

public function hindi()
{
$slider = Slider::where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
$officer =DB::table('appointments')->where('status','Active')->where('isDeleted','N')->orderBy('position','asc')->get();

$news_i = DB::table('news_master')
    ->where('status', '1')
    ->where('language', 'Hindi')
    ->where('section', '1')
    ->orderBy('created_at', 'desc')
    ->limit(3)
    ->get();
$news_h = DB::table('news_master')
    ->where('status', '1')
    ->where('language', 'Hindi')
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
$news_w = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '6')
        ->orderBy('id', 'desc')
        ->limit(5)
        ->get();
    
$latestupdates = DB::table('news_master')
    ->where('status', '1')
    ->where('language', 'Hindi')
    ->where('section', '4')
    ->orderBy('created_at', 'desc')
    ->get();
  $news_pr = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '5')
//        ->where('language', 'Hindi')
        ->orderBy('created_at', 'desc')
        ->get();
$fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();  
$news = DB::table('news_master')
->where('status', '1')
->where('language', 'Hindi')
->where('section', '4')
->orderBy('created_at', 'desc')
->get();
$latestPhotos = DB::table('photos')
->orderBy('id', 'desc')
->take(4)
->get();
$latestVideo = DB::table('videos')
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
    ->where('lang', 'Hindi')->get();

return view('hindi.index')
    ->with('slider',$slider)
    ->with('officer',$officer)
    ->with('fslider',$fslider)
    ->with('maincontent',$maincontent)
    ->with('news_i',$news_i)
    ->with('news_h',$news_h)
    ->with('news_n',$news_n)
    ->with('news_w',$news_w)
    ->with('news_pr',$news_pr)
    ->with('news',$news)
    ->with('menu', $menu)
    ->with('submenu', $submenu)
    ->with('quicklinks', $quicklinks)
    ->with('childmenu', $childmenu)
    ->with('latestPhotos',$latestPhotos)
    ->with('latestVideo',$latestVideo);
}
  
public function childmenuPagehi($menu, $submenu, $childmenu, $name = null)
{
  
 
   	$menu2 = DB::table('menus')->where('id', $menu)->where('isDeleted', 'N')->first()->menu_hi ;
	$submenu2 = DB::table('submenus')->where('id', $submenu)->where('isDeleted', 'N')->first()->submenu_hi ;
  $childmenu2 = DB::table('childmenus')->where('id', $childmenu)->where('isDeleted', 'N')->first()->childmenu_hi ;
  $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
  $page_id = $menu2;
    $sitecontents = DB::table('sitecontents')
        ->where('main_cat', $menu)
        ->where('sub_cat', $submenu)
        ->where('child_cat', $childmenu)
		->where('language', 'Hindi')
      ->where('isDeleted', 'N')
		->orderBy('id','desc')
      
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

    return view('hindi.about')
        ->with('sitecontents', $sitecontents)
        
        ->with('submenu2', $submenu2)
      	->with('page_id', $page_id)
      	->with('main_cat', $menu)
        ->with('menu2', $menu2)
        ->with('menu', $menus)
        ->with('fslider',$fslider)
      ->with('news_n', $news_n)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}
public function submenuPagehi($menu, $submenu, $name = null)
{
  
 $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
   	$menu2 = DB::table('menus')->where('id', $menu)->where('isDeleted', 'N')->first()->menu_name ;
	$submenu2 = DB::table('submenus')->where('id', $submenu)->where('isDeleted', 'N')->first()->sub_name ;
  
  $page_id = $menu2;
    $sitecontents = DB::table('sitecontents')
        ->where('main_cat', $menu)
        ->where('sub_cat', $submenu)
		->where('language', 'Hindi')
      ->where('isDeleted', 'N')
		->orderBy('id','desc')
      
        ->first();
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
    ->where('s.status','Active')
    ->where('a.id', $area->id)
    ->where('s.isDeleted', 'N')
    ->orderByRaw("CASE WHEN s.id = a.area_head THEN 0 ELSE 1 END") 
    ->orderBy('s.area_position') // then by position
    ->get();

    $tech_staff_area = DB::table('staffcontent as s')
        ->join('area_master as a', DB::raw("FIND_IN_SET(a.id, s.area)"), '>', DB::raw('0'))
        ->select('s.*', 'a.area as area_name', 'a.area_head')
        ->whereRaw("FIND_IN_SET(?, s.area)", [$area->id])
        ->where('s.submenu', '=', 113)
        ->where('s.status','Active')
        ->where('a.id', $area->id)
        ->where('s.isDeleted', 'N')
        ->orderByRaw("CASE WHEN s.id = a.area_head THEN 0 ELSE 1 END") 
        ->orderBy('s.area_position')
        ->get();
     }else{
      $staff_area = '';
      $tech_staff_area = '';
    }
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
   
    if($submenu_area->id == 88 || $submenu_area->id == 89){
    return view('hindi.about_prj')
        ->with('sitecontents', $sitecontents)
        ->with('tech_staff_area', $tech_staff_area)
        ->with('submenu2', $submenu2)
      	->with('page_id', $page_id)
      	->with('main_cat', $menu)
        ->with('fslider',$fslider)
        ->with('menu2', $menu2)
        ->with('menu', $menus)
      ->with('staff_area', $staff_area)
      ->with('news_n', $news_n)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
    }else{
    return view('hindi.about')
        ->with('sitecontents', $sitecontents)
        ->with('tech_staff_area', $tech_staff_area)
        ->with('submenu2', $submenu2)
      	->with('page_id', $page_id)
      	->with('main_cat', $menu)
        ->with('fslider',$fslider)
        ->with('menu2', $menu2)
        ->with('menu', $menus)
      ->with('staff_area', $staff_area)
      ->with('news_n', $news_n)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
    }
}
  
public function StaffList($id,$cat){
        
        $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
        $menu = DB::table('menus')
        ->where('isDeleted', 'N')->orderBy('position', 'ASC')->get();
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
       $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
        return view('hindi.department_staff_list')->with('fslider',$fslider)->with('news_n',$news_n)->with('staffarea',$staffarea)->with('cat',$cat)->with('staffcontent',$staffcontent)->with('staffcat',$staffcat)->with('menu',$menu)->with('submenu',$submenu)->with('childmenu',$childmenu);
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

      return view('hindi.recruit_type')
             ->with('menu', $menu)
              ->with('submenu', $submenu)
              ->with('childmenu', $childmenu)
        	  ->with('recruit_type', $recruit_type);
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
        ->where('isDeleted', 'N')
        ->where('archived', 'N')
        ->where('recruit_type', $id)
        ->orderBy('id', 'desc')
        ->get();

    $advt = DB::table('recruitment')
        ->where('rec_type', $id)
        ->where('isDeleted', 'N')
        ->orderBy('position', 'desc')
        ->get();

    $list = DB::table('listing_master_recruit')->get();

    return view('hindi.recruitment', compact(
        'advt_no',
        'advt',
        'list',
        'menu',
        'submenu',
        'childmenu'
    ));
}
  
public function StaffProfile($id,$cat){
  
       
        $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
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
        ->where('lang','Hindi')
        ->where('isDeleted', 'N')->get();
     $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->orderBy('id', 'desc')->get();
        
        return view('hindi.department_staff_profile')->with('fslider',$fslider)->with('news_n',$news_n)->with('cat',$cat)->with('staffcontent1',$staffcontent1)->with('staffcontent',$staffcontent)->with('staffcat',$staffcat)->with('menu',$menu)->with('submenu',$submenu)->with('childmenu',$childmenu);
    }

public function menuPagehi($menu, $name = null)
{
    $menu2 = DB::table('menus')->where('id', $menu)->where('isDeleted', 'N')->first()->menu_name ;
   $sitecontents = DB::table('sitecontents')
        ->where('main_cat', $menu)
        ->where('language', 'Hindi')
        ->where('sub_cat', NULL)
        ->first();
  $menus = DB::table('menus')
    ->where('isDeleted', 'N')->get();
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
    return view('hindi.about')
            ->with('sitecontents', $sitecontents)
            ->with('menu2', $menu2)
            ->with('menu', $menus)
            ->with('fslider',$fslider)
           ->with('main_cat', $menu)
           ->with('news_n', $news_n)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}
  
public function newshi($id)
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
	$news = DB::table('news_master')
        ->where('status', '1')
        ->where('language', 'Hindi')
        ->orderBy('id', 'desc')
        ->first();
    $news_detail = DB::table('pagecontents')
        ->where('slug', $id)
        ->where('language', 'Hindi')
        ->orderBy('id', 'desc')
        ->first();
  $news_n = DB::table('news_master')
        ->where('status', '1')
        ->where('section', '3')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
   $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->get();

    return view('hindi.newslink')
      ->with('menu', $menu)
     ->with('fslider', $fslider)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
      ->with('news_detail',$news_detail)
      ->with('news_n',$news_n);
}

public function officeOrders()
{
$currentYear = now()->year;
$order = DB::table('order_master')
->where('language', 'Hindi')
->whereYear('created_at', $currentYear)
->orderBy('id', 'desc')
->get();
return view('hindi.office-orders')->with('order', $order);

}
public function officeOrdersArchive()
{
$currentYear = now()->year;

$orders = DB::table('order_master')
->where('language', 'Hindi')
->whereYear('created_at', '<>', $currentYear)
->orderBy('id', 'desc')
->get();
return view('hindi.office-orders-archive')->with('order', $orders);
}

public function gallery()
{
$menu = DB::table('menus')
    ->where('isDeleted', 'N')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
$photos = DB::table('photos')->orderBy('id', 'desc')->get();
$category = DB::table('image_category')->orderBy('id', 'desc')->where('isDeleted', 'N')->get();
return view('hindi.gallery')
  ->with('photos', $photos)
  ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
  ->with('category', $category);
}

public function img($id)
{
$photos = DB::table('photos')->where('category', $id)->orderBy('id', 'desc')->get();
return response()->json($photos);
}


public function video()
{
  $menu = DB::table('menus')
    ->where('isDeleted', 'N')->get();
  $submenu = DB::table('submenus')
    ->where('isDeleted', 'N')->get();
  $childmenu = DB::table('childmenus')
    ->where('isDeleted', 'N')->get();
$videos = DB::table('videos')->orderBy('id', 'desc')->get();
return view('hindi.video')
  ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu)
  ->with('videos', $videos);

}

public function submenuPage($menu, $submenu, $name = null)
{

$menu2 = DB::table('menus')->where('id', $menu)->where('isDeleted', 'N')->first()->menu_name ;
$submenu2 = DB::table('submenus')->where('id', $submenu)->where('isDeleted', 'N')->first()->sub_name ;

$menus_h = DB::table('menus')
->where('id', $menu)
->first();
$sub_menus = DB::table('submenus')
->where('id', $submenu)
->first();

$sitecontents = DB::table('sitecontents')
->where('main_cat', $menu)
->where('sub_cat', $submenu)
->where('language', 'Hindi')
->where('isDeleted', 'N')
->orderBy('id','desc')
->get();
$directorymaster = DB::table('directory_master')
->where('language', 'Hindi')
->where('status', '1')
->orderBy('id', 'desc')
->get();
$category = DB::table('directory_category_master')
->where('language', 'Hindi')
->get();

return view('hindi.page')
->with('sitecontents', $sitecontents)
->with('directorymaster', $directorymaster)
->with('category', $category)
->with('submenu', $submenu2)
  ->with('sub_menus', $sub_menus)
->with('menus_h', $menus_h)
->with('menu', $menu2);
}

public function menuPage($menu, $name = null)
{
return view('hindi.page');
}


public function OrganisationStructure()
{
return view('hindi.Organisation-Structure');
}
public function electrical_accident()
{
return view('hindi.electrical-accident');
}

public function consumer_forms()
{
return view('hindi.consumer-forms');
}

public function read_data($id)
{
$result = DB::table('directory_master')
->where('category', $id)
->where('language', 'Hindi')
->where('status', '1')
->orderBy('id', 'asc')
->get();
return response()->json($result);

}



public function copyright_policy()
{

return view('hindi.copyright-policy');
}

public function hyperlink_policy()
{

return view('hindi.hyperlink-policy');
}

public function privacy_policy()
{
return view('hindi.privacy-policy');
}

public function terms_condition()
{
return view('hindi.terms-condition');
}

public function security_policy()
{
return view('hindi.security-policy');
}

public function accessibility_statement()
{
return view('hindi.accessibility-statement');
}

public function disclaimer()
{
return view('hindi.disclaimer');
}

public function help()
{
return view('hindi.help');
}

public function screen_reader_access()
{
return view('hindi.screen-reader-access');
}

public function feedback()
{
return view('hindi.feedback');
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
    return view('hindi.sitemap')
       ->with('menu', $menu)
        ->with('submenu', $submenu)
        ->with('childmenu', $childmenu);
}

public function download_forms()
{
return view('hindi.download_forms');
}

public function faq()
{
return view('hindi.faq');
}

public function bill_calculator()
{
$lang='hindi';
return view('frontend.bill-calculator')->with('lang',$lang);
}


public function about()
{
return view('hindi.about');
}

public function prepaid_meter_recharge()
{
    return view('hindi.prepaid-meter-recharge');
}
public function ImportantLink()
{
$news_i = DB::table('news_master')
->where('status', '1')
->where('language', 'Hindi')
->where('section', '1')
->orderBy('created_at', 'desc')
->get();
return view('frontend.ImportantLink')->with('news_i', $news_i);
}
public function Highlights()
{
$news_h = DB::table('news_master')
->where('status', '1')
->where('language', 'Hindi')
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
       // ->where('document_language', 'Hindi')
        ->where('section', 6)
        ->orderBy('id', 'desc')
        ->get();
   // dd($news_n);
  }elseif($cat == 'NbriNews'){
    $news_n = DB::table('news_master')
        ->where('status', '1')
        //->where('document_language', 'Hindi')
        ->where('section', 5)
        ->orderBy('id', 'desc')
        ->get();
  }else{
	$news_n = DB::table('news_master')
        ->where('status', '1')
       // ->where('document_language', 'Hindi')
        ->where('section', 3)
        ->orderBy('created_at', 'desc')
        ->get();
  }
    return view('hindi.NewsNotifications')
      ->with('menu', $menu)
      ->with('submenu', $submenu)
      ->with('childmenu', $childmenu)
      ->with('news_n', $news_n);
}


public function tarrif_order()
{
return view('hindi.tarrif-order');
}



}
