<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\HelperController;

class AdminController extends Controller
{
    public function AdminLogin(Request $req)
    {
        if ($req->admin_name != '' && $req->admin_password != '') {
            $isValidUser = DB::table('admin_details')->where([
                ['admin_name', $req->input('admin_name')],
                ['admin_password', md5(trim($req->admin_password))], ['status', 1]
            ])->get();
            if (count($isValidUser)) {
                $req->session()->put('admin_name', $isValidUser[0]->admin_name);
                $req->session()->put('admin_id', $isValidUser[0]->admin_id);
                $req->session()->put('admin_role', $isValidUser[0]->admin_role);
                return redirect(ADMINURL . '/dashboard');
            }
        }
        return back()->withInput()->with('error', 'Invalid Credentials');
    }

    public function MyProfilePassword(Request $req){
        $adminId = $req->session()->get('admin_id');
        return view('admin.actionchangepassword', ['admin_id' => encryption($adminId)]);
    }

    public function MyProfilePasswordUpdate(Request $req){
        $adminId = $req->session()->get('admin_id');
        $formData =  $req->only(['old_password','new_password','confirm_password']);
        if($formData['old_password'] == '' || $formData['new_password'] == '' || $formData['confirm_password'] == ''){
            return back()->with('error', 'Please Enter All fields');
        }

        if($formData['new_password'] != $formData['confirm_password']){
            return back()->with('error','New Password and Confirm Password not matched');
        }

        $isValidUser = DB::table('admin_details')->where('admin_id', $adminId)->get();
        if(count($isValidUser)){
            if($isValidUser[0]->admin_password != md5($formData['old_password'])){
                return back()->with('error','Old Password not matched');
            }
           
            $update = updateQuery('admin_details','admin_id',$isValidUser[0]->admin_id,['admin_password' => md5($formData['new_password'])]);
            return redirect(ADMINURL.'/logout');
            return back()->with('success', 'Password Updated Successfully');
        }
    }

    public function Dashboard(Request $req)
    {
        return view('admin.dashboard');
    }

    // Admin Actions
    public function ViewAdmin()
    {
        $adminDetails = HelperController::getAdminDetailsExceptLoggedIn();
        return view('admin.viewadmin', compact('adminDetails'));
    }

    public function ManageAdmin()
    {
        return view('admin.actionadmin');
    }

    public function ActionAdmin($option, $id)
    {
        $actionId = decryption($id);
        $adminData = HelperController::getAdminDetails($actionId);
        if (count($adminData) == 0) return redirect(ADMINURL . '/viewadmin');

        if ($option == 'delete') {
            $delete = deleteQuery($actionId, 'admin_details', 'admin_id');
            $notify = notification($delete);
            return redirect(ADMINURL . '/viewadmin')->with($notify['type'], 'Data Deleted Successfully');
        }
        return view('admin.actionadmin', ['action' => $option, 'data' => $adminData]);
    }

    public function SaveAdminDetails(Request $req)
    {
        $formData =  $req->except(['_token', 'admin_id']);
        if ($req->input('admin_id') == '') {
            $formData['admin_password'] = md5('root@123');
            $formData['admin_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQuery('admin_details', $formData);
        } else {
            $actionId = decryption($req->input('admin_id'));
            if($req->input('admin_password') !=''){
                $formData['admin_password'] = md5($req->input('admin_password'));
            }else{
                $adminData = HelperController::getAdminDetails($actionId);
                $formData['admin_password'] = $adminData[0]->admin_password;
            }
            $saveData = updateQuery('admin_details', 'admin_id', $actionId, $formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewadmin')->with($notify['type'], $notify['msg']);
    }


    // Category Actions
    public function ViewCategories()
    {
        $categoryDetails = HelperController::getCategories();
        return view('admin.viewcategory', compact('categoryDetails'));
    }

    public function ManageCategory()
    {
        return view('admin.actioncategory');
    }

    public function ActionCategory($option, $id)
    {
        $actionId = decryption($id);
        $categoryData = HelperController::getCategories($actionId);
        if (count($categoryData) == 0) return redirect(ADMINURL . '/viewcategories');

        if ($option == 'delete') {
            $delete = deleteQuery($actionId, 'category_details', 'category_id');
            $notify = notification($delete);
            return redirect(ADMINURL . '/viewcategories')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actioncategory', ['action' => $option, 'data' => $categoryData]);
    }

    public function SaveCategoryDetails(Request $req)
    {
        $formData =  $req->except(['_token', 'category_id']);

        if ($req->input('category_id') == '') {
            $formData['category_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQueryId('category_details', $formData);
        } else {
            $saveData = updateQuery('category_details', 'category_id', decryption($req->input('category_id')), $formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewcategories')->with($notify['type'], $notify['msg']);
    }


    // Brand Actions
    public function ViewClients()
    {
        $clientDetails = HelperController::getClients();
        return view('admin.viewclients', compact('clientDetails'));
    }

    public function ManageClient()
    {
        return view('admin.actionclient');
    }

    public function ActionClient($option, $id)
    {
        $actionId = decryption($id);
        $clientData = HelperController::getClients($actionId);
        if (count($clientData) == 0) return redirect(ADMINURL . '/viewclients');

        if ($option == 'delete') {
            $delete = deleteQuery($actionId, 'client_details', 'client_id');
            $notify = notification($delete);
            return redirect(ADMINURL . '/viewclients')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actionclient', ['action' => $option, 'data' => $clientData]);
    }

    public function SaveClientDetails(Request $req)
    {
        $formData =  $req->except(['_token', 'client_id', 'edit_image']);

        if ($req->hasFile('client_logo')) {
            $file = $req->file('client_logo');
            $destinationPath = 'admin/uploads/clients';
            $fileName = $file->getClientOriginalName();
            $fileExtension = explode('.', $fileName);

            if (strtolower(end($fileExtension)) != 'png' && strtolower(end($fileExtension)) != 'jpeg' &&  strtolower(end($fileExtension)) != 'jpg') {
                return redirect()->back()->withInput()->with('error', 'Please upload the valid image!');
            }

            $file->move($destinationPath, $fileName);
            $formData['client_logo'] = $fileName;
        } else {
            $formData['client_logo'] = $req->input('edit_image') != '' ? $req->input('edit_image') : '';
        }



        if ($req->input('client_id') == '') {
            $formData['client_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQueryId('client_details', $formData);
        } else {

            $saveData = updateQuery('client_details', 'client_id', decryption($req->input('client_id')), $formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewclients')->with($notify['type'], $notify['msg']);
    }


    // Sub-Category Actions
    public function ViewSubCategories()
    {
        $subcategoryDetails = HelperController::getSubCategories();
        return view('admin.viewsubcategory', compact('subcategoryDetails'));
    }

    public function ManageSubCategory()
    {
        return view('admin.actionsubcategory');
    }

    public function ActionSubCategory($option, $id)
    {
        $actionId = decryption($id);
        $subcategoryData = HelperController::getSubCategories($actionId);
        if (count($subcategoryData) == 0) return redirect(ADMINURL . '/viewsubcategories');

        if ($option == 'delete') {
            $delete = deleteQuery($actionId, 'sub_category', 'sub_category_id');
            $notify = notification($delete);
            return redirect(ADMINURL . '/viewsubcategories')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actionsubcategory', ['action' => $option, 'data' => $subcategoryData]);
    }

    public function SaveSubCategoryDetails(Request $req)
    {
        $formData =  $req->except(['_token', 'sub_category_id']);

        if ($req->input('sub_category_id') == '') {
            $formData['sub_category_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQueryId('sub_category', $formData);
        } else {
            $saveData = updateQuery('sub_category', 'sub_category_id', decryption($req->input('sub_category_id')), $formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewsubcategories')->with($notify['type'], $notify['msg']);
    }

    // Client Gallery Actions
    public function ViewClientGallery()
    {
        $clientGallery = HelperController::getClientGallery();
        return view('admin.viewclientgallery', compact('clientGallery'));
    }

    public function ManageClientGallery()
    {
        return view('admin.actionclientgallery');
    }

    public function ActionClientGallery($option, $id)
    {
        $actionId = decryption($id);
        $clientGalleryData = HelperController::getClientGallery($actionId);
        if (count($clientGalleryData) == 0) return redirect(ADMINURL . '/viewclientgallery');

        if ($option == 'delete') {
            $imageDelete = deleteQuery($actionId, 'clients_gallery_images', 'clients_gallery_images_galleryid');
            $videoDelete = deleteQuery($actionId, 'clients_gallery_videos', 'clients_gallery_videos_galleryid');
            $delete = deleteQuery($actionId, 'clients_gallery', 'clients_gallery_id');
            $notify = notification($delete);
            return redirect(ADMINURL . '/viewclientgallery')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actionclientgallery', ['action' => $option, 'data' => $clientGalleryData]);
    }

    public function SaveClientGalleryDetails(Request $req)
    {
        $formData =  $req->except(['_token', 'clients_gallery_id', 'clients_gallery_images_name', 'clients_gallery_videos_name']);
        // echo '<pre>';
        // print_r($formData);
        // print_r($req->file('clients_gallery_images_name'));
        // print_r($req->input('clients_gallery_videos_name'));
        // exit;

        if($formData['clients_gallery_client'] == '' || $formData['clients_gallery_category'] == '' || $formData['clients_gallery_date'] =='' ||
            $formData['clients_gallery_location'] =='' || $formData['clients_gallery_budget'] =='' || $formData['clients_gallery_description'] =='' ){
            return back()->with('error', 'Please enter all mandatory fields');
        }

        if ($req->input('clients_gallery_id') == '') {
            if (!$req->hasFile('clients_gallery_images_name')) {
                return back()->with('error', 'Please upload images');
            }
            $formData['clients_gallery_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQueryId('clients_gallery', $formData);
            $galleryId = $saveData;
        } else {
            $galleryId = decryption($req->input('clients_gallery_id'));
            $saveData = updateQuery('clients_gallery', 'clients_gallery_id', $galleryId, $formData);
        }

        if ($galleryId != '') {
            if ($req->hasFile('clients_gallery_images_name')) {
                $files = $req->file('clients_gallery_images_name');
                foreach ($files as $l => $file){
                    $location = public_path('uploads/client/gallery');
                    $destinationPath = 'uploads/client/gallery';
                    $fileName = $file->getClientOriginalName();
                    $file->move($location, $fileName);
                    $rowExist = HelperController::checkImageExistByRow($galleryId,$l+1);
                    $imageData = ['clients_gallery_images_galleryid' => $galleryId, 'clients_gallery_images_row' => $l+1, 'clients_gallery_images_name' => $fileName];
                    if (count($rowExist)) {
                        $imageAction = DB::table('clients_gallery_images')
                                        ->where([['clients_gallery_images_id',$rowExist[0]->clients_gallery_images_id],
                                        ['clients_gallery_images_galleryid',$galleryId], ['clients_gallery_images_row',(int)$l+1],
                                        ])->update($imageData);
                    } else {
                        $imageAction = insertQuery('clients_gallery_images', $imageData);
                    }
                }
                
            }


            $videos = $req->input('clients_gallery_videos_name');
            foreach ($videos as $k => $video){
                if($video != ''){
                    $videorowExist = HelperController::checkVideoExistByRow($galleryId,$k+1);
                    $videoData = ['clients_gallery_videos_galleryid' => $galleryId, 'clients_gallery_videos_row' => $k+1, 'clients_gallery_videos_name' => $video];
                    if (count($videorowExist)) {
                        $videoAction = DB::table('clients_gallery_videos')
                                        ->where([['clients_gallery_videos_id',$videorowExist[0]->clients_gallery_videos_id],['clients_gallery_videos_galleryid',$galleryId],
                                        ['clients_gallery_videos_row',(int)$k+1]])->update($videoData);
                    } else {
                        $videoAction = insertQuery('clients_gallery_videos', $videoData);
                    }
                }
            }
        
        }

        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewclientgallery')->with($notify['type'], $notify['msg']);
    }






    public function AdminLogout(Request $req)
    {
        $req->session()->forget('admin_name');
        $req->session()->forget('admin_id');
        $req->session()->forget('admin_role');
        return redirect(ADMINURL);
    }
}
