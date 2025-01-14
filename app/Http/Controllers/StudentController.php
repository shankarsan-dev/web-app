<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     function list(){
         return Student::all();
     }
    // function addStudent(Request $req){
    //     $rules = array( 
    //         "name"=>"required|min:2|max:10",
    //         "email"=> "email|required",
    //         "phone"=> "required"
    //     );
       
    // //     $validation = Validator::make($req->all(),$rules);
    // //     if($validation->fails()){
    // //         return $validation->errors();
    // //     }
    // //     else{
    // //     $student = new Student();
    // //     $student->name = $req->name;
    // //     $student->email = $req->email;
    // //     $student->phone = $req->phone;
    // //         if($student->save()){
    // //             return ["result"=>"student added"];
    // //         }
    // //         else{
    // //             return ["result"=>" failed to add student"];
    // //         }
    // //     }
    // // }
    // }
    function addStudent(Request $req) {
        // Validation rules
        $rules = [
            "name" => "required|min:2|max:10",
            "email" => "required|email|unique:students,email",
            "phone" => "required|unique:students,phone"
           
        ];
        $messages = [
            "name.required" => "The name field is required.",
            "name.min" => "The name must be at least 2 characters.",
            "name.max" => "The name may not be greater than 10 characters.",
            "email.required" => "The email field is required.",
            "email.email" => "Please provide a valid email address.",
            "phone.required" => "The phone number is required.",
            "phone.unique" => "This phone number is already registered."
        ];
        // Validate the request
        $validation = Validator::make($req->all(), $rules,$messages);
        if ($validation->fails()) {
            // Return validation errors with 400 status code
            return response()->json([
                "error" => $validation->errors()
            ], 400);
        }
    else{
        // Create a new student instance
        $student = new Student();
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
    
        // Save the student and return appropriate response
        if ($student->save()) {
            return response()->json([
                "result" => "Student added successfully"
            ], 201); // HTTP 201 Created
        } else {
            return response()->json([
                "result" => "Failed to add student"
            ], 500); // HTTP 500 Internal Server Error
        }
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
