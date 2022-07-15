<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
  public function index(){
  	$student = new student;
  	$student = $student->getAll();
  	return view('students.list',compact('student'));
  }

  public function add(){
   	return view('students.add');
   }

   public function store(Request $req){
   	 $validate = $req->validate([
	   	 'student_first_name' => 'required',
	     'student_last_name' => 'required',
	     'roll' =>'required',
   	 ]);
   	$student = new student;
    $data = $req->input();
    $rs = $student->add($data);
    return back();
   }

   public function edit($id){
      $student = new student;
      $student = $student->getStudent($id);
   	return view('students.edit',compact('student'));
   }

   public function update(Request $req){
   	$validate = $req->validate([
	   	 'student_first_name' => 'required',
	     'student_last_name' => 'required',
	     'roll' =>'required',
   	]);
   	$student = new student;
   	$data = $req->input();
   	unset($data["_token"]);
   	// echo "<pre>";
   	// print_r($data);
   	// die;
   	$student_id = $req->input('id');
   	$rs = $student->updateStudent($student_id,$data);
   	return redirect()->route('student.index');
   }

   public function delete($id){
   	$student = new student;
   	$rs = $student->deleteStudent($id);
   	return redirect()->route('student.index');
   }
}
