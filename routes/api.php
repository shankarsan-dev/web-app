<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
Route::get('/user', function (Request $request) {
     return $request->user();})->middleware('auth:sanctum');

Route::get("/test",function(){
    return(["name"=>"ram","surname"=>"thapa"]);
});

Route::get("/students",[StudentController::class,"list"]);

Route::post("/students",[StudentController::class,"addStudent"]);

Route::put("/students/update",[StudentController::class,"updateStudent"]);

Route::put("/students/update/{id}",[StudentController::class,"updateStudentById"]);

Route::delete("/students/delete/{id}",[StudentController::class,"deleteStudent"]);

Route::get("/students/{name}",[StudentController::class,"searchStudent"]);

Route::get("/members",[MemberController::class,"index"]);

Route::post("/signup",[AuthController::class,"signup"]);
Route::post("/login",[AuthController::class,"login"]);


