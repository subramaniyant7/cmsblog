<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function Profile(){
        return view('frontend.profile');
    }

    public function Faq(){
        return view('frontend.faq');
    }
}
