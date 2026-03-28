<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Homecontroller;
use App\Http\Controllers\Frontend\Galllarycontroller;
use App\Http\Controllers\Frontend\HindiController;
use App\Http\Controllers\Frontend\GuestHouseController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\AdmitCardControllers;
use App\Http\Controllers\GuestHouseControllerAdmin;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\Deletehistory;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\TrackVisitor;
use Illuminate\Support\Facades\Artisan;


//FRONT END CONTROLLER 
Route::get('/clearCache', function () {
    echo \Artisan::call('config:cache');
});
Route::get('/indian-state-garden-2', [AdminControllers::class, 'handle']);



Route::middleware(['TrackVisitor'])->group(function () {
  
Route::get('Garden/{cat}/{id}', [Homecontroller::class, 'newplants']);
Route::get('GardenAudio/{cat}/{id}', [Homecontroller::class, 'newgardenaudio']);

Route::redirect('/', '/hi', 301);
Route::get('/en',[Homecontroller::class,"home"]);
Route::get('/test',[Homecontroller::class,"hometest"]);
Route::get('/test1',[Homecontroller::class,"hometest1"]);
Route::get('get/{cat}',[Homecontroller::class,"index"]);
Route::get('Introduction', [Homecontroller::class,'Introduction'])->name('Introduction');// introduction 
Route::get('Technic',[Homecontroller::class,"Technic"]);// Technic
Route::get('qualitycontrol',[Homecontroller::class,"qualitycontrol"]);// qualitycontrol 
Route::get('registeredproducers',[Homecontroller::class,"registeredproducers"]);// registeredproducers 
Route::get('rabikharif/{location_id}',[Homecontroller::class,"rabikharif"]);// rabikharif 
Route::get('finalrabi/{location_id}/{id}',[Homecontroller::class,"finalrabi"]);// finalrabi 
Route::get('Farmer-Data',[Homecontroller::class,"formerdata"])->name('formerdata');// farmerdata
Route::get('getdata/{location_id}',[Homecontroller::class,"getdata"]);// farmerdata 
Route::get('finalgetdata/{location_id}/{id}',[Homecontroller::class,"finalgetdata"]);// farmerdata 
Route::get('rolling',[Homecontroller::class,"rolling"]);// rolling 
Route::get('roll/{dataname}',[Homecontroller::class,"roll"]);// roll

Route::get('/search-candidate', [Homecontroller::class, 'searchCandidate']);
Route::get('/search-candidate-new', [Homecontroller::class, 'searchCandidateNew']);

Route::get('Feedback',[Homecontroller::class,"feedback"]);// feedback
Route::post('feedbacksubmit',[Homecontroller::class,"feedbacksubmit"])->name('feedbacksubmit');// feedback
Route::get('links',[Homecontroller::class,"links"]);// links
Route::get('Acts-Rules',[Homecontroller::class,"actsRules"]);// Acts-Rules
Route::get('gallery',[Homecontroller::class,"gallery"]); //gallery
Route::get('ViewGallery/{id}/{cat}',[Homecontroller::class,"viewgallery"]); //gallery
Route::get('video',[Homecontroller::class,"video"]); //video
Route::get('news/{id}',[Homecontroller::class,'news']);
Route::get('en/page/{id}',[Homecontroller::class,'newsen']);
Route::get('en/External/ListExams',[Homecontroller::class,'ListExams']);
Route::get('en/ExternalDownload/{id}/{cat}',[Homecontroller::class,'ListExamsAdmitCard']);
Route::get('en/ExternalDownloadTmp',[Homecontroller::class,'ListExamsAdmitCardTemp']);
Route::get('en/ExternalDownloadNew',[Homecontroller::class,'ListExamsAdmitCardTemp1']);
Route::get('en/ExternalDownloadNew-2',[Homecontroller::class,'ListExamsAdmitCardTemp2']);
Route::get('/Search-Admit-Card-Temp', [Homecontroller::class,'SearchAdmitCardTemp']);
Route::get('/Search-Admit-Card', [Homecontroller::class,'SearchAdmitCard']);
Route::get('/uploads/Admit_Card_Data/{roll_no}', [Homecontroller::class, 'downloadAdmitCard1'])->name('download.admit');
Route::get('/uploads/Admit_Card_Data_NW/{roll_no}', [Homecontroller::class, 'downloadAdmitCard2'])->name('download.admitt');
Route::get('/en/Guest-House-Booking', [GuestHouseController::class,'GuestHouseBooking']);
Route::post('/en/Save-Guest-House-Booking',[GuestHouseController::class,'SaveGuestHouseBooking'])->name('SaveGuestHouseBooking');
Route::get('/Download/{reg}', [Homecontroller::class,'DownloadAdmitCard']);
Route::get('/en/Department-Staff-List/{id}/{cat}', [Homecontroller::class,'StaffList']);
Route::get('/en/ViewProfile/{id}/{cat}', [Homecontroller::class,'StaffProfile']);
Route::get('/en/Tenders-Notice', [Homecontroller::class, 'tenders_notice']);
Route::get('/en/tender-notice-archive', [Homecontroller::class, 'tender_notice_archive']);

Route::get('/en/Recruitment-Notice', [Homecontroller::class, 'RecruitmentNotice']);
Route::get('/en/Recruitment-notice-archive', [Homecontroller::class, 'recruitment_notice_archive']);
Route::get('en/NewsNotifications/{cat}', [Homecontroller::class, 'NewsNotifications']);
/////222


Route::get('en/{menu}/{submenu}/{childmenu}/{name}', [HomeController::class, 'childmenuPage']);
Route::get('en/{menu}/{submenu}/{name}',[Homecontroller::class,'submenuPage']);
Route::get('en/{menu}/{name}',[Homecontroller::class,'menuPage']);

Route::get('en/Cyber-Security',[Homecontroller::class,'CyberSecurity']);

Route::get('Office-Orders',[Homecontroller::class,'officeOrders']);
Route::get('office-orders-archive',[Homecontroller::class,'officeordersarchive']);

Route::get('news-archive',[Homecontroller::class,'news_archive']);
Route::get('electrical-accident',[Homecontroller::class,'electrical_accident']);
Route::get('/read_data/{id}', [Homecontroller::class, 'read_data']);
Route::get('Organisation-Structure',[Homecontroller::class,'OrganisationStructure']);
Route::get('consumer-forms',[Homecontroller::class,'consumer_forms']);
Route::get('bill-calculator',[Homecontroller::class,'bill_calculator']);
Route::post('/calculate-billing', [Homecontroller::class, 'calculateBilling']);

Route::get('theft-assessment-calculator', [Homecontroller::class, 'theftassessmentcalculator']);
Route::get('estimate-calculator', [Homecontroller::class, 'estimate_calculator']);
Route::post('assessment-calculator', [Homecontroller::class, 'assessment_calculator']);
Route::post('estimateCalculator', [Homecontroller::class, 'estimateCalculator']);
Route::get('copyright-policy', [Homecontroller::class, 'copyright_policy']);
Route::get('hyperlink-policy', [Homecontroller::class, 'hyperlink_policy']);
Route::get('privacy-policy', [Homecontroller::class, 'privacy_policy']);
Route::get('terms-condition', [Homecontroller::class, 'terms_condition']);
Route::get('security-policy', [Homecontroller::class, 'security_policy']);
Route::get('accessibility-statement', [Homecontroller::class, 'accessibility_statement']);
Route::get('disclaimer', [Homecontroller::class, 'disclaimer']);
Route::get('help', [Homecontroller::class, 'help']);
Route::get('screen-reader-access', [Homecontroller::class, 'screen_reader_access']);
Route::get('feedback', [Homecontroller::class, 'feedback']);
Route::get('download-forms', [Homecontroller::class, 'download_forms']);
Route::get('faq', [Homecontroller::class, 'faq']);
Route::get('rti', [Homecontroller::class, 'rti']);

Route::get('gallery/{id}', [Homecontroller::class, 'img']);
Route::get('about-us', [Homecontroller::class, 'about']);
Route::get('Office-Hierarchy/{id}', [Homecontroller::class, 'phone_directory']);
Route::get('Office-Geographic/{id}', [Homecontroller::class, 'phone_geographic']);
Route::get('verifyPosition/{cat}/{pos}',[Homecontroller::class,"getpositiondata"]);// farmerdata 
Route::get('verifyProfilePosition/{cat}',[Homecontroller::class,"getprofilepositiondata"]);// farmerdata 


Route::get('heritage-garden-audio', [Homecontroller::class, 'heritagegardenaudio']);
Route::get('drc-banthra-csir-nbri', [Homecontroller::class, 'drcbanthracsirnbri']);
Route::get('botanical-garden-audio',[Homecontroller::class,"botanicalgardenaudio"]);// farmerdata 




Route::get('prepaid-meter-recharge', [Homecontroller::class, 'prepaid_meter_recharge']);
Route::get('consumer-grievance', [Homecontroller::class, 'consumer_grievance']);
Route::get('tarrif-order', [Homecontroller::class, 'tarrif_order']);
Route::get('ImportantLink', [Homecontroller::class, 'ImportantLink']);
Route::get('Highlights', [Homecontroller::class, 'Highlights']);

Route::get('en/recruitment/{id}/{cat}/list/all', [HomeController::class, 'RecruitmentListing'])->name('recruitment.listing');

Route::get('web-infromation-manager', function () { return view('frontend.web-infromation-manager'); });

Route::get('read-map/{id}', [Homecontroller::class, 'read_map']);

Route::post('/check-booking-status-ajax', [Homecontroller::class, 'checkStatusAjax']);

Route::get('en/sitemap', [Homecontroller::class, 'sitemap']);
Route::get('hi/sitemap', [HindiController::class, 'sitemap']);
  
////// Hindi Routes /////
  


Route::get('hi',[HindiController::class,"hindi"]);// Acts-Rules
Route::get('hi/Acts-Rules',[HindiController::class,"actsRules"]);// Acts-Rules
Route::get('hi/page/{id}',[Hindicontroller::class,'newshi']);
Route::get('hi/Office-Orders',[HindiController::class,'officeOrders']);
Route::get('hi/office-orders-archive',[HindiController::class,'officeordersarchive']);

Route::get('hi/gallery',[HindiController::class,"gallery"]); //gallery
Route::get('hi/video',[HindiController::class,"video"]); //video

Route::get('hi/External/ListExams',[HindiController::class,'ListExams']);
Route::get('hi/NewsNotifications/{cat}', [HindiController::class, 'NewsNotifications']);

Route::get('/hi/Department-Staff-List/{id}/{cat}', [HindiController::class,'StaffList']);
Route::get('/hi/Staff/View/Profile/{id}/{cat}', [HindiController::class,'StaffProfile']);
Route::get('/hi/ViewProfile/{id}/{cat}', [HindiController::class,'StaffProfile']);

Route::get('hi/{menu}/{name}',[HindiController::class,'menuPagehi']);
Route::get('hi/{menu}/{submenu}/{name}',[HindiController::class,'submenuPagehi']);
Route::get('hi/{menu}/{submenu}/{childmenu}/{name}',[HindiController::class,'childmenuPagehi']);




Route::get('hi/Organisation-Structure',[HindiController::class,'OrganisationStructure']);
Route::get('hi/electrical-accident',[HindiController::class,'electrical_accident']);
Route::get('hi/consumer-forms',[HindiController::class,'consumer_forms']);

Route::get('hi/read_data/{id}', [HindiController::class, 'read_data']);
Route::get('hi/copyright-policy', [HindiController::class, 'copyright_policy']);
Route::get('hi/hyperlink-policy', [HindiController::class, 'hyperlink_policy']);
Route::get('hi/privacy-policy', [HindiController::class, 'privacy_policy']);
Route::get('hi/terms-condition', [HindiController::class, 'terms_condition']);
Route::get('hi/security-policy', [HindiController::class, 'security_policy']);
Route::get('hi/accessibility-statement', [HindiController::class, 'accessibility_statement']);
Route::get('hi/disclaimer', [HindiController::class, 'disclaimer']);
Route::get('hi/help', [HindiController::class, 'help']);
Route::get('hi/screen-reader-access', [HindiController::class, 'screen_reader_access']);
Route::get('hi/feedback', [HindiController::class, 'feedback']);
Route::get('hi/download-forms', [HindiController::class, 'download_forms']);
Route::get('hi/faq', [HindiController::class, 'faq']);
Route::get('hi/sitemap', [HindiController::class, 'sitemap']);
Route::get('hi/gallery/{id}', [HindiController::class, 'img']);
Route::get('hi/bill-calculator',[HindiController::class,'bill_calculator']);
Route::get('hi/about-us', [HindiController::class, 'about']);

Route::get('/hi/Recruitment-Notice', [HindiController::class, 'RecruitmentNotice']);
Route::get('hi/recruitment/{id}/{cat}/list/all', [HindiController::class, 'RecruitmentListing'])->name('recruitment.listing');

Route::get('hi/ImportantLink', [HindiController::class, 'ImportantLink']);
Route::get('hi/Highlights', [HindiController::class, 'Highlights']);

Route::get('hi/tarrif-order', [HindiController::class, 'tarrif_order']);
Route::get('hi/prepaid-meter-recharge', [HindiController::class, 'prepaid_meter_recharge']);
Route::get('hi/urban-service-request', [HindiController::class, 'urban_service_request']);

Route::get('/hi/Guest-House-Booking', [GuestHouseController::class,'GuestHouseBookingHi']);
Route::post('/hi/Save-Guest-House-Booking',[GuestHouseController::class,'SaveGuestHouseBookingHi'])->name('SaveGuestHouseBookingHi');

Route::get('hi/web-infromation-manager', function () { return view('hindi.web-infromation-manager'); });







});

Route::get('urban-service-request', [Homecontroller::class, 'urban_service_request']);
// delete back history 
Route::group(['middleware' => ['DeleteBackHistory']], function(){ 
Route::get('/admin-panel',[AdminControllers::class,'index'])->name('admin-panel');
Route::get('/admin-panel/reload-captcha', [AdminControllers::class, 'reloadCaptcha']);
});

Route::get('/admin-panel/logout',[AdminControllers::class, 'logout'])->name('admin-panel.logout');
Route::post('/admin-panel/check',[AdminControllers::class, 'check'])->name('admin-panel.check');

Route::group(['middleware' => ['AuthCheck']], function(){
Route::get('/admin-panel/dashboard',[AdminControllers::class,'admindash']);
Route::get('/admin-panel/slider',[AdminControllers::class,'slider']);
Route::get('/admin-panel/Staff-Profile-Master',[AdminControllers::class,'StaffProfileMaster']);
Route::post('/admin-panel/uploadprofilemaster',[PhotoController::class,'uploadprofilemaster'])->name('admin-panel.uploadprofilemaster');
Route::post('/admin-panel/update_profilemaster',[PhotoController::class,'update_profilemaster'])->name('admin-panel.update_profilemaster');
Route::get('/admin-panel/delprofilemaster/{id}',[AdminControllers::class,'delprofilemaster']);

Route::get('/admin-panel/Manage-Staff-Area',[AdminControllers::class,'ManageStaffArea']);
Route::post('/admin-panel/uploadstaffarea',[PhotoController::class,'uploadstaffarea'])->name('admin-panel.uploadstaffarea');
Route::post('/admin-panel/update_staffarea',[PhotoController::class,'update_staffarea'])->name('admin-panel.update_staffarea');
Route::get('/admin-panel/delareamaster/{id}',[AdminControllers::class,'delareamaster']);
  
Route::get('/admin-panel/officers',[AdminControllers::class,'officers']);
Route::get('/admin-panel/quicklinks',[AdminControllers::class,'quicklinks']);
Route::post('/admin-panel/uploadslider',[PhotoController::class,'uploadslider'])->name('admin-panel.uploadslider');
  
Route::get('/admin-panel/footer-slider',[AdminControllers::class,'footerslider']);
Route::post('/admin-panel/uploadfooterslider',[PhotoController::class,'uploadfooterslider'])->name('admin-panel.uploadfooterslider');
  
Route::get('/admin-panel/page-banner',[AdminControllers::class,'pagebanner']);
Route::post('/admin-panel/uploadpagebanner',[PhotoController::class,'uploadpagebanner'])->name('admin-panel.uploadpagebanner');
  
Route::get('/admin-panel/Guest-Room-Master',[AdminControllers::class,'GuestRoomMaster']);
Route::post('/admin-panel/uploadGuestRoomMaster',[PhotoController::class,'uploadGuestRoomMaster'])->name('admin-panel.uploadGuestRoomMaster');
Route::post('/admin-panel/update_GuestRoomMaster',[PhotoController::class,'update_GuestRoomMaster'])->name('admin-panel.update_GuestRoomMaster');
Route::get('/admin-panel/delGuestRoomMaster/{id}',[AdminControllers::class,'delGuestRoomMaster']);


  
Route::get('/admin-panel/Add-Guest-Room',[AdminControllers::class,'AddGuestRoom']);
Route::post('/admin-panel/uploadAddGuestRoom',[PhotoController::class,'uploadAddGuestRoom'])->name('admin-panel.uploadAddGuestRoom');
Route::post('/admin-panel/update_AddGuestRoom',[PhotoController::class,'update_AddGuestRoom'])->name('admin-panel.update_AddGuestRoom');
Route::get('/admin-panel/delAddGuestRoom/{id}',[AdminControllers::class,'delAddGuestRoom']);
// Route::get('/admin-panel/rooms/{cat}/{id}',[AdminControllers::class,'changestatusrooms']);
Route::post('/admin-panel/rooms/Blocked/{id}', [AdminControllers::class, 'blockRoom'])->name('rooms.block');
Route::get('/admin-panel/rooms/Active/{id}', [AdminControllers::class, 'activateRoom'])->name('rooms.activate');

Route::get('/admin-panel/quicklink_active/{id}', [AdminControllers::class, 'activateQuicklink'])->name('item.QLactivate');

// Route to deactivate the item
Route::get('/admin-panel/quicklink_deactivate/{id}', [AdminControllers::class, 'deactivateQuicklink'])->name('item.QLdeactivate');
Route::get('/admin-panel/delstArea/{id}', [AdminControllers::class, 'delstArea']);
 
Route::get('/admin-panel/Guest-Category',[AdminControllers::class,'addguestcategory']);
Route::post('/admin-panel/uploadguestcategory',[PhotoController::class,'uploadguestcategory'])->name('admin-panel.uploadguestcategory');
Route::post('/admin-panel/update_guestcategory',[PhotoController::class,'update_guestcategory'])->name('admin-panel.update_guestcategory');
Route::get('/admin-panel/delguestcategory/{id}',[AdminControllers::class,'delguestcategory']);
  
Route::get('/admin-panel/Organization-Master',[AdminControllers::class,'OrganizationMaster']);
Route::post('/admin-panel/uploadOrganizationMaster',[PhotoController::class,'uploadOrganizationMaster'])->name('admin-panel.uploadOrganizationMaster');
Route::post('/admin-panel/update_OrganizationMaster',[PhotoController::class,'update_OrganizationMaster'])->name('admin-panel.update_OrganizationMaster');
Route::get('/admin-panel/delOrganizationMaster/{id}',[AdminControllers::class,'delOrganizationMaster']);

Route::get('/admin-panel/Action-Log', [AdminControllers::class,'ActionLog']);    
Route::get('/admin-panel/control', [AdminControllers::class,'ControlView']);
Route::get('/admin-panel/Add-User', [AdminControllers::class,'AddUser']);
Route::post('/admin-panel/Add-User', [AdminControllers::class,'SaveAddUser']);
Route::get('/admin-panel/deluser/{id}', [AdminControllers::class,'delUser']);
Route::get('/admin-panel/UserControlList/{user_id}', [AdminControllers::class,'UserControlList']);
Route::get('/admin-panel/changeUserControl',[AdminControllers::class,'changeUserControl']);
  
Route::get('/admin-panel/AnnualProcurementPlan',[AdminControllers::class,'AnnualProcurementPlan']);
Route::post('/admin-panel/AnnualProcurementPlan',[PhotoController::class,'UploadAnnualProcurementPlan'])->name('admin-panel.AnnualProcurementPlan');
Route::post('/admin-panel/UpdateAnnualProcurementPlan',[PhotoController::class,'UpdateAnnualProcurementPlan'])->name('admin-panel.UpdateAnnualProcurementPlan');
Route::get('/admin-panel/delAnnualPro/{id}',[AdminControllers::class,'delAnnualPro']);
  
Route::post('/admin-panel/uploadofficers',[PhotoController::class,'uploadofficers'])->name('admin-panel.uploadofficers');
Route::post('/admin-panel/uploadquicklinks',[PhotoController::class,'uploadquicklinks'])->name('admin-panel.uploadquicklinks');
Route::post('/admin-panel/uploadteacher',[PhotoController::class,'uploadteacher'])->name('admin-panel.uploadteacher');
Route::get('/admin-panel/gallery',[AdminControllers::class,'gallery']);
Route::get('/admin-panel/category',[PhotoController::class,'category']);
Route::post('/admin-panel/uploadgallery',[PhotoController::class,'uploadgallery'])->name('admin-panel.uploadgallery');
Route::post('/admin-panel/addCategory',[PhotoController::class,'addCategory'])->name('admin-panel.addCategory');
Route::get('/admin-panel/contact',[AdminControllers::class,'contact']);
Route::get('/admin-panel/videos',[AdminControllers::class,'videos']);
Route::post('/admin-panel/uploadvideo',[PhotoController::class,'uploadvideo'])->name('admin-panel.uploadvideo');
Route::get('/admin-panel/softwares',[AdminControllers::class,'teachers']);
Route::get('/admin-panel/getSubmenu/{cat}',[AdminControllers::class,'getSubmenu']);
Route::get('/admin-panel/managesitecontent',[AdminControllers::class,'managesitecontent']);
Route::get('/admin-panel/editsitecontent/{id}',[AdminControllers::class,'editsitecontent']);
Route::get('/admin-panel/delsitecontent/{id}',[AdminControllers::class,'delsitecontent']);
Route::get('/admin-panel/addchildmenu',[AdminControllers::class,'addchildmenu']);
Route::post('/admin-panel/uploadchildmenu',[PhotoController::class,'uploadchildmenu'])->name('admin-panel.uploadchildmenu');
Route::get('/admin-panel/childmenudel/{id}',[AdminControllers::class,'delchildmenu']);
Route::get('/admin-panel/addmenu',[AdminControllers::class,'addmenu']);
Route::post('/admin-panel/uploadmenu',[PhotoController::class,'uploadmenu'])->name('admin-panel.uploadmenu');
Route::post('/admin-panel/update_menu',[PhotoController::class,'update_menu'])->name('admin-panel.update_menu');
Route::post('/admin-panel/update_childmenu',[PhotoController::class,'update_childmenu'])->name('admin-panel.update_childmenu');
Route::post('admin-panel/update_submenu', [PhotoController::class, 'update_submenu'])->name('update_submenu');
Route::get('/admin-panel/menudel/{id}',[AdminControllers::class,'delmenu']);
Route::get('/admin-panel/addsubmenu',[AdminControllers::class,'submenu']);
Route::get('/admin-panel/createnewpage',[AdminControllers::class,'createnewpage']);
Route::post('/admin-panel/uploadnewpage',[PhotoController::class,'uploadnewpage'])->name('admin-panel.uploadnewpage');
Route::post('/admin-panel/updatenewpage',[PhotoController::class,'updatenewpage'])->name('admin-panel.updatenewpage');
Route::post('/admin-panel/updatepageelement',[PhotoController::class,'updatepageelement'])->name('admin-panel.updatepageelement');
Route::get('/admin-panel/allpages',[AdminControllers::class,'allpages']);
Route::get('/admin-panel/editnewpage/{id}',[AdminControllers::class,'editnewpage']);
Route::get('/admin-panel/delnewpage/{id}',[AdminControllers::class,'delnewpage']);
Route::get('/admin-panel/pageelement',[AdminControllers::class,'pageelement']);
Route::get('/admin-panel/editpageelement/{id}',[AdminControllers::class,'editpageelement']);
Route::post('/admin-panel/uploadsubmenu',[PhotoController::class,'uploadsubmenu'])->name('admin-panel.uploadsubmenu');
Route::get('/admin-panel/submenudel/{id}',[AdminControllers::class,'delsubmenu']);
Route::get('/admin-panel/addcontent',[AdminControllers::class,'addcontent']);
Route::post('/admin-panel/uploadsitecontent',[PhotoController::class,'uploadsitecontent'])->name('admin-panel.uploadsitecontent');
Route::post('/admin-panel/updatesitecontent',[PhotoController::class,'updatesitecontent'])->name('admin-panel.updatesitecontent');
Route::get('fetch_rooms/{id}/{app}',[PhotoController::class,'fetch_rooms']);
Route::get('fetch_no_bed/{id}/{app}',[PhotoController::class,'fetch_no_bed']);
Route::get('fetch_bed_record/{id}/{app}',[PhotoController::class,'fetch_bed_record']);
Route::get('subcatfetch/{id}',[PhotoController::class,'subcatfetch']);
Route::get('childcatfetch/{id}',[PhotoController::class,'childcatfetch']);
Route::get('staffcatfetch/{id}',[PhotoController::class,'staffcatfetch']);
Route::get('getProfileContent/{cat}/{lang}/{user}',[PhotoController::class,"getProfileContent"]);
Route::get('/admin-panel/delappoint/{id}',[AdminControllers::class,'delappoint']);
Route::get('/admin-panel/gallery/{id}',[AdminControllers::class,'delgallery']);
Route::get('/admin-panel/video/{id}',[AdminControllers::class,'delvideo']);
Route::get('/admin-panel/slider/{id}',[AdminControllers::class,'delslider']);
Route::get('/admin-panel/footerslider/{id}',[AdminControllers::class,'delfooterslider']);
Route::get('/admin-panel/officers/{id}',[AdminControllers::class,'delofficers']);
Route::get('/admin-panel/quicklinksdel/{id}',[AdminControllers::class,'quicklinksdel']);
Route::get('/admin-panel/teachers/{id}',[AdminControllers::class,'delteacher']);
Route::get('/admin-panel/phone-directory',[AdminControllers::class,'phone_directory']);
Route::get('/admin-panel/phone-directory/{id}',[AdminControllers::class,'phone_directory_search']);
Route::get('read_language/{id}', [AdminControllers::class, 'read_language']);
Route::get('/admin-panel/office_orders',[AdminControllers::class,'office_orders']);
Route::post('/admin-panel/addorders',[AdminControllers::class,'addorders'])->name('admin-panel.addorders');
Route::get('/admin-panel/office_orders_list',[AdminControllers::class,'office_orders_list']);
Route::get('/admin-panel/order_edit/{id}',[AdminControllers::class,'order_edit']);
Route::post('/admin-panel/ordersedit',[AdminControllers::class,'ordersedit'])->name('admin-panel.ordersedit');
Route::get('/admin-panel/topcontent',[AdminControllers::class,'topcontent']);

Route::post('/admin-panel/uploadtopcontent',[AdminControllers::class,'uploadtopcontent'])->name('admin-panel.uploadtopcontent');

Route::post('/admin-panel/alert_image',[AdminControllers::class,'alert_image']);

Route::get('/admin-panel/topcondel/{id}',[AdminControllers::class,'topcondel']);

Route::get('/admin-panel/topcontentedit/{id}',[AdminControllers::class,'topcontentedit']);

Route::get('/admin-panel/AddAdvertisement',[AdminControllers::class,'AddAdvertisement']);
Route::post('/admin-panel/uploadAdvertisement',[PhotoController::class,'uploadAdvertisement'])->name('admin-panel.uploadAdvertisement');
Route::get('/admin-panel/ManageAdvertisement',[AdminControllers::class,'ManageAdvertisement']);
Route::get('/admin-panel/ManageAdvertisementArchive',[AdminControllers::class,'ManageAdvertisementArchive']);
Route::get('/admin-panel/AddAdvertisementDetails',[AdminControllers::class,'AddAdvertisementDetails']);
Route::get('/admin-panel/ViewAdvtDetail/{id}',[AdminControllers::class,'ViewAdvtDetail']);
Route::get('/admin-panel/Addarchive/{id}',[PhotoController::class,'Addarchive']);
Route::get('/admin-panel/Backarchive/{id}',[PhotoController::class,'Backarchive']);
Route::post('/admin-panel/AddAdvertisementDetail',[PhotoController::class,'AddAdvertisementDetail'])->name('admin-panel.AddAdvertisementDetail');
Route::post('/admin-panel/updateRecruitDetail',[PhotoController::class,'updateRecruitDetail'])->name('admin-panel.updateRecruitDetail');
Route::post('/admin-panel/fetch-rectype',[AdminControllers::class,'fetchRectype']);
Route::get('/admin-panel/ManageAdvertisementDetail',[AdminControllers::class,'ManageAdvertisementDetail']);
Route::get('/admin-panel/add_listing_recruit/{id}',[AdminControllers::class,'add_listing_recruit']);
Route::post('/admin-panel/add_listing_recruit/{id}',[AdminControllers::class,'saveadd_listing_recruit']);
Route::get('/admin-panel/view_listing_recruit/{id}',[AdminControllers::class,'view_listing_recruit']);
Route::get('/admin-panel/advtdetaildel/{id}',[AdminControllers::class,'advtdetaildel']);
Route::get('/admin-panel/delrecruitlisting/{id}',[AdminControllers::class,'delrecruitlisting']);
Route::get('/admin-panel/advtdel/{id}',[AdminControllers::class,'Advtdel']);

Route::post('/admin-panel/topcontenteditdata',[AdminControllers::class,'topcontenteditdata'])->name('admin-panel.topcontenteditdata');
Route::get('/admin-panel/addpdf',[AdminControllers::class,'addpdf']);
Route::post('/admin-panel/uploadpdf',[PhotoController::class,'uploadpdf'])->name('admin-panel.uploadpdf');
  
Route::get('/admin-panel/addstaff-details',[StaffController::class,'addstaffdetails']);
Route::post('/admin-panel/uploadstaffcontent',[StaffController::class,'uploadstaffcontent'])->name('admin-panel.uploadstaffcontent');
Route::get('/admin-panel/managestaffcontent',[StaffController::class,'managestaffcontent']);
Route::get('/admin-panel/editstaffcontent/{id}',[StaffController::class,'editstaffcontent']);
Route::get('/admin-panel/delstaffcontent/{id}',[StaffController::class,'delstaffcontent']);
Route::post('/admin-panel/updatestaffcontent',[StaffController::class,'updatestaffcontent'])->name('admin-panel.updatestaffcontent');
Route::post('/admin-panel/update_staff_profile',[StaffController::class,'uploadprofilecontent'])->name('admin-panel.uploadprofilecontent');
Route::get('/admin-panel/deactivestaffcontent/{id}',[StaffController::class,'deactivestaffcontent']);
Route::get('/admin-panel/activestaffcontent/{id}',[StaffController::class,'activestaffcontent']);
Route::get('/Search-Staff-Report',[StaffController::class,'SearchStaffReport']);
Route::post('/admin-panel/staff/move-up/{id}', [StaffController::class, 'moveUp'])->name('staff.moveUp');
Route::post('/admin-panel/staff/move-down/{id}', [StaffController::class, 'moveDown'])->name('staff.moveDown');
Route::get('/admin-panel/Position-Area-Wise',[StaffController::class,'PositionAreaWise']);
Route::post('/admin-panel/staffarea/move-up/{id}', [StaffController::class, 'moveUparea'])->name('staff.moveUparea');
Route::post('/admin-panel/staffarea/move-down/{id}', [StaffController::class, 'moveDownarea'])->name('staff.moveDownarea');
Route::get('/Search-Staff-Report-Area',[StaffController::class,'SearchStaffReportArea']);
Route::get('/admin-panel/MakeHead/{id}/{port_dist}', [StaffController::class, 'makeHead'])->name('make.head');

Route::get('/admin-panel/Position-Recruitment',[AdminControllers::class,'PositionRecruitment']);
Route::get('/Position-Recruitment-Report-Area',[AdminControllers::class,'PositionRecruitmentReport']);
Route::post('/admin-panel/recruitment/sort', [AdminControllers::class, 'sortRec'])
    ->name('recruitment.sort');
Route::get('/admin-panel/get-advertisement/{id}', [AdminControllers::class, 'getAdvertisement']);
Route::get('/admin-panel/recruitment-list', [AdminControllers::class, 'getRecruitments']);
Route::post('/admin-panel/update-position', [AdminControllers::class, 'updatePosition']);



  
  
Route::get('/admin-panel/PendingApplications',[GuestHouseControllerAdmin::class,'PendingApplications']);
Route::get('/admin-panel/ViewRoomAllotment/{id}',[GuestHouseControllerAdmin::class,'ViewRoomAllotment']);
Route::get('/admin-panel/ApprovedApplications',[GuestHouseControllerAdmin::class,'ApprovedApplications']);
Route::get('/admin-panel/RejectedApplications',[GuestHouseControllerAdmin::class,'RejectedApplications']);
Route::post('/admin-panel/All-Application/approve',[GuestHouseControllerAdmin::class,'SaveApproveApplications']);
Route::post('/admin-panel/All-Application/backapprove',[GuestHouseControllerAdmin::class,'SaveBackApproveApplications']);
Route::post('/admin-panel/All-Application/delete',[GuestHouseControllerAdmin::class,'SaveRejectApplications']);
Route::get('/admin-panel/SearchApplications',[GuestHouseControllerAdmin::class,'SearchApplications']);
Route::post('/admin-panel/SearchApplications',[GuestHouseControllerAdmin::class,'GetSearchApplications'])->name('admin-panel.searchapplications');
  
Route::get('/admin-panel/ViewRoomStatus',[GuestHouseControllerAdmin::class,'ViewRoomStatus']);
Route::get('/admin-panel/GetViewRoomStatus',[GuestHouseControllerAdmin::class,'GetViewRoomStatus'])->name('admin-panel.GetViewRoomStatus');
  
Route::get('/admin-panel/ViewApplications/{id}',[GuestHouseControllerAdmin::class,'ViewApplications']);
Route::post('/admin-panel/uploadallotment',[GuestHouseControllerAdmin::class,'uploadallotment'])->name('admin-panel.uploadallotment');
Route::post('/admin-panel/update_allotment',[GuestHouseControllerAdmin::class,'update_allotment'])->name('admin-panel.update_allotment');
Route::post('/admin-panel/confirm_allotment',[GuestHouseControllerAdmin::class,'confirm_allotment'])->name('admin-panel.confirm_allotment');
Route::get('/admin-panel/delallottment/{id}',[StaffController::class,'delallottment']);
  
Route::get('/admin-panel/addstaff',[StaffController::class,'addstaff']);
Route::post('/admin-panel/uploadaddstaff',[StaffController::class,'uploadaddstaff'])->name('admin-panel.uploadaddstaff');
Route::post('/admin-panel/uploadeditstaff',[StaffController::class,'uploadeditstaff'])->name('admin-panel.uploadeditstaff');
Route::get('/admin-panel/staffdel/{id}',[StaffController::class,'staffdel']);


Route::get('/admin-panel/add-news',[AdminControllers::class,'add_news']);
Route::post('/admin-panel/newsadd',[AdminControllers::class,'newsadd'])->name('admin-panel.newsadd');
Route::get('/admin-panel/news_list',[AdminControllers::class,'news_list']);
Route::get('/admin-panel/newsdelete/{id}',[AdminControllers::class,'newsdelete']);
Route::get('/admin-panel/newsback/{id}',[AdminControllers::class,'newsback']);
  
Route::get('/admin-panel/AddTestCategory',[AdminControllers::class,'AddTestCategory']);
Route::post('/admin-panel/AddTestCategory',[AdminControllers::class,'SaveAddTestCategory'])->name('admin-panel.AddTestCategory');
Route::post('/admin-panel/update_testcat',[AdminControllers::class,'update_testcat']);
Route::get('/admin-panel/testdelete/{id}',[AdminControllers::class,'testdelete']);
  
Route::get('/admin-panel/AddDeg',[AdminControllers::class,'AddDeg']);
Route::post('/admin-panel/AddDeg',[AdminControllers::class,'SaveAddDeg'])->name('admin-panel.SaveAddDeg');

//Admit Card Route

Route::get('/admin-panel/AddCandidateExcel',[AdmitCardControllers::class,'AddCandidateExcel']);
Route::post('/admin-panel/SaveAddCandidateExcel',[AdmitCardControllers::class,'SaveAddCandidateExcel'])->name('admin-panel.SaveAddCandidateExcel');
Route::get('/admin-panel/excelCollDelete/{id}',[AdmitCardControllers::class,'excelCollDelete']);

Route::post('/admin-panel/updateFreeze',[AdmitCardControllers::class,'updateFreeze']);

Route::post('/admin-panel/updateFormat',[AdmitCardControllers::class,'updateFormat']);

Route::get('/admin-panel/CandidateList/{id}',[AdmitCardControllers::class,'CandidateList']);
Route::put('/admin-panel/candidate/update', [AdmitCardControllers::class, 'updateCandidate'])->name('candidate.update');
Route::get('/admin-panel/candidate/{id}', [AdmitCardControllers::class, 'getCandidate']);
Route::get('/admin-panel/candidatedelete/{id}',[AdmitCardControllers::class,'delcandidatedelete']);

// Route::get('/admin-panel/CandidateList/{id}',[AdminControllers::class,'CandidateList']);
// Route::put('/admin-panel/candidate/update', [AdminControllers::class, 'updateCandidate'])->name('candidate.update');
// Route::get('/admin-panel/candidate/{id}', [AdminControllers::class, 'getCandidate']);


// Route::get('/admin-panel/AddCandidateExcel',[AdminControllers::class,'AddCandidateExcel']);
// Route::post('/admin-panel/SaveAddCandidateExcel',[AdminControllers::class,'SaveAddCandidateExcel'])->name('admin-panel.SaveAddCandidateExcel');
// Route::get('/admin-panel/excelCollDelete/{id}',[AdminControllers::class,'excelCollDelete']);

// Route::post('/admin-panel/updateFreeze',[AdminControllers::class,'updateFreeze']);

// Route::post('/admin-panel/updateFormat',[AdminControllers::class,'updateFormat']);

// Route::get('/admin-panel/candidatedelete/{id}',[AdminControllers::class,'delcandidatedelete']);
  
Route::get('/admin-panel/PlantsList',[AdminControllers::class,'PlantsList']); 
Route::get('/admin-panel/add-plants',[AdminControllers::class,'add_plants']);
Route::post('/admin-panel/plantsadd',[AdminControllers::class,'plantsadd'])->name('admin-panel.plantsadd');
Route::get('/admin-panel/edit-plants/{id}',[AdminControllers::class,'edit_plants']);
Route::post('/admin-panel/plantsedit',[AdminControllers::class,'plantsedit'])->name('admin-panel.plantsedit');
Route::get('/admin-panel/plantdelete/{id}',[AdminControllers::class,'plantdelete']);
  
Route::get('/admin-panel/AddNewGardenCategory',[AdminControllers::class,'AddNewGardenCategory']);
Route::post('/admin-panel/uploadAddNewGardenCategory',[PhotoController::class,'uploadAddNewGardenCategory'])->name('admin-panel.uploadAddNewGardenCategory');
Route::post('/admin-panel/update_NewGardenCategory',[PhotoController::class,'update_NewGardenCategory'])->name('admin-panel.update_NewGardenCategory');
Route::get('/admin-panel/delNewGardenCategory/{id}',[AdminControllers::class,'delNewGardenCategory']);
  
Route::get('/admin-panel/AddGardenAudioCategory',[AdminControllers::class,'AddGardenAudioCategory']);
Route::post('/admin-panel/uploadAddGardenAudioCategory',[PhotoController::class,'uploadAddGardenAudioCategory'])->name('admin-panel.uploadAddGardenAudioCategory');
Route::post('/admin-panel/update_GardenAudioCategory',[PhotoController::class,'update_GardenAudioCategory'])->name('admin-panel.update_GardenAudioCategory');
Route::get('/admin-panel/delGardenAudioCategory/{id}',[AdminControllers::class,'delGardenAudioCategory']);
  
Route::get('/admin-panel/AddNewPlants',[AdminControllers::class,'AddNewPlants']);
Route::post('/admin-panel/SaveAddNewPlants',[AdminControllers::class,'SaveAddNewPlants'])->name('admin-panel.SaveAddNewPlants');
Route::get('/admin-panel/ManageNewPlants',[AdminControllers::class,'ManageNewPlants']); 
Route::get('/admin-panel/ManageNewPlantsCols/{id}',[AdminControllers::class,'ManageNewPlantsCols']);
Route::post('/admin-panel/SaveNewCols',[AdminControllers::class,'SaveNewCols'])->name('admin-panel.SaveNewCols');
Route::get('/admin-panel/deletenewcol/{id}',[AdminControllers::class,'deletenewcol']);
Route::get('/admin-panel/edit-NewPlants/{id}',[AdminControllers::class,'edit_NewPlants']);
Route::post('/admin-panel/updateNewPlants',[AdminControllers::class,'updateNewPlants'])->name('admin-panel.updateNewPlants');
Route::get('/admin-panel/deleteNewPlants/{id}',[AdminControllers::class,'deleteNewPlants']);
Route::get('/admin-panel/get-plant-code', [AdminControllers::class, 'getPlantCode'])->name('get.plant.code');
  
Route::get('/admin-panel/BotanicalGardenAudio',[AdminControllers::class,'GardenAudioList']); 
Route::get('/admin-panel/Add-GardenAudio',[AdminControllers::class,'AddGardenAudio']);
Route::post('/admin-panel/GardenAudioAdd',[AdminControllers::class,'GardenAudioAdd'])->name('admin-panel.GardenAudioAdd');
  
Route::get('/admin-panel/HeritageGardenAudio',[AdminControllers::class,'HeritageAudioList']); 
Route::get('/admin-panel/Add-HeritageAudio',[AdminControllers::class,'AddHeritageAudio']);
Route::post('/admin-panel/HeritageAudioAdd',[AdminControllers::class,'HeritageAudioAdd'])->name('admin-panel.heritageaudioadd');
Route::get('/admin-panel/audiodelete/{id}',[AdminControllers::class,'audiodelete']);

Route::get('/admin-panel/ManageNewGardenAudio',[AdminControllers::class,'ManageNewGardenAudio']); 
Route::get('/admin-panel/AddNewGardenAudio',[AdminControllers::class,'AddNewGardenAudio']);
Route::post('/admin-panel/AddGardenAudio',[AdminControllers::class,'SaveAddNewGardenAudio'])->name('admin-panel.SaveAddNewGardenAudio');
Route::post('/admin-panel/update_newaudio',[AdminControllers::class,'update_newaudio'])->name('admin-panel.update_newaudio');
Route::get('/admin-panel/get-audio-code', [AdminControllers::class, 'getAudioCode'])->name('get.audio.code');
  
Route::get('/admin-panel/addTender',[AdminControllers::class,'addTender']);
Route::post('/admin-panel/add_tender',[AdminControllers::class,'add_tender'])->name('admin-panel.add_tender');
Route::get('/admin-panel/currentTenders',[AdminControllers::class,'currentTenders']);
Route::get('/admin-panel/edit_tender/{id}',[AdminControllers::class,'edit_tender']);
Route::post('/admin-panel/EditTender',[AdminControllers::class,'EditTender'])->name('admin-panel.EditTender');
Route::get('/admin-panel/archiveTenders',[AdminControllers::class,'archiveTenders']);
Route::get('/admin-panel/deactivate/{id}',[AdminControllers::class,'deactivate']);
Route::get('/admin-panel/activate/{id}',[AdminControllers::class,'activate']);
Route::get('/admin-panel/view_listing/{id}',[AdminControllers::class,'view_listing']);
Route::get('/admin-panel/add_listing/{id}',[AdminControllers::class,'add_listing']);
Route::post('/admin-panel/add_listing/{id}',[AdminControllers::class,'saveadd_listing']);
Route::post('/admin-panel/import', [AdminControllers::class, 'import'])->name('import');
Route::post('admin-panel/update_category', [PhotoController::class, 'update_category'])->name('update_category');
Route::get('admin-panel/delete_category/{id}',[PhotoController::class,'delete_category']);
Route::get('admin-panel/edit-phone-directory/{id}', [AdminControllers::class, 'edit_phone_directory'])->name('edit_phone_directory');
Route::get('admin-panel/delete-phone-directory/{id}',[AdminControllers::class,'delete_phone_directory']);
Route::post('admin-panel/update_directory', [AdminControllers::class, 'update_directory'])->name('update_directory');
Route::get('admin-panel/office_active/{id}', [AdminControllers::class, 'office_active']);
Route::get('admin-panel/office_deactivate/{id}',[AdminControllers::class,'office_deactivate']); 
Route::get('admin-panel/slider_active/{id}', [AdminControllers::class, 'slider_active']);
Route::get('admin-panel/slider_deactivate/{id}',[AdminControllers::class,'slider_deactivate']);
Route::get('admin-panel/quicklinks_active/{id}', [AdminControllers::class, 'quicklinks_active']);
Route::get('admin-panel/quicklinks_deactivate/{id}',[AdminControllers::class,'quicklinks_deactivate']); 

});


