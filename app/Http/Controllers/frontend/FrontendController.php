<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\frontend\FHelperController;
use App\Http\Controllers\admin\HelperController;

class FrontendController extends Controller
{

    public function OurClients()
    {
        $clients = FHelperController::getClients();
        return view('frontend.ourclients', compact('clients'));
    }

    public function ContactUs()
    {
        $socialMedia = HelperController::getSocialMedia();
        return view('frontend.contactus',compact('socialMedia'));
    }


    public function Faq()
    {
        return view('frontend.faq');
    }

    public function Gallery()
    {
        $categories = FHelperController::getClientsCategory();
        $clients = FHelperController::getClients();
        return view('frontend.gallery', compact('clients', 'categories'));
    }

    public function GalleryDetails($id)
    {
        try {
            $clientId = decryption($id);
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Something went wrong');
        }
        $clientGallery = FHelperController::getClientGalleryByClientIdInfo($clientId);
        $relatedProjects = [];
        if (count($clientGallery)) {
            $galleryAsset = FHelperController::getClientGalleryAssets($clientGallery[0]->clients_gallery_id);
            $relatedProjects = FHelperController::getRelatedClients($clientGallery[0]->clients_gallery_client);
        } else {
            $galleryAsset = ['images' => [], 'videos' => []];
        }
        return view('frontend.gallerydetails', compact('clientGallery', 'galleryAsset', 'relatedProjects'));
    }

    public function GetRelatedProjects($id)
    {
        return FHelperController::getRelatedClients($id);
    }

    public function HandlePages($pagename)
    {
        $pageContent = HelperController::getPageByName($pagename);
        if (!count($pageContent)) return redirect('/')->with('error', 'Invalid Action');
        return view('frontend.pagerender', compact('pageContent'));
    }

    public function HandleProductPages($parentname, $pagename)
    {
        $pageContent = HelperController::getProductSubPageByName($pagename);

        // echo '<pre>';

        // print_r($pageContent);
        // exit;

        // $at = [ 'hygenicwallcladding', 'wallprotection', 'ips', 'safetyflooring',  'doorsets'];
        // foreach($at as $at){
        //     $formData = ['product_pagename'=>'bioclad','product_subpagename'=>$at, 'product_content'=> $pageContent[0]->product_content,
        //                 'product_about'=>$pageContent[0]->product_about,'product_techincal_profile'=>$pageContent[0]->product_techincal_profile,
        //                 'product_techincal_documents'=>$pageContent[0]->product_techincal_documents,'product_joint_details'=>$pageContent[0]->product_joint_details,
        //                 'product_colours_finishes'=>$pageContent[0]->product_colours_finishes];
        //     insertQueryId('products', $formData);
        // }

        if (!count($pageContent)) return redirect('/')->with('error', 'Invalid Action');
        return view('frontend.productpage', compact('pageContent'));
    }
}
