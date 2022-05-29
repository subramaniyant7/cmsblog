<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\HelperController;

class AjaxController extends Controller
{
    public function GetClientCategory(Request $request){
        $initialResponse = ['status' => false, 'data' => []];
        $msg = '';
        if($request->input('client_id') !=''){
            $categoryClients = HelperController::getClientByCategory($request->input('client_id'));
            if(!count($categoryClients)) $msg = 'No client found. Please choose valid category';
            $initialResponse = ['status' => true, 'data' => $categoryClients, 'msg' => $msg];
        }
        return response()->json($initialResponse);
    }
}
