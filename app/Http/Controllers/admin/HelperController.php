<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HelperController extends Controller
{
    static function getAdminDetailsExceptLoggedIn()
    {
        return DB::table("admin_details")
            ->select("admin_details.*", DB::raw("(SELECT admin_name FROM admin_details as t WHERE admin_details.admin_created_by = t.admin_id) as created_name"))
            ->where([['admin_id', '!=', Session::get('admin_id')], ['admin_id', '!=', 1]])
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

    static function getClientByCategory($id)
    {
        $data =  DB::table("client_details")->where([['client_category', $id],['status', 1]]);
        return $data->orderBy('client_id', 'desc')->get();
    }


    static function checkImageExistByRow($galleryId,$id)
    {
        return DB::table("clients_gallery_images")->where([['clients_gallery_images_galleryid', $galleryId],['clients_gallery_images_row', $id]])->get();
    }

    static function checkImageExistByGallery($id)
    {
        return DB::table("clients_gallery_images")->where('clients_gallery_images_galleryid', $id)->get();
    }

    static function checkVideoExistByRow($videoId,$id)
    {
        return DB::table("clients_gallery_videos")->where([['clients_gallery_videos_galleryid', $videoId],['clients_gallery_videos_row', $id]])->get();
    }

    static function checkVideoExistByGallery($id)
    {
        return DB::table("clients_gallery_videos")->where('clients_gallery_videos_galleryid', $id)->get();
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

    static function getClientGalleryByClientId($clietId){
        return DB::table("clients_gallery")->where('clients_gallery_client', $clietId)->get();
    }

    static function getClientVideos($id = '')
    {
        $data =  DB::table("clients_gallery_videos")->where('status', 1);
        if($id !=''){
            $data->where('clients_gallery_videos_id', $id);
        }
        return $data->orderBy('clients_gallery_videos_id', 'desc')->get();
    }

    static function getClientVideoByGalleryId($galleryId)
    {
        return DB::table("clients_gallery_videos")->where('clients_gallery_videos_galleryid', $galleryId)->get();
    }

    static function getAllPages($id = '')
    {
        $data =  DB::table("pages")->where('status', 1);
        if($id !=''){
            $data->where('page_id', $id);
        }
        return $data->orderBy('page_id', 'desc')->get();
    }

    static function getPageByName($name)
    {
        $data =  DB::table("pages")->where([['page_name', $name],['status', 1]]);
        return $data->orderBy('page_id', 'desc')->get();
    }

    static function getSubPageByName($name)
    {
        $data =  DB::table("subpage")->where([['subpage_name', $name],['status', 1]]);
        return $data->orderBy('subpage_id', 'desc')->get();
    }

    static function getSubPageByPageId($id)
    {
        $data =  DB::table("subpage")->where([['page_id', $id],['status', 1]]);
        return $data->orderBy('subpage_id', 'desc')->get();
    }

    static function getProductSubPageByName($name)
    {
        $data =  DB::table("products")->where([['product_subpagename', $name],['status', 1]]);
        return $data->orderBy('product_id', 'desc')->get();
    }


    static function getSocialMedia($id = '')
    {
        $data =  DB::table("social_media")->where('status', 1);
        if($id !=''){
            $data->where('social_media_id', $id);
        }
        return $data->orderBy('social_media_id', 'desc')->get();
    }

}
