<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function return_api ($isSuccess,$statusCode,$message,$data)
    {
        //structure data nak communicate mobile dengan api
        return response()->json([
            'isSuccess'=>$isSuccess,
            'status_code'=>$statusCode,
            'message'=>$message,
            'data'=>$data,
        ],$statusCode);
    }
}
