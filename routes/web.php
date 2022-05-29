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

Route::get('/', function () { return view('welcome');});
Route::get('/home', function () { return view('frontend.home');});
Route::get('/profile', [FrontendController::class, 'Profile']);
Route::get('/faq', [FrontendController::class, 'Faq']);



Route::prefix(ADMINURL)->group(function () {
    Route::middleware(['adminloginvalidate'])->group(function () {
        Route::get('/', function () { return view('admin.login'); });
        Route::post('/login', [AdminController::class, 'AdminLogin']);
    });

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
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


    // Ajax
    Route::post('/getClientCategory', [AjaxController::class, 'GetClientCategory']);

    Route::get('/logout', [AdminController::class, 'AdminLogout']);
});
