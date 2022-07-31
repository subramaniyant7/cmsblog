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
            ->select('category_details.*', 'client_details.*', 'clients_gallery.*')
            ->where([['category_details.status', 1], ['client_details.status', 1], ['clients_gallery.status', 1]]);
        return $data->groupBy(['category_details.category_id'])->get();
    }

    static function getClients()
    {
        $data =  DB::table("client_details")
            ->join('clients_gallery', 'client_details.client_id', '=', 'clients_gallery.clients_gallery_client')
            ->join('category_details', 'client_details.client_category', '=', 'category_details.category_id')
            ->select('client_details.*')
            ->where([['client_details.status', 1], ['clients_gallery.status', 1], ['category_details.status', 1]]);
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

    static function getDocCategory()
    {
        DB::statement("SET SQL_MODE=''");
        $data =  DB::table("doc_category")
            ->join('documents', 'doc_category.doc_category_id', '=', 'documents.document_category')
            ->select('doc_category.*')
            ->where('doc_category.status', 1);
        return $data->groupBy('doc_category.doc_category_id')->get();
    }

    static function getCategoryDocument($categoryId)
    {
       return DB::table("documents")->where('document_category', $categoryId)->get();
    }
}
