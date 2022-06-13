<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\frontend\FHelperController;
use App\Http\Controllers\admin\HelperController;

class FrontendController extends Controller
{
    public function Profile(){
        $profilePage = HelperController::getPageByName('profile');
        return view('frontend.profile', compact('profilePage'));
    }

    public function Faq(){
        return view('frontend.faq');
    }

    public function Gallery(){

        $categories = FHelperController::getClientsCategory();
       

        $clients = FHelperController::getClients();
        //  echo '<pre>';
        // print_r($clients);
        // print_r($categories);
        // exit;
        // $categories = getActiveRecord('category_details');
        return view('frontend.gallery',compact('clients','categories'));
    }

    public function GalleryDetails($id){
        try{
            $clientId = decryption($id);
        }catch(\Exception $e){
            return redirect('/')->with('error','Something went wrong');
        }
        $clientGallery = FHelperController::getClientGalleryByClientIdInfo($clientId);
        if(count($clientGallery)){
            $galleryAsset = FHelperController::getClientGalleryAssets($clientGallery[0]->clients_gallery_id);
        }else{
            $galleryAsset = ['images' => [], 'videos' => []];
        }
        // $galleryAsset = FHelperController::getClientGalleryAssets($clientGallery[0]->clients_gallery_id);
        // echo '<pre>';
        // print_r($clientGallery);
        // print_r($galleryAsset);
        // exit;
        return view('frontend.gallerydetails', compact('clientGallery','galleryAsset'));
       
        
    }
}
