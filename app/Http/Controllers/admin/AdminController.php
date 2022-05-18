<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\HelperController;

class AdminController extends Controller
{
    public function AdminLogin(Request $req){
        if($req->admin_name !='' && $req->admin_password !=''){
            $isValidUser = DB::table('admin_details')->where([ ['admin_name', $req->input('admin_name')],
            ['admin_password', md5(trim($req->admin_password))],['status',1]])->get();
            if(count($isValidUser)){
                $req->session()->put('admin_name', $isValidUser[0]->admin_name);
                $req->session()->put('admin_id', $isValidUser[0]->admin_id);
                $req->session()->put('admin_role', $isValidUser[0]->admin_role);
                return redirect(ADMINURL.'/dashboard');
            }
        }
        return back()->withInput()->with('error','Invalid Credentials');
    }

    public function Dashboard(Request $req){
        return view('admin.dashboard');
    }

    // Admin Actions
    public function ViewAdmin(){
        $adminDetails = HelperController::getAdminDetailsExceptLoggedIn();
        return view('admin.viewadmin',compact('adminDetails'));
    }

    public function ManageAdmin(){
        return view('admin.actionadmin');
    }

    public function ActionAdmin($option,$id){
        $actionId = decryption($id);
        $adminData = HelperController::getAdminDetails($actionId);
        if(count($adminData) == 0) return redirect(ADMINURL.'/viewadmin');

        if($option == 'delete'){
            $delete = deleteQuery($actionId,'admin_details','admin_id');
            $notify = notification($delete);
            return redirect(ADMINURL.'/viewadmin')->with($notify['type'], 'Data Deleted Successfully');
        }
        return view('admin.actionadmin',['action'=>$option,'data'=>$adminData]);
    }

    public function SaveAdminDetails(Request $req){
        $formData =  $req->except(['_token','admin_id']);
        if($req->input('admin_id') == ''){
            $formData['admin_password'] = md5('root@123');
            $formData['admin_created_by'] =  1;
            $formData['admin_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQuery('admin_details',$formData);
        }else{
            $saveData = updateQuery('admin_details','admin_id',decryption($req->input('admin_id')),$formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL.'/viewadmin')->with($notify['type'], $notify['msg']);
    }


    // Category Actions
    public function ViewCategories(){
        $categoryDetails = HelperController::getCategories();
        return view('admin.viewcategory',compact('categoryDetails'));
    }

    public function ManageCategory(){
        return view('admin.actioncategory');
    }

    public function ActionCategory($option,$id){
        $actionId = decryption($id);
        $categoryData = HelperController::getCategories($actionId);
        if(count($categoryData) == 0) return redirect(ADMINURL.'/viewcategories');

        if($option == 'delete'){
            $delete = deleteQuery($actionId,'category_details','category_id');
            $notify = notification($delete);
            return redirect(ADMINURL.'/viewcategories')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actioncategory',['action'=>$option,'data'=>$categoryData]);
    }

    public function SaveCategoryDetails(Request $req){
        $formData =  $req->except(['_token','category_id']);

        if($req->input('category_id') == ''){
            $formData['category_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQueryId('category_details',$formData);
        }else{
            $saveData = updateQuery('category_details','category_id',decryption($req->input('category_id')),$formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL.'/viewcategories')->with($notify['type'], $notify['msg']);
    }


    // Brand Actions
    public function ViewClients(){
        $clientDetails = HelperController::getClients();
        return view('admin.viewclients',compact('clientDetails'));
    }

    public function ManageClient(){
        return view('admin.actionclient');
    }

    public function ActionClient($option,$id){
        $actionId = decryption($id);
        $clientData = HelperController::getClients($actionId);
        if(count($clientData) == 0) return redirect(ADMINURL.'/viewclients');

        if($option == 'delete'){
            $delete = deleteQuery($actionId,'client_details','client_id');
            $notify = notification($delete);
            return redirect(ADMINURL.'/viewclients')->with($notify['type'], 'Data Deleted Successfully');
        }

        return view('admin.actionclient',['action'=>$option,'data'=>$clientData]);
    }

    public function SaveClientDetails(Request $req){
        $formData =  $req->except(['_token','client_id','edit_image']);

        if($req->hasFile('client_logo')){
            $file = $req->file('client_logo');
            $destinationPath = 'admin/uploads/clients';
            $fileName = $file->getClientOriginalName();
            $fileExtension = explode('.',$fileName);

            if( strtolower(end($fileExtension)) != 'png' && strtolower(end($fileExtension)) != 'jpeg' &&  strtolower(end($fileExtension)) != 'jpg'){
                return redirect()->back()->withInput()->with('error', 'Please upload the valid image!');
            }

            $file->move($destinationPath,$fileName);
            $formData['client_logo'] = $fileName;
        }else{
            $formData['client_logo'] = $req->input('edit_image') !='' ? $req->input('edit_image') : '';
        }



        if($req->input('client_id') == ''){
            $formData['client_created_by'] =  $req->session()->get('admin_id');
            $saveData = insertQueryId('client_details',$formData);

        }else{

            $saveData = updateQuery('client_details','client_id',decryption($req->input('client_id')),$formData);
        }
        $notify = notification($saveData);
        return redirect(ADMINURL.'/viewclients')->with($notify['type'], $notify['msg']);
    }

    public function AdminLogout(Request $req){
        $req->session()->forget('admin_name');
        $req->session()->forget('admin_id');
        $req->session()->forget('admin_role');
        return redirect(ADMINURL);
    }


}
