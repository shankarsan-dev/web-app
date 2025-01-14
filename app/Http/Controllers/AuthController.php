<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //


    function login(Request $request){

        $user = User::where("email",$request->email)->first();
        if (!$user) {
            return response()->json(["result" => "user not found"], 404);
        }
    
        if(!Hash::check($request->password,$user->password)){

            return response()->json(["result"=>"password dont match"],404);
        }
        else{
            $success['token'] = $user->createToken('web-app')->plainTextToken;
            $user['name'] = $user->name;

            return response()->json(["sucess"=>true,"result"=>$success,"message"=>"login sucessful"],201);
        }
     

    }
    function signup(Request $request){

        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success["token"] = $user->createToken("web-app")->plainTextToken;
         $user["name"] = $user->name;
        return response()->json(["succcess"=>true,"result"=>$success,"message"=>"User created sucessfully"]);
        
        
    }
}
