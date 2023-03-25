<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateUsername(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name
        ]);

        return $this -> return_api(true,Response::HTTP_OK,'Successfully Update Data',$user,null);
    }
}
