<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function list(){
        return Student::all();
    }

    function addStudent(Request $req){
        $student = new Student();
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;

        if($student->save()){
            return ["result"=>"student added"];
        }
        else{
            return ["result"=>" failed to add student"];
        }
    }
    function updateStudent(Request $req){
        $student = Student::find($req->id);
        $student->name = $req->name;
        $student->email= $req->email;
        $student->phone = $req->phone;

        if($student->save()){
            return(["result"=>"updated sucessfully"]);
        }
        else{
            return(["result"=>"update failed"]);
        }
    }
    function updateStudentById(Request $req,$id){
        $student = Student::find($id);
        $student->name = $req->name;
        $student->email= $req->email;
        $student->phone = $req->phone;

        if($student->save()){
            return(["result"=>"updated sucessfully"]);
        }
        else{
            return(["result"=>"update failed"]);
        }
    }

    
    

function deleteStudent($id){

    $student = Student::destroy($id);
    if($student){
        return (["result","sucessfully deleted"]);
    }
    else{
        return (["result","sucessfully deleted"]);
    }
}

function searchStudent($name){

    $student = Student::where('name','like',$name)->get();  

    if($student){
        return ["result"=>$student];
    }

    else{

        return (["result",  "no record found"]);
    }

 

}

    
}
