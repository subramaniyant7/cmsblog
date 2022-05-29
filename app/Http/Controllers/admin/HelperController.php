<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class HelperController extends Controller
{
    static function getAdminDetailsExceptLoggedIn()
    {
        return DB::table("admin_details")
            ->select("admin_details.*", DB::raw("(SELECT admin_name FROM admin_details as t WHERE admin_details.admin_created_by = t.admin_id) as created_name"))
            ->where([['admin_id', '!=', Session::get('admin_id')], ['admin_name', '!=', 'root']])
            ->get();
    }

    static function getAdminDetails($id = '')
    {
        $admin = DB::table('admin_details');
        if ($id != '')  $admin->where('admin_id', $id);
        return $admin->get();
    }

    static function getCategories($id = '')
    {
        $data =  DB::table("category_details")
            ->select(
                "category_details.*",
                DB::raw("(SELECT admin_name FROM admin_details WHERE category_created_by = admin_details.admin_id) as created_name"),
            );
        if ($id != '') $data->where('category_id', $id);
        return $data->orderBy('category_id', 'desc')->get();
    }

    static function getClients($id = '')
    {
        $data =  DB::table("client_details")
            ->join('admin_details', 'client_details.client_created_by', '=', 'admin_details.admin_id')
            ->join('category_details', 'client_details.client_category', '=', 'category_details.category_id')
            ->select('client_details.*', 'admin_details.admin_name as created_name', 'category_details.category_name');
        if ($id != '') {
            $data->where('client_details.client_id', $id);
        }
        return $data->orderBy('client_id', 'desc')->get();
    }

    static function getSubCategories($id = '')
    {
        $data =  DB::table("sub_category")
            ->select(
                "sub_category.*",
                DB::raw("(SELECT admin_name FROM admin_details WHERE sub_category_created_by = admin_details.admin_id) as created_name"),
            );
        if ($id != '') $data->where('sub_category_id', $id);
        return $data->orderBy('sub_category_id', 'desc')->get();
    }

    static function getClientGallery($id = '')
    {
        $data =  DB::table("clients_gallery")
            ->join('client_details', 'clients_gallery.clients_gallery_client', '=', 'client_details.client_id')
            ->join('category_details', 'clients_gallery.clients_gallery_category', '=', 'category_details.category_id')
            ->leftjoin('sub_category', 'clients_gallery.clients_gallery_subcategory', '=', 'sub_category.sub_category_id')
            ->leftjoin('admin_details', 'clients_gallery.clients_gallery_created_by', '=', 'admin_details.admin_id')
            ->select("clients_gallery.*",'client_details.client_name','category_details.category_name','sub_category.sub_category_name','admin_details.admin_name as created_name');
        if ($id != '') $data->where('clients_gallery_id', $id);
        return $data->orderBy('clients_gallery_id', 'desc')->get();
    }
}
