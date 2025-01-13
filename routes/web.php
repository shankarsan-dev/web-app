<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("ramesh");

Route::get("/firstfile",function(){
    return view("firstfile");
});


Route::get("/id/{id}/name/{name}",function ($id, $name){
    return "<h1>id $id name $name </h1>";
    
}

)->whereNumber("id")->whereIn("name",(["ram","hari","shankarsan"]));


Route::get("/page/",function(){
    Route::get("/page1",function(){
return "<h1>You are hired</h1>";
    });
});

Route::get("/blade",function(){
    return view("bladetemplate");
})->name("blade");