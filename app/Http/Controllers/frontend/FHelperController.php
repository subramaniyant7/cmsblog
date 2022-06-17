<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FHelperController extends Controller
{
    static function getClientGallery($id = '')
    {
        $data = DB::table("clients_gallery");
        if ($id != '') $data->where('clients_gallery_id', $id);
        return $data->orderBy('clients_gallery_id', 'desc')->get();
    }

    static function getClientGalleryByClientId($id)
    {
        return DB::table("clients_gallery")->where('clients_gallery_client', $id)->orderBy('clients_gallery_id', 'desc')->get();
    }

    static function getClientGalleryByClientIdInfo($id)
    {
        $data =  DB::table("clients_gallery")
            ->join('client_details', 'clients_gallery.clients_gallery_client', '=', 'client_details.client_id')
            ->join('category_details', 'clients_gallery.clients_gallery_category', '=', 'category_details.category_id')
            ->select(
                'clients_gallery.*',
                'client_details.client_name',
                'client_details.client_logo',
                'category_details.category_name',
            )->where('clients_gallery.clients_gallery_client', $id);
        return $data->orderBy('clients_gallery.clients_gallery_id', 'desc')->get();
    }

    static function getClientGalleryAssets($galleryId)
    {
        $data['images'] = DB::table("clients_gallery_images")->where('clients_gallery_images_galleryid', $galleryId)->get();
        $data['videos'] = DB::table("clients_gallery_videos")->where('clients_gallery_videos_galleryid', $galleryId)->get();
        return $data;
    }

    static function getClientsCategory()
    {
        DB::statement("SET SQL_MODE=''");
        $data =  DB::table("category_details")
            ->join('client_details', 'category_details.category_id', '=', 'client_details.client_category')
            ->join('clients_gallery', 'category_details.category_id', '=', 'clients_gallery.clients_gallery_category')
            ->select('category_details.*');
        return $data->groupBy(['category_details.category_id'])->get();
    }

    static function getClients()
    {
        $data =  DB::table("client_details")
            ->join('clients_gallery', 'client_details.client_id', '=', 'clients_gallery.clients_gallery_client')
            ->select('client_details.*');
        return $data->get();
    }

    static function getRelatedClients($id)
    {
        $data =  DB::table("client_details")
            ->join('clients_gallery', 'client_details.client_id', '=', 'clients_gallery.clients_gallery_client')
            ->select('client_details.*')
            ->where('client_details.client_id', '!=', $id);
        return $data->inRandomOrder()->take(2)->get();
    }

}
