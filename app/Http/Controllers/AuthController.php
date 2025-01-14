<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //


    function login(Request $request){
        return response()->json(["result"=>"Login Function"]);

    }
    function signup(Request $request){

        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $sucess["token"] = $user->createToken("web-app")->plainTextToken;
         $user["name"] = $user->name;
        return response()->json(["sucess"=>true,"result"=>$sucess,"message"=>"User created sucessfully"]);
        
        
    }
}
