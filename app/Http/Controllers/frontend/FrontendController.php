<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\frontend\FHelperController;
use App\Http\Controllers\admin\HelperController;
use Mail;

class FrontendController extends Controller
{

    public function Home(){
        $pageContent = HelperController::getPageByName('home');
        $feature = HelperController::getFeature();
        // echo '<pre>';
        // print_r($pageContent);
        // exit;
        if (!count($pageContent)) return view('frontend.404');
        return view('frontend.home', compact('pageContent','feature'));
    }

    public function SendTestEmail(){
        Mail::send([], [], function ($message) {
            $message->to('tsubramaniyan2@gmail.com', 'Test')->subject('Test Email');
            $message->from(getenv('MAIL_USERNAME'), 'admin');
            $message->setBody('<h1>Hi, welcome user!</h1>', 'text/html');
          });

          echo 'Email Sent';
    }


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

    

    public function SubmitContact(Request $req){
        $formData = $req->except('_token');
        if($formData['name'] == '' || $formData['email'] == '' || $formData['number'] == '' || $formData['message'] == '') return back()->with('error','Please enter mandatory fields');
        return back()->with('success','Thank you for contacting GoHealthe. We will reach you soon');
    }

    public function Enquiry(Request $req){
        $formData = $req->except('_token');
        if($formData['name'] == '' || $formData['email'] == '' || $formData['number'] == '' || $formData['message'] == '') return back()->with('error','Please enter mandatory fields');
        return back()->with('success','Enquired Submitted');
    }


    public function Faq()
    {
        return view('frontend.faq');
    }

    public function Downloads(){
        return view('frontend.downloads');
    }

    public function Gallery()
    {
        $categories = FHelperController::getClientsCategory();
        $clients = FHelperController::getClients();
        // echo '<pre>';
        // print_r($categories);
        // exit;
        if(!count($categories) || !count($clients)) return view('frontend.404');
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
        if (!count($pageContent)) return view('frontend.404');
        return view('frontend.pagerender', compact('pageContent'));
    }

    public function HandleProductPages($parentname, $pagename)
    {
        $pageContent = HelperController::getProductSubPageByName($pagename);

        // echo '<pre>';

        // print_r($pageContent);
        // exit;

        if (!count($pageContent)) return view('frontend.404');
        return view('frontend.productpage', compact('pageContent'));
    }

    public function HandlePageType($parentname, $pagename)
    {
        $pageContent = HelperController::getPageTypeByName($pagename);

        // echo '<pre>';

        // print_r($pageContent);
        // exit;

        if (!count($pageContent)) return view('frontend.404');
        return view('frontend.pagetype', compact('pageContent'));
    }


    
}
