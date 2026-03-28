<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use App\Models\Visitor;
use App\Models\Feedback;
use App\Models\Application;
use App\Models\Guest;
use App\Models\Organization;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Mail\UpdateMail;

class GuestHouseController extends Controller
{
  
  public function GuestHouseBooking(){
        $org=Organization::where('isDeleted','N')->get();
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
     $guest_cat = DB::table('guest_category')
        ->where('isDeleted', 'N')->get();
     $fslider = DB::table('footerslider')->where('status','Active')->where('isDeleted','N')->get();
        
        return view('frontend.guest_book_form',compact('org'))->with('news_n',$news_n)->with('fslider',$fslider)->with('guest_cat',$guest_cat)->with('menu',$menu)->with('submenu',$submenu)->with('childmenu',$childmenu);
    }

    public function SaveGuestHouseBooking(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'application_name' => 'required|string|max:255',
            'organization_type' => 'required|string',
            'organization' => 'nullable|exists:organizations,id', // Assuming organization table has an id
            'manual_organization' => 'nullable|string|max:255',
            'designation' => 'required|string|max:255',
            'contact_no' => 'required|digits:10',
            'email' => 'required|email',
            'purpose' => 'required|string',
            'date_of_arrival' => 'required|date',
            'arrival_time' => 'required|date_format:H:i',
            'date_of_departure' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'room' => 'required|integer',
            'payment' => 'required|string',
            'employee_id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            //validation for the guest
            'guest_name' => 'nullable|array',
            'guest_name.*' => 'required_with:guest_name|string|max:255',
            'organizations' => 'nullable|array',
            'organizations.*' => 'required_with:organizations|string|max:255',
            'age' => 'nullable|array',
            'age.*' => 'required_with:age|integer',
            'contact' => 'nullable|array',
            'contact.*' => 'required_with:contact|digits:10',
          //  'category' => 'nullable|array',
         //   'category.*' => 'required_with:category|string|in:VIP,General,Staff',
            'photo_id_proof' => 'nullable|array',
            'photo_id_proof.*' => 'required_with:photo_id_proof|string|max:255',
            'captcha' => 'required',
        ]);
    
        $imagePath = null;

        if ($request->hasFile('image')) {
            // Store the image in the 'public/uploads/bookingimages' directory
            $imageFile = $request->file('image');
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads/bookingimages'), $fileName);
            
            // Set the $imagePath to the relative path where the image is stored
            $imagePath = 'uploads/bookingimages/' . $fileName;
        }
        
        // Generate application_id using the CSRF token, current year, and a random 4-digit number
        $currentYear = date('Y'); // Get the current year using Carbon
        $randomNumber = rand(10000, 99999); // Generate random 5-digit number
        
        // Combine them to form the unique application_id
        $applicationId = "NBRI/{$currentYear}/{$randomNumber}";
        
        
        // Store the application data in the applications table
        $application = new Application();
        $application->application_name = $validated['application_name'];
        $application->application_id = $applicationId;
        $application->organization_type = $validated['organization_type'];
        $application->designation = $validated['designation'];
        $application->employee_id = $validated['employee_id'];
        $application->contact_no = $validated['contact_no'];
        $application->email = $validated['email'];
        $application->purpose = $validated['purpose'];
        $application->date_of_arrival = $validated['date_of_arrival'];
        $application->arrival_time = $validated['arrival_time'];
        $application->date_of_departure = $validated['date_of_departure'];
        $application->departure_time = $validated['departure_time'];
        $application->room = $validated['room'];
        $application->payment = $validated['payment'];
        $application->remarks = $request->remarks;
        
        // If organization is selected via organization_type, store the organization ID
        if ($validated['organization_type'] == 'CSIR' && $request->organization) {
            $application->organization_id = $validated['organization'][0];  // Storing the organization ID
        } elseif ($validated['organization_type'] == 'Non-CSIR' && $request->manual_organization) {
            $application->manual_organization = $validated['manual_organization'];  // Storing the manual organization name
        }
        
        // If imagePath is set, store the image path
        if ($imagePath) {
            $application->image_path = $imagePath;  // Save the image path
        }
        
        // Save the application data to the database
        $application->save();
        
    
        // Store guests data related to this application
        foreach ($request->guest_name as $index => $guestName) {
            $guest = new Guest();
            $guest->application_id = $applicationId;  // Use the application ID from the application table
            $guest->guest_name = $guestName;
            $guest->organization = $request->organizations[$index] ?? null;
            $guest->age = $request->age[$index];
            $guest->gender = $request->gender[$index];
            $guest->contact = $request->contact[$index];
            $guest->category = $request->category[$index];
            $guest->photo_id_proof = $request->photo_id_proof[$index];
            $guest->save();
        }
      
        
        Mail::to($application->email)->send(new RegisterMail($application));
    
        // Redirect with a success message
        return redirect()->back()->with('success', 'Booking Application Created Successfully With Reference No. ' . $application->application_id);
    }
  public function GuestHouseBookingHi(){
        $org=Organization::all();
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
$guest_cat = DB::table('guest_category')
        ->where('isDeleted', 'N')->get();
        $fslider = DB::table('footerslider')->where('isDeleted','N')->where('status','Active')->get();
        return view('hindi.guest_book_form',compact('org'))->with('news_n',$news_n)->with('fslider',$fslider)->with('guest_cat',$guest_cat)->with('menu',$menu)->with('submenu',$submenu)->with('childmenu',$childmenu);
    }

    public function SaveGuestHouseBookingHi(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'application_name' => 'required|string|max:255',
            'organization_type' => 'required|string',
            'organization' => 'nullable|exists:organizations,id', // Assuming organization table has an id
            'manual_organization' => 'nullable|string|max:255',
            'designation' => 'required|string|max:255',
            'contact_no' => 'required|digits:10',
            'email' => 'required|email',
            'purpose' => 'required|string',
            'date_of_arrival' => 'required|date',
            'arrival_time' => 'required|date_format:H:i',
            'date_of_departure' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'room' => 'required|integer',
            'payment' => 'required|string',
            'employee_id'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            //validation for the guest
            'guest_name' => 'nullable|array',
            'guest_name.*' => 'required_with:guest_name|string|max:255',
            'organizations' => 'nullable|array',
            'organizations.*' => 'required_with:organizations|string|max:255',
            'age' => 'nullable|array',
            'age.*' => 'required_with:age|integer',
            'contact' => 'nullable|array',
            'contact.*' => 'required_with:contact|digits:10',
           // 'category' => 'nullable|array',
           // 'category.*' => 'required_with:category|string|in:VIP,General,Staff',
            'photo_id_proof' => 'nullable|array',
            'photo_id_proof.*' => 'required_with:photo_id_proof|string|max:255',
        ]);
    
        $imagePath = null;

        if ($request->hasFile('image')) {
            // Store the image in the 'public/uploads/bookingimages' directory
            $imageFile = $request->file('image');
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads/bookingimages'), $fileName);
            
            // Set the $imagePath to the relative path where the image is stored
            $imagePath = 'uploads/bookingimages/' . $fileName;
        }
        
        // Generate application_id using the CSRF token, current year, and a random 4-digit number
        $currentYear = date('Y'); // Get the current year using Carbon
        $randomNumber = rand(10000, 99999); // Generate random 5-digit number
        
        // Combine them to form the unique application_id
        $applicationId = "NBRI/{$currentYear}/{$randomNumber}";
        
        
        // Store the application data in the applications table
        $application = new Application();
        $application->application_name = $validated['application_name'];
        $application->application_id = $applicationId;
        $application->organization_type = $validated['organization_type'];
        $application->designation = $validated['designation'];
        $application->employee_id = $validated['employee_id'];
        $application->contact_no = $validated['contact_no'];
        $application->email = $validated['email'];
        $application->purpose = $validated['purpose'];
        $application->date_of_arrival = $validated['date_of_arrival'];
        $application->arrival_time = $validated['arrival_time'];
        $application->date_of_departure = $validated['date_of_departure'];
        $application->departure_time = $validated['departure_time'];
        $application->room = $validated['room'];
        $application->payment = $validated['payment'];
        
        // If organization is selected via organization_type, store the organization ID
        if ($validated['organization_type'] == 'CSIR' && $request->organization) {
            $application->organization_id = $validated['organization'][0];  // Storing the organization ID
        } elseif ($validated['organization_type'] == 'Non-CSIR' && $request->manual_organization) {
            $application->manual_organization = $validated['manual_organization'];  // Storing the manual organization name
        }
        
        // If imagePath is set, store the image path
        if ($imagePath) {
            $application->image_path = $imagePath;  // Save the image path
        }
        
        // Save the application data to the database
        $application->save();
        
    
        // Store guests data related to this application
        foreach ($request->guest_name as $index => $guestName) {
            $guest = new Guest();
            $guest->application_id = $applicationId;  // Use the application ID from the application table
            $guest->guest_name = $guestName;
            $guest->organization = $request->organizations[$index] ?? null;
            $guest->age = $request->age[$index];
            $guest->gender = $request->gender[$index];
            $guest->contact = $request->contact[$index];
            $guest->category = $request->category[$index];
            $guest->photo_id_proof = $request->photo_id_proof[$index];
            $guest->save();
        }
    
        // Redirect with a success message
        return redirect()->back()->with('success', 'बुकिंग एप्लिकेशन '.$application->application_id.'  सफलतापूर्वक बनाया गया |');
    }
  
}
