<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;

class TeachersController extends Controller
{

	public function index(){
		$teacher = new teacher;
		$teacher = $teacher->getAll();
		return view('teachers.list',compact('teacher'));

	}
    public function add(){
    	return view('teachers.add');
    }

    public function store(Request $req){
    	$validate = $req->validate([
            'name' => 'required',
            'surname' => 'required',
            'school' => 'required',
            'city' => 'required',
            'status' => 'required',
    	]);

    	$teacher = new teacher;
    	$data = $req->input();
    	$rs = $teacher->add($data);
    	return back();
    }

    public function edit($id){
    	$teacher = new teacher;
    	$teacher = $teacher->getTeachers($id);
    	// echo "<pre>";
    	// print_r($teacher);
    	// die;
    	return view('teachers.edit',compact('teacher'));

    }

    public function update(Request $req){
    	$validate = $req->validate([
              'name' => 'required',
              'surname' => 'required',
              'school' => 'required',
              'city' => 'required',
              'status' => 'required',
    	]);

    	$teacher = new teacher;
    	$data = $req->input();
    	unset($data["_token"]);
    	$teac_id = $req->input('id');
    	$rs = $teacher->updateTeacher($teac_id,$data);
    	return redirect()->route('teachers.index');
    }

    public function delete($id){
    	$teacher = new teacher;
    	$rs = $teacher->deleteTeacher($id);
    	return redirect()->route('teachers.index');
    }
}
