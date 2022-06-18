<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AjaxController;
use App\Http\Controllers\frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'Home']);

Route::get('/ourclients', [FrontendController::class, 'OurClients']);
Route::get('/contactus', [FrontendController::class, 'ContactUs']);
Route::post('/contactus', [FrontendController::class, 'SubmitContact']);
Route::post('/enquiry', [FrontendController::class, 'Enquiry']);

Route::get('/gallery', [FrontendController::class, 'Gallery']);
Route::get('/downloads', [FrontendController::class, 'Downloads']);
Route::get('/gallerydetails/{id}', [FrontendController::class, 'GalleryDetails']);
Route::get('/{pagename}/pageview', [FrontendController::class, 'HandlePages']);
Route::get('/{parentname}/products/{pagename}', [FrontendController::class, 'HandleProductPages']);


Route::prefix(ADMINURL)->group(function () {
    Route::middleware(['adminloginvalidate'])->group(function () {
        Route::get('/', function () { return view('admin.login'); });
        Route::get('/forgotpassword', function () { return view('admin.forgotpassword'); });
        Route::post('/forgotpassword', [AdminController::class, 'ForgotPassword']);
        Route::post('/login', [AdminController::class, 'AdminLogin']);
    });

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
    Route::get('/feature', [AdminController::class, 'GetFeature']);
    Route::post('/feature', [AdminController::class, 'UpdateFeature']);
    Route::get('/social_media', [AdminController::class, 'GetSocialMediaLink']);
    Route::post('/social_media', [AdminController::class, 'UpdateSocialMediaLink']);
    
    Route::get('/uploadimages', [AdminController::class, 'UploadImages']);
    Route::post('/saveuploadimages', [AdminController::class, 'SaveUploadImage']);
    
    Route::get('/change_password', [AdminController::class, 'MyProfilePassword']);
    Route::post('/update_password', [AdminController::class, 'MyProfilePasswordUpdate']);

    Route::get('/viewadmin', [AdminController::class, 'ViewAdmin'])->name('viewadmin');
    Route::get('/manageadmin', [AdminController::class, 'ManageAdmin'])->name('manageadmin');
    Route::get('/actionadmin/{option}/{id}', [AdminController::class, 'ActionAdmin']);
    Route::post('/saveadmindetails', [AdminController::class, 'SaveAdminDetails'])->name('createadmin');

    Route::get('/viewcategories', [AdminController::class, 'ViewCategories']);
    Route::get('/managecategory', [AdminController::class, 'ManageCategory']);
    Route::get('/actioncategory/{option}/{id}', [AdminController::class, 'ActionCategory']);
    Route::post('/savecategorydetails', [AdminController::class, 'SaveCategoryDetails']);

    Route::get('/viewsubcategories', [AdminController::class, 'ViewSubCategories']);
    Route::get('/managesubcategory', [AdminController::class, 'ManageSubCategory']);
    Route::get('/actionsubcategory/{option}/{id}', [AdminController::class, 'ActionSubCategory']);
    Route::post('/savesubcategorydetails', [AdminController::class, 'SaveSubCategoryDetails']);

    Route::get('/viewclients', [AdminController::class, 'ViewClients']);
    Route::get('/manageclient', [AdminController::class, 'ManageClient']);
    Route::get('/actionclient/{option}/{id}', [AdminController::class, 'ActionClient']);
    Route::post('/saveclientdetails', [AdminController::class, 'SaveClientDetails']);

    Route::get('/viewclientgallery', [AdminController::class, 'ViewClientGallery']);
    Route::get('/manageclientgallery', [AdminController::class, 'ManageClientGallery']);
    Route::get('/actionclientgallery/{option}/{id}', [AdminController::class, 'ActionClientGallery']);
    Route::post('/saveclientgallerydetails', [AdminController::class, 'SaveClientGalleryDetails']);

    Route::get('/actionpageinfo', [AdminController::class, 'ActionPageInfo']);
    Route::post('/savepageinfo', [AdminController::class, 'SavePageInfo']);
    Route::get('/actionproductpageinfo', [AdminController::class, 'ActionProductPageInfo']);
    Route::post('/saveproductpageinfo', [AdminController::class, 'SaveProductPageInfo']);
    
    // Ajax
    Route::post('/getClientCategory', [AjaxController::class, 'GetClientCategory']);
    Route::post('/deletecmsimage', [AjaxController::class, 'DeleteUploadImage']);

    Route::get('/logout', [AdminController::class, 'AdminLogout']);
});
