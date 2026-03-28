<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\Photo;
use App\Models\Teacher;
use App\Models\Submenu;
use App\Models\Menu;
use App\Models\Sitecontent;
use App\Models\Appointment;
use App\Models\Childmenu;
use App\Models\Image_category;
use App\Models\Staffmenu;
use Intervention\Image\Laravel\Facades\Image;
use DB;
use Session;
use Redirect;
use Validator;

class PhotoController extends Controller
{
public function uploadslider(Request $request){
    $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:8048'
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Slider',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
  
  
       $image = $request->image;
       $heading = $request->input('heading');
       $extenstion = $image->getClientOriginalExtension();
       $imageName = time().'.'.$extenstion;
       $image->move(public_path('uploads'), $imageName);
        //$destinationPath = 'public/uploads/';
        //$new_img = Image::make($image->path())->resize(1420, 420);
        //$imageName = time().'.'.$request->image->extension();
        //$new_img->save($destinationPath . $imageName, 80);
       $save = new Slider;
       $save->heading = $heading;
	   $save->heading_hi = $request->heading_hi;
       $save->image = $imageName;
       $save->save();

       return redirect('admin-panel/slider')->with('status', 'Image Has been uploaded');

   }
  public function uploadfooterslider(Request $request){
    $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:8048',
        'heading' => [
        'required',
        'string',
       // 'max:255',
        function ($attribute, $value, $fail) {
            if (stripos($value, '<script') !== false) {
                $fail('The '.$attribute.' contains invalid HTML.');
            }
        },
    ],
    'heading_hi' => [
        'required',
        'string',
       // 'max:255',
        function ($attribute, $value, $fail) {
            if (stripos($value, '<script') !== false) {
                $fail('The '.$attribute.' contains invalid HTML.');
            }
        },
    ],
    'link' => [
        'required',
        'string',
       // 'max:255',
        function ($attribute, $value, $fail) {
            if (stripos($value, '<script') !== false) {
                $fail('The '.$attribute.' contains invalid HTML.');
            }
        },
    ],
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Footer Slider',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
  
  
       $image = $request->image;
       $heading = $request->input('heading');
       $extenstion = $image->getClientOriginalExtension();
       $imageName = time().'.'.$extenstion;
       $image->move(public_path('uploads/footerslider'), $imageName);
        //$destinationPath = 'public/uploads/';
        //$new_img = Image::make($image->path())->resize(1420, 420);
        //$imageName = time().'.'.$request->image->extension();
        //$new_img->save($destinationPath . $imageName, 80);
    
       DB::table('footerslider')->insert(array('heading' => $heading, 'heading_hi' => $request->heading_hi, 'title' => $request->link, 'image' => $imageName));
       

       return redirect()->back()->with('status', 'Image Has been uploaded');

   }


public function uploadpagebanner(Request $request)
{
    $validatedData = $request->validate([
        'color' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048'
    ]);

    // Logged user
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
    $ip = $request->ip();

    // Log the action
    DB::table('action_logs')->insert([
        'ip_address'  => $ip,
        'action_type' => 'Upload Page Banner',
        'created_at'  => now(),
        'updated_at'  => now(),
        'created_by'  => session('Loggeduser'),
        'user_id'     => session('Loggeduser'),
        'user_name'   => $data['LoggeduserInfo']->username
    ]);

    // File handling
    $image = $request->file('image');
    $extension = $image->getClientOriginalExtension();
    $imageName = time() . '.' . $extension;

    // Base path
    $basePath = public_path('uploads/PageBanner');

    // Ensure base/original dirs exist
    if (!file_exists($basePath . '/original')) {
        mkdir($basePath . '/original', 0777, true);
    }

    // Move original
    $originalPath = $basePath . '/original/' . $imageName;
    $image->move($basePath . '/original', $imageName);

    // Resize to responsive sizes
    $sizes = [480, 768, 1024, 1366, 1920, 2560];
    $savedSizes = [];

    foreach ($sizes as $size) {
        $resizePath = $basePath . '/' . $size;

        if (!file_exists($resizePath)) {
            mkdir($resizePath, 0777, true);
        }

        $resizedFile = $resizePath . '/' . $imageName;

        
        $resized = Image::read($originalPath)
            ->scale(width: $size)   // keep aspect ratio
            ->save($resizedFile, quality: 90);

        $savedSizes[$size] = "uploads/PageBanner/{$size}/{$imageName}";
    }

    // Save in pagebanner table
    DB::table('pagebanner')->insert([
        'images'      => "uploads/PageBanner/original/" . $imageName,
        'sizes'       => json_encode($savedSizes),
        'title_color' => $request->color,
    ]);

    return redirect()->back()->with('status', 'Image has been uploaded & resized successfully');
}

  public function uploadprofilemaster(Request $request){
    $validatedData = $request->validate([
        'heading' => 'required',
        'heading_hi' => 'required',
        'position' => 'required'
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Profile Master',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'name' => $request->heading,
      'name_hi' => $request->heading_hi
      );
      
      DB::table('profile_master')->insert($data);

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
  public function uploadstaffarea(Request $request){
    $validatedData = $request->validate([
        'area' => 'required',
        'area_hi' => 'required',
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Staff Area Master',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'area' => $request->area,
      'area_hi' => $request->area_hi
      );
      
      DB::table('area_master')->insert($data);

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
  public function uploadAddNewGardenCategory(Request $request){
    $validatedData = $request->validate([
        'cat' => 'required',
        'cat_hi' => 'required',
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Garden Category Master',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'cat' => $request->cat,
      'cat_hi' => $request->cat_hi
      );
      
      DB::table('plantcat_master')->insert($data);

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
  public function uploadAddGardenAudioCategory(Request $request){
    $validatedData = $request->validate([
        'cat' => 'required',
        'cat_hi' => 'required',
        'audio_lang' => 'required',
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Garden Category Master',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'cat' => $request->cat,
      'cat_hi' => $request->cat_hi,
      'audio_lang' => $request->audio_lang
      );
      
      DB::table('audiocat_master')->insert($data);

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
  public function uploadGuestRoomMaster(Request $request){
    $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
       // 'no_rooms' => 'required',
     // 'avai_room' => 'required'
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Room Master '.$request->get('name'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'name' => $request->name,
      'name_hi' => $request->name_hi,
     // 'no_of_room' => $request->no_rooms,
     // 'avai_room' => $request->avai_room,
      'created_by' => session('Loggeduser'),
      );
      
      DB::table('guestroom_master')->insert($data);

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
  public function uploadAddGuestRoom(Request $request){
    $validatedData = $request->validate([
        'room_name' => 'required',
        'room_no' => 'required',
        'bed_no' => 'required',
      'floor' => 'required'
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload New Guest Room '.$request->get('room_name').'-'.$request->get('room_no'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
       
  
      $data = array(
      'room_name' => $request->room_name,
      'room_no' => $request->room_no,
      'bed_no' => $request->bed_no,
      'floor' => $request->floor,
      'created_by' => session('Loggeduser'),
      );
      
      $room_id = DB::table('room_master')->insertGetId($data);
    
      for($i=1;$i<=$request->bed_no;$i++){
         $b = 'Bed-'.$i;
         DB::table('bed_master')->insert(array('room_id' => $room_id, 'bed' => $b));
     
       }

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
  public function update_AddGuestRoom(Request $request){
    $validatedData = $request->validate([
        'room_name' => 'required',
        'room_no' => 'required',
     //   'bed_no' => 'required',
      'floor' => 'required'
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Old Guest Room '.$request->get('room_name').'-'.$request->get('room_no'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
     
      $data = array(
      'room_name' => $request->room_name,
      'room_no' => $request->room_no,
     // 'bed_no' => $request->bed_no,
      'floor' => $request->floor,
      'created_by' => session('Loggeduser'),
      );
      
      DB::table('room_master')->where('id', $request->id)->update($data);

       return redirect()->back()->with('status', 'Content Updated Successfully..');

   }
  public function uploadguestcategory(Request $request){
    $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Guest Category '.$request->get('name'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'name' => $request->name,
      'name_hi' => $request->name_hi,
      'created_by' => session('Loggeduser'),
      );
      
      DB::table('guest_category')->insert($data);

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
  public function uploadOrganizationMaster(Request $request){
    $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Organization '.$request->get('name'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'organization' => $request->name,
      'organization_hi' => $request->name_hi,
      'created_by' => session('Loggeduser'),
      );
      
      DB::table('organizations')->insert($data);

       return redirect()->back()->with('status', 'Content Inserted Successfully..');

   }
   
   public function uploadpdf(Request $request){
    $validatedData = $request->validate([
        'pdf' => 'required|mimes:pdf,xlsx,zip,doc,docx,jpg,jpeg,png|max:50480',
        'title' => 'required|string|max:255', 
    ]);

    if ($request->file('pdf')) {
        $file = $request->file('pdf');
        //$fileName = time().'_'.$file->getClientOriginalName();
        $fileName = time().'.'.$file->extension();
        $filePath = $request->pdf->move(public_path('uploads/pdf_file'), $fileName);
        $order = DB::table('pdf_file')->insert([
            'title' => $request->input('title'),
            'url' => $fileName,
            'created_by' => session('Loggeduser'),
        ]);
    }

    return redirect('admin-panel/addpdf')->with('status', 'PDF Has been uploaded');
}
   public function AddAdvertisementDetail(Request $request)
      {
          // Common required validation
          $request->validate([
              'title_en' => 'required|string|max:255',
              'title_hi' => 'required|string|max:255',
              'rec_type' => 'required|string|max:100',
              'advt_no' => 'required|string|max:100',
              'con_type' => 'required|in:pdf,link,none',
          ]);

          if ($request->con_type == 'pdf') {
              $request->validate([
                  'pdf_file' => 'required|file|mimes:pdf,xlsx,zip,doc,docx,jpg,jpeg,png|max:50480',
              ]);

              $file = $request->file('pdf_file');
              $fileName = time().'.'.$file->getClientOriginalExtension();
              $file->move(public_path('uploads/RecruitmentFile'), $fileName);

              DB::table('recruitment')->insert([
                  'rec_type'    => $request->rec_type,
                  'con_type'    => $request->con_type,
                  'advt_no'     => $request->advt_no,
                  'title_en'    => $request->title_en,
                  'title_hi'    => $request->title_hi,
                  'file'        => $fileName,
                  'created_by'  => session('Loggeduser'),
              ]);

          } elseif ($request->con_type == 'link') {
              $request->validate([
                  'link' => 'required|url|max:1000',
              ]);

              DB::table('recruitment')->insert([
                  'rec_type'    => $request->rec_type,
                  'con_type'    => $request->con_type,
                  'advt_no'     => $request->advt_no,
                  'title_en'    => $request->title_en,
                  'title_hi'    => $request->title_hi,
                  'link'        => $request->link,
                  'created_by'  => session('Loggeduser'),
              ]);
          } elseif ($request->con_type == 'none') {
              

              DB::table('recruitment')->insert([
                  'rec_type'    => $request->rec_type,
                  'con_type'    => $request->con_type,
                  'advt_no'     => $request->advt_no,
                  'title_en'    => $request->title_en,
                  'title_hi'    => $request->title_hi,
                  'created_by'  => session('Loggeduser'),
              ]);
          }

          return redirect()->back()->with('status', 'Content has been uploaded successfully.');
      }
  public function updateRecruitDetail(Request $request)
      {
          // Common required validation
          $request->validate([
              'title_en' => 'required|string|max:255',
              'title_hi' => 'required|string|max:255',
            
          ]);

              DB::table('recruitment')->where('id', $request->user_id)->update([
                 
                  'title_en'    => $request->title_en,
                  'title_hi'    => $request->title_hi,
                  'updated_by'  => session('Loggeduser'),
                  'updated_at'  => date('Y-m-d h:i:s'),
              ]);

         

          return redirect()->back()->with('status', 'Content has been updated successfully.');
      }

  public function UploadAnnualProcurementPlan(Request $request){
    $validatedData = $request->validate([
        'pdf' => 'required|mimes:pdf,xlsx,zip,doc,docx,jpg,jpeg,png|max:50480',
        'title' => 'required|string|max:255', 
    ]);

    if ($request->file('pdf')) {
        $file = $request->file('pdf');
        //$fileName = time().'_'.$file->getClientOriginalName();
        $fileName = time().'.'.$file->extension();
        $filePath = $request->pdf->move(public_path('uploads/AnnualProcurementPlan'), $fileName);
        $order = DB::table('annfile')->insert([
            'title' => $request->input('title'),
            'url' => $fileName,
            'created_by' => session('Loggeduser'),
        ]);
    }

    return redirect()->back()->with('status', 'Annual Procurement Plan Has been uploaded');
}
  public function UpdateAnnualProcurementPlan(Request $request){
    $validatedData = $request->validate([
        'title' => 'required|string|max:255', 
    ]);

    if ($request->file('file')) {
        $validatedData = $request->validate([
        'file' => 'required|mimes:pdf,xlsx,zip,doc,docx,jpg,jpeg,png|max:50480',
       ]);
         
        $file = $request->file('file');
        //$fileName = time().'_'.$file->getClientOriginalName();
        $fileName = time().'.'.$file->extension();
        $filePath = $request->file->move(public_path('uploads/AnnualProcurementPlan'), $fileName);
        $order = DB::table('annfile')->where('id', $request->get('user_id'))->update([
            'title' => $request->input('title'),
            'url' => $fileName,
            'updated_by' => session('Loggeduser'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
    }else{
      $order = DB::table('annfile')->where('id', $request->get('user_id'))->update([
            'title' => $request->input('title'),
            'updated_by' => session('Loggeduser'),
            'updated_at' => date('Y-m-d h:i:s'),
          ]);
    }

    return redirect()->back()->with('status', 'Annual Procurement Plan Has been updated.');
}

   public function uploadofficers(Request $request){
    $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
        'deg' => 'required',
        'deg_hi' => 'required',
        'position' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:8048'

       ]);
       
     $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Officers',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
     
     
     
     
       $image = $request->image;
       $name = $request->input('name');
       $deg = $request->input('deg');
       $position = $request->input('position');
       
       $swrn = Appointment::where('position',$position)->where('isDeleted','N')->first();
       if($swrn){
           return redirect()->back()->with('status','Officers Placing Position is already Selected for any other Officer. Please Select any Other Position.');
       }
       
       $imageName = time().'.'.$request->image->extension();
       $request->image->move(public_path('uploads'), $imageName);
     
       $save = new Appointment;
       $save->name = $name;
       $save->name_hi = $request->name_hi;
       $save->deg = $deg;
       $save->deg_hi = $request->deg_hi;
       $save->position = $position;
       $save->image = $imageName;
       $save->save();

       return redirect('admin-panel/officers')->with('status', 'Content Has been uploaded successfully.');

   }
  public function uploadquicklinks(Request $request){
    $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
        'deg' => 'required',
        'deg_hi' => 'required',
        'position' => 'required',
       

       ]);
       
     $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Uploaded New Quick Link' . $request->get('name'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
     
     
     
     
      
       $name = $request->input('name');
       $deg = $request->input('deg');
       $position = $request->input('position');
       
       $swrn = DB::table('quicklinks')->where('position',$position)->where('isDeleted','N')->first();
       if($swrn){
           return redirect()->back()->with('status','Link Placing Position is already Selected for any other Link. Please Select any Other Position.');
       }
     
       $data = array(
      'name' => $request->name,
      'name_hi' => $request->name_hi,
      'deg' => $request->deg,
       'deg_hi' => $request->deg_hi,
      'position' => $request->position,
       'created_at' => date('Y-m-d h:i:s'),
      'created_by' => session('Loggeduser'),
      );
      
      DB::table('quicklinks')->insert($data);

       return redirect()->back()->with('status', 'Content Has been uploaded successfully.');

   }
   public function uploadteacher(Request $request){
    $validatedData = $request->validate([
        'name' => 'required',
        'deg' => 'required',
       ]);

    $save = new Teacher;
    $save->name = $request->input('name');
    $save->subject = $request->input('deg');
    $save->save();
    return redirect('admin-panel/softwares')->with('status', 'Data Has been uploaded');
   }

   public function uploadmenu(Request $request){
    $validatedData = $request->validate([
        'menu' => 'required',
        'menu_hi' => 'required',
        'position' => 'required',
        'havesub' => 'required',
       ]);
     if($request->input('havesub') == 'No'){
       $validatedData = $request->validate([
        'menu_type' => 'required',
       ]);
     }
     $checkPosition = Menu::where('position', $request->input('position'))->where('isDeleted','N')->first();
     
     if($checkPosition){
      return redirect('admin-panel/addmenu')->with('status', 'Menu Position Not Available.');  
     }
     
     $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Menu',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
       if($request->input('havesub') == 'No'){
        $save = new Menu;
        $save->menu_name = $request->input('menu');
        $save->menu_hi = $request->input('menu_hi');
        $save->position = $request->input('position');
        $save->havesub = $request->input('havesub');
        $save->menu_type = $request->input('menu_type');
        $save->link = $request->input('link');
        $save->save();
        return redirect('admin-panel/addmenu')->with('status', 'Menu Has been uploaded');
     }else{
        $save = new Menu;
        $save->menu_name = $request->input('menu');
        $save->menu_hi = $request->input('menu_hi');
        $save->position = $request->input('position');
        $save->havesub = $request->input('havesub');
        $save->save();
        return redirect('admin-panel/addmenu')->with('status', 'Menu Has been uploaded'); 
       }
       

   }


public function update_menu(Request $request){
    $validatedData = $request->validate([
        'menu' => 'required',
        'menu_hi' => 'required',
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Menu',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);


       $save = Menu::where('id', $request->user_id)->first();
       $save->menu_name = $request->input('menu');
       $save->menu_hi = $request->input('menu_hi');
       $save->save();
       return redirect('admin-panel/addmenu')->with('status', 'Menu Has been uploaded');

   }
   public function update_childmenu(Request $request){
    $validatedData = $request->validate([
        'childmenu' => 'required',
        'childmenu_hi' => 'required',
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update ChildMenu',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);


       $save = DB::table('childmenus')->where('id', $request->user_id)->first();
       DB::table('childmenus')->where('id', $request->user_id)->update(array('child_menu'=>$request->input('childmenu'),'childmenu_hi'=>$request->input('childmenu_hi')));
      
       return redirect()->back()->with('status', 'Child Menu Has been uploaded');

   }
  public function update_profilemaster(Request $request){
    $validatedData = $request->validate([
        'heading' => 'required',
        'heading_hi' => 'required',
        'position' => 'required',
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Profile Master',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
      $check = DB::table('profile_master')->where('id', '!=',  $request->id)->where('position', $request->position)->first();
      if($check){
        return back()->with('status', 'Entered Position Already Taken..');
      }
    
      $data = array(
        'name' => $request->heading,
        'name_hi' => $request->heading_hi,
        'position' => $request->position,
      );
    DB::table('profile_master')->where('id', $request->id)->update($data);
       
       return back()->with('status', 'Content Updated Successfully..');

   }
  public function update_staffarea(Request $request){
    $validatedData = $request->validate([
        'area' => 'required',
        'area_hi' => 'required',
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Staff Area',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
     
    
      $data = array(
        'area' => $request->area,
        'area_hi' => $request->area_hi,
      );
    DB::table('area_master')->where('id', $request->id)->update($data);
       
       return back()->with('status', 'Content Updated Successfully..');

   }
   public function update_NewGardenCategory(Request $request){
    $validatedData = $request->validate([
        'cat' => 'required',
        'cat_hi' => 'required',
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Garden Category',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
     
    
      $data = array(
        'cat' => $request->cat,
        'cat_hi' => $request->cat_hi,
      );
    DB::table('plantcat_master')->where('id', $request->id)->update($data);
       
       return back()->with('status', 'Content Updated Successfully..');

   }
  public function update_GardenAudioCategory(Request $request){
    $validatedData = $request->validate([
        'cat' => 'required',
        'cat_hi' => 'required',
        'audio_lang' => 'required',
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Audio Garden Category Category',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
     
    
      $data = array(
        'cat' => $request->cat,
        'cat_hi' => $request->cat_hi,
        'audio_lang' => $request->audio_lang,
      );
    DB::table('audiocat_master')->where('id', $request->id)->update($data);
       
       return back()->with('status', 'Content Updated Successfully..');

   }
  public function update_GuestRoomMaster(Request $request){
   $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
       // 'no_rooms' => 'required',
      
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Room Master '.$request->get('name'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'name' => $request->name,
      'name_hi' => $request->name_hi,
     // 'no_of_room' => $request->no_rooms,
     
      'updated_by' => session('Loggeduser'),
        'updated_at' => date('Y-m-d h:i:s'),
      );
    DB::table('guestroom_master')->where('id', $request->id)->update($data);
       
       return back()->with('status', 'Content Updated Successfully..');

   }
  public function update_guestcategory(Request $request){
   $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
        
      
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Guest Category '.$request->get('name'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'name' => $request->name,
      'name_hi' => $request->name_hi,
     
      'updated_by' => session('Loggeduser'),
        'updated_at' => date('Y-m-d h:i:s'),
      );
    DB::table('guest_category')->where('id', $request->user_id)->update($data);
       
       return back()->with('status', 'Content Updated Successfully..');

   }
  
  public function update_OrganizationMaster(Request $request){
   $validatedData = $request->validate([
        'name' => 'required',
        'name_hi' => 'required',
        
      
       ]);
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Organization '.$request->get('name'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
      $data = array(
      'organization' => $request->name,
      'organization_hi' => $request->name_hi,
     
      'updated_by' => session('Loggeduser'),
        'updated_at' => date('Y-m-d h:i:s'),
      );
    DB::table('organizations')->where('id', $request->user_id)->update($data);
       
       return back()->with('status', 'Content Updated Successfully..');

   }


public function update_submenu(Request $request){
    $validatedData = $request->validate([
        'sub_name' => 'required',
        'submenu_hi' => 'required',
       ]);


	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Menu',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);

       $save = Submenu::where('id', $request->user_id)->first();
       $save->sub_name = $request->input('sub_name');
       $save->submenu_hi = $request->input('submenu_hi');
       $save->save();
       return redirect('admin-panel/addsubmenu')->with('status', 'Sub Menu Has been uploaded');

   }

public function uploadsubmenu(Request $request){
    $validatedData = $request->validate([
        'submenu' => 'required',
        'main_cat' => 'required',
        'submenu_hi' => 'required',
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Submenu',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);


       $save = new Submenu;
       $save->sub_name = $request->input('submenu');
       $save->cat_name = $request->input('main_cat');
       $save->submenu_hi = $request->input('submenu_hi');
       $save->save();
       Menu::where('menu_name',$request->input('main_cat'))->update(array('havesub' => 'Yes'));

       return redirect('admin-panel/addsubmenu')->with('status', 'Data Has been uploaded');

   }
  public function uploadAdvertisement(Request $request){
    $validatedData = $request->validate([
        'advt_no' => 'required',
        'rec_type' => 'required',
       ]);
    
      $checkData = DB::table('advertisement')->where('ad_no', $request->get('advt_no'))->where('recruit_type', $request->get('rec_type'))->where('isDeleted','N')->first();
     if($checkData){
       return redirect()->back()->with('status', 'Advt No. '. $request->get('advt_no') .' Already Added.');
     }

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Insert Advertisement',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);


      $data = array(
      'ad_no' => $request->get('advt_no'),
        'recruit_type' => $request->get('rec_type'),
        'created_by' => session('Loggeduser'),
      );
     DB::table('advertisement')->insert($data);

       return redirect()->back()->with('status', 'Data Has been uploaded');

   }
  public function Addarchive($id){
    
    
      $checkData = DB::table('advertisement')->where('id', $id)->first();
    

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
     // $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => 'NA',
          'action_type' => 'Advertisement '.$checkData->ad_no.' Archived.',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);


      $data = array(
      'archived' => 'Y',
      );
     DB::table('advertisement')->where('id', $id)->update($data);

       return redirect()->back()->with('status', 'Data Has been archived succesfully.');

   }
  public function Backarchive($id){
    
    
      $checkData = DB::table('advertisement')->where('id', $id)->first();
    

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
     // $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => 'NA',
          'action_type' => 'Advertisement '.$checkData->ad_no.' Back To Current.',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);


      $data = array(
      'archived' => 'N',
      );
     DB::table('advertisement')->where('id', $id)->update($data);

       return redirect()->back()->with('status', 'Data Has been sent to current succesfully.');

   }
   public function uploadchildmenu(Request $request){
    $validatedData = $request->validate([
        'sub_menu' => 'required',
        'main_cat' => 'required',
        'childmenu' => 'required',
        'childmenu_hi' => 'required'

       ]);

    $save = new Childmenu;
    $save->submenu = $request->input('sub_menu');
    $save->mainmenu = $request->input('main_cat');
    $save->child_menu = $request->input('childmenu');
    $save->childmenu_hi = $request->input('childmenu_hi');
    $save->save();
    Submenu::where('id',$request->input('sub_menu'))->where('cat_name',$request->input('main_cat'))->update(array('havechild' => 'Yes'));
    return redirect('admin-panel/addchildmenu')->with('status', 'Data Has been uploaded');

   }
public function uploadsitecontent(Request $request){
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Upload Sitecontent',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
  
    if($request->con_type == 'Text'){
    $validatedData = $request->validate([
        'con_type' => 'required',
        'heading' => 'required',
        'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:8048',
        'main' => 'required',
        'content' => 'required',
        'language' => 'required',
       ]);
       $con_type = $request->input('con_type');
       $heading = $request->input('heading');
       $main_cat = $request->input('main');
       $language = $request->input('language');
       $sub_cat = $request->input('sub');
       $child_cat = $request->input('child');
       $content = $request->input('content');
           if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }else{
               $imageName='';
       }

       $save = new Sitecontent;
       $save->heading = $heading;
       $save->main_cat = $main_cat;
       $save->sub_cat = $sub_cat;
       $save->con_type = $con_type;
       $save->child_cat = $child_cat;
       $save->content = $content;
       $save->image = $imageName;
       $save->language = $language;
       $save->save();

       return redirect('admin-panel/addcontent')->with('status', 'Content Has been uploaded');
    }else{
        $validatedData = $request->validate([
            'con_type' => 'required',
            'heading' => 'required',
            'image' => 'required|mimes:pdf|mimetypes:application/pdf|max:55000',
            'main' => 'required',
			'language' => 'required',

           ]);
           $con_type = $request->input('con_type');
           $heading = $request->input('heading');
		   $language = $request->input('language');
           $main_cat = $request->input('main');
           $sub_cat = $request->input('sub');
           $child_cat = $request->input('child');

          
           $bl_file = time().".pdf";
           $destinationPath = public_path('uploads');
           if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
           }
           $request->file('image')->move(
            $destinationPath.'/', $bl_file
           );


           $save = new Sitecontent;
           $save->heading = $heading;
           $save->main_cat = $main_cat;
           $save->sub_cat = $sub_cat;
           $save->con_type = $con_type;
           $save->child_cat = $child_cat;
		   $save->language = $language;
           $save->image = $bl_file;
           $save->save();

           return redirect('admin-panel/addcontent')->with('status', 'Content Has been uploaded');
    }
   }
   
   
public function updatesitecontent(Request $request){
    $validatedData = $request->validate([
        'heading' => 'required',
       ]);

	$data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Sitecontent',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);


       
       $heading = $request->input('heading');
      // $main_cat = $request->input('main');
     //  $sub_cat = $request->input('sub');
       $content = $request->input('content');

       $vij = Sitecontent::where('id', $request->id)->update(array('heading'=>$heading, 'content'=>$content));
      
       return redirect('admin-panel/managesitecontent')->with('status', 'Content Has been updated');
    
  
   }
  
  public function uploadnewpage(Request $request){
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Create New Page '.$request->input('heading'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
  
    $validatedData = $request->validate([
        
        'heading' => 'required',
        'slug' => 'required',
        'content' => 'required',
        
       ]);
      
       $heading = $request->input('heading');
       $slug = $request->input('slug');
       
       $content = $request->input('content');
       $check = DB::table('pagecontents')->where('slug', $slug)->first();    
     
       if($check){
         $random = \Str::random(10);
         $slug = $request->input('slug').'-'.$random;
       }else{
         $slug = $request->input('slug');
       }
      
       for($i=0;$i<=1;$i++){
         
       if($i==0){
        $language='English'; 
       }else{
        $language='Hindi';  
       }  
         
       $data = array(
       'heading' => $heading,
       'slug' => $slug,
       'content' => $content,
       'language' => $language,
       'created_by' => session('Loggeduser')
       );
       DB::table('pagecontents')->insert($data);
       
       }
       

       return redirect('admin-panel/allpages')->with('status', 'Page '.$request->input('heading').' Created Successfully.');
    
   }
  
  public function updatenewpage(Request $request){
  
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Page '.$request->input('heading'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
  
  
    $validatedData = $request->validate([
        
        'heading' => 'required',
        
        'content' => 'required',
        
       ]);
      
       $heading = $request->input('heading');
       
       
       $content = $request->input('content');
      
      
         
       $data = array(
       'heading' => $heading,
       'content' => $content,
       'updated_by' => session('Loggeduser')
       );
       DB::table('pagecontents')->where('id',$request->get('id'))->update($data);
       
       
       

       return redirect('admin-panel/allpages')->with('status', 'Page '.$request->input('heading').' updated Successfully.');
    
   }
  
  public function updatepageelement(Request $request){
     //  dd($request);
  	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Update Page Element '.$request->input('title'),
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);
    $encoded = $request->input('content');
   // $decodedHtml = html_entity_decode(utf8_decode(base64_decode($encoded)));
   // dd($encoded);
    $validatedData = $request->validate([
        
        'heading' => 'required',
        
      //  'content' => 'required', // maybe consider 'nullable|string'
        
       ]);
      
      
       $heading = $request->input('heading');
  
      
     // dd($encoded);
         
       $data = array(
       'title' => $heading,
       'code' => $encoded,
       'updated_by' => session('Loggeduser'),
       'updated_at' => date('Y-m-d h:i:s')
       );
       DB::table('maincontent')->where('id',$request->get('id'))->update($data);
       
       
       

       return redirect()->back()->with('status', 'Page Element '.$request->input('title').' Updated Successfully.');
    
   }
   
 public function subcatfetch($id){
    $data = Submenu::where('cat_name',$id)->where('isDeleted','N')->get();


    return response()->json($data);
}
  
public function fetch_no_bed($id,$cat){
  
    $room_id = $id;
    $check_app = DB::table('applications')->where('id',$cat)->where('isDeleted','N')->first();
    $checkInDate = $check_app->date_of_arrival.' '.$check_app->arrival_time;
    $checkOutDate = $check_app->date_of_departure.' '.$check_app->departure_time;
  
    $data = DB::table('bed_master as b')
    ->join('room_master as r', 'b.room_id', '=', 'r.id')
    ->join('guestroom_master as gr', 'r.room_name', '=', 'gr.id')
    ->where('r.id', $room_id)
    ->whereNotExists(function ($query) use ($checkInDate, $checkOutDate) {
        $query->select(DB::raw(1))
            ->from('bookings as bb')
            ->whereRaw('bb.bed_id = b.bed')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->where('bb.booking_from', '<=', $checkOutDate)
                          ->where('bb.booking_to', '>', $checkInDate);
                })
                ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->where('bb.booking_from', '<', $checkInDate)
                          ->where('bb.booking_to', '>=', $checkOutDate);
                });
            });
    })
    ->select('b.id', 'b.bed')
   
    ->count();
    $data1 = DB::table('bed_master as b')
    ->join('room_master as r', 'b.room_id', '=', 'r.id')
    ->join('guestroom_master as gr', 'r.room_name', '=', 'gr.id')
    ->where('r.id', $room_id)
    ->whereNotExists(function ($query) use ($checkInDate, $checkOutDate) {
        $query->select(DB::raw(1))
            ->from('bookings as bb')
            ->whereRaw('bb.bed_id = b.bed')
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->where('bb.booking_from', '<=', $checkOutDate)
                          ->where('bb.booking_to', '>', $checkInDate);
                })
                ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->where('bb.booking_from', '<', $checkInDate)
                          ->where('bb.booking_to', '>=', $checkOutDate);
                });
            });
    })
    ->select('r.floor')
   
    ->first();
    $response = [
        'response1' => $data,
        'response2' => $data1->floor
    ];

    return response()->json($response);
}
  public function fetch_bed_record($id,$cat){
  
    // Step 1: Get application data
    $check_app = DB::table('applications')
        ->where('id', $cat)
        ->where('isDeleted', 'N')
        ->first();

    if (!$check_app) {
        return response()->json(['error' => 'Application not found.'], 404);
    }

    // Step 2: Create datetime strings
    $checkin = $check_app->date_of_arrival . ' ' . $check_app->arrival_time;
    $checkout = $check_app->date_of_departure . ' ' . $check_app->departure_time;
    
    // Step 2: Get bed IDs booked bed-wise via booking_type = 2
    $bedWiseBookedIds = collect();

    $bedBookings = DB::table('bookings as bk')
        ->join('room_master as r', 'bk.room_no', '=', 'r.id')
       
        ->where('bk.isDeleted', 'N')
       
        ->where('r.id', $id)
        ->where(function ($q) use ($checkin, $checkout) {
            $q->where('bk.booking_from', '<', $checkout)
              ->where('bk.booking_to', '>', $checkin);
        })
        ->get();

    foreach ($bedBookings as $booking) {
        $ids = explode(',', $booking->bed_id);
        foreach ($ids as $bid) {
            $bedWiseBookedIds->push(trim($bid));
        }
    }

    // Step 3: Get available beds in rooms that are not fully booked
    $data = DB::table('bed_master as b')
        ->join('room_master as r', 'b.room_id', '=', 'r.id')
       
        ->where('r.isDeleted', 'N')
        ->where('r.id', $id)
      
        ->whereNotIn('b.id', $bedWiseBookedIds->unique())
        ->select('b.bed','b.id')
       // ->groupBy('room_id')
        ->get();
        

   

   // dd($data);
    return response()->json($data);
    
}
  public function fetch_rooms($id, $cat)
{
    // Step 1: Get application data
    $check_app = DB::table('applications')
        ->where('id', $cat)
        ->where('isDeleted', 'N')
        ->first();

    if (!$check_app) {
        return response()->json(['error' => 'Application not found.'], 404);
    }

    // Step 2: Create datetime strings
    $checkin = $check_app->date_of_arrival . ' ' . $check_app->arrival_time;
    $checkout = $check_app->date_of_departure . ' ' . $check_app->departure_time;
    
    $fullyBookedRoomIds = DB::table('bookings as bk')
    ->join('bed_master as b', DB::raw("FIND_IN_SET(b.id, bk.bed_id)"), '>', DB::raw('0'))
    ->join('room_master as r', 'bk.room_no', '=', 'r.id')
    ->join('guestroom_master as gr', 'gr.id', '=', 'r.room_name') // assuming guestroom name (type) is stored
    ->where('bk.isDeleted', 'N')
    ->where('bk.booking_type', 1)
    ->where('gr.id', $id) // $id is assumed to be guestroom_master.id
    ->where(function ($q) use ($checkin, $checkout) {
        $q->where('bk.booking_from', '<', $checkout)
          ->where('bk.booking_to', '>', $checkin);
    })
    ->pluck('r.id'); // Return fully booked room IDs (not bed room_id)
  // dd($fullyBookedRoomIds->toArray());
    // Step 2: Get bed IDs booked bed-wise via booking_type = 2
    $bedWiseBookedIds = collect();

    $bedBookings = DB::table('bookings as bk')
        ->join('room_master as r', 'bk.room_no', '=', 'r.id')
        ->join('guestroom_master as gr', 'gr.id', '=', 'r.room_name')
        ->where('bk.isDeleted', 'N')
        ->where('bk.booking_type', 2)
        ->where('gr.id', $id)
        ->where(function ($q) use ($checkin, $checkout) {
            $q->where('bk.booking_from', '<', $checkout)
              ->where('bk.booking_to', '>', $checkin);
        })
        ->get();

    foreach ($bedBookings as $booking) {
        $ids = explode(',', $booking->bed_id);
        foreach ($ids as $bid) {
            $bedWiseBookedIds->push(trim($bid));
        }
    }

    // Step 3: Get available beds in rooms that are not fully booked
    $data = DB::table('bed_master as b')
        ->join('room_master as r', 'b.room_id', '=', 'r.id')
        ->join('guestroom_master as gr', 'gr.id', '=', 'r.room_name')
        ->where('r.isDeleted', 'N')
        ->where('r.status', 'Active')
        ->where('gr.id', $id)
        ->whereNotIn('r.id', $fullyBookedRoomIds)
        ->whereNotIn('b.id', $bedWiseBookedIds->unique())
        ->select('r.id as room_id', 'r.room_no')
        ->groupBy('room_id')
        ->get();
        

   

   // dd($data);
    return response()->json($data);
}

public function childcatfetch($id){
    $dataa = Childmenu::where('submenu',$id)->where('isDeleted','N')->get();
    return response()->json($dataa);
}
  
public function staffcatfetch($id){
    $dataa = Staffmenu::where('submenu',$id)->where('isDeleted','N')->get();
    return response()->json($dataa);
}
public function getProfileContent($id, $ln, $st)
{
    // Validate inputs (you can add stricter rules if needed)
    if (!$id || !$ln || !$st) {
        return response()->json([
            'status' => 'ERROR',
            'message' => 'Invalid parameters provided',
            'data' => []
        ], 400);
    }

    try {
        $data = DB::table('profile_content')
            ->select('profile_content.content')
            ->where('staff_id', $st)
            ->where('lang', $ln)
            ->where('pro_cat', $id)
            ->where('isDeleted', 'N')
            ->get();

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Profile content fetched successfully',
            'data' => $data
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'ERROR',
            'message' => 'Something went wrong: ' . $e->getMessage(),
            'data' => []
        ], 500);
    }
}

public function uploadgallery(Request $request){
    $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:12048',
        'category' => 'required'
       ]);

       $title = $request->input('heading');
       $imageName = time().'.'.$request->image->extension();
       $request->image->move(public_path('uploads'), $imageName);

       $save = new Photo;
       $save->title = $title;
       $save->title_hi = $request->heading_hi;
       $save->category = $request->category;
       $save->image = $imageName;
       $save->save();

       return redirect('admin-panel/gallery')->with('status', 'Image Has been uploaded');
}
public function uploadvideo(Request $request){
    $validatedData = $request->validate([
        'link' => 'required',
        'heading' => 'required',
        'heading_hi' => 'required'

       ]);

       $title = $request->input('link');
       $heading = $request->input('heading');
       $heading_hi = $request->input('heading_hi');
       $data = array(
           'video_link' => $title,
           'heading' => $heading,
           'heading_hi' => $heading_hi,
           'created_at' => date('Y-m-d'),
           );
       DB::table('videos')->insert($data);

       return redirect('admin-panel/videos')->with('status', 'Video Has been uploaded');
}



public function category(){
    $CheckUser=app('App\Http\Controllers\AdminControllers')->CheckUser();
		if($CheckUser)
		{
			return redirect('/admin-panel');
		}
		$user_accesses=DB::table('user_access_types')
							->join('user_accesses','user_access_types.id','=','user_accesses.access_type')
							->where([
								['user_accesses.user_type',session()->get('Loggeduser')],
								['user_access_types.menu_name','Manage Gallery'],
								['user_access_types.sub_menu','Image Category']
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
    $menuData=app('App\Http\Controllers\AdminControllers')->MenuList();
    $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
    $category = DB::table('image_category')->where('isDeleted', 'N')->orderBy('id', 'desc')->get();
    return view('admin.category', $data)->with('category', $category)->with('menu',$menuData)
										->with('user_access',$user_accesses);
}

public function addCategory(Request $request){
    $validatedData = $request->validate([
        'category' => 'required',
        'category_hi' => 'required'
       ]);
  
	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Image Category',
          'created_at' => now(),
          'updated_at' => now(),
          'created_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);

  
       $save = new Image_category;
       $save->name = $request->category;
       $save->name_hi = $request->category_hi;
       $save->save();
       return redirect('admin-panel/category')->with('status', 'Category Has been uploaded');
}


public function update_category(Request $request){
    $validatedData = $request->validate([
        'category' => 'required',
        'category_hi' => 'required'
       ]);

	  $data = ['LoggeduserInfo' => Admin::where('id', '=', session('Loggeduser'))->first()];
      $ip = $request->ip();
      $order = DB::table('action_logs')->insert([
          'ip_address' => $ip,
          'action_type' => 'Image Category',
          'created_at' => now(),
          'updated_at' => now(),
          'updated_by' => session('Loggeduser'),
          'user_id' => session('Loggeduser'),
          'user_name' => $data['LoggeduserInfo']->username
      ]);

       $save =Image_category::where('id', $request->user_id)->first();
       $save->name = $request->category;
       $save->name_hi = $request->category_hi;
       $save->save();
       return redirect('admin-panel/category')->with('status', 'Category Has been Updated');
}



public function delete_category($id){
       $save =Image_category::where('id', $id)->first();
       $save->isDeleted = 'Y';
       $save->save();
       return redirect('admin-panel/category')->with('status', 'Category Has been Deleted');
}
}
