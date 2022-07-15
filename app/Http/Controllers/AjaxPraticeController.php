<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ajax;

class AjaxPraticeController extends Controller
{

	public function index(){
       return view('ajax.list');
	}

	public function ajaxFetch(){
		$ajax = new ajax;
		$ajaxs = $ajax->getAll();
		return response()->json([
          'ajaxs'=>$ajaxs,
		]);
	}

    public function add(){
     return view('ajax.add');
    }

    public function store(Request $req){
    	$ajax = new ajax;
    	$data = $req->input();
    	$rs = $ajax->add($data);
    	return response()->json(['sucess'=>1]);
    }

    public function edit($id){
    	$ajax = new ajax;
    	$ajaxs = $ajax->getAjax($id);
    	// echo "<pre>";
    	// print_r($ajaxs);
    	// die;
    	return view('ajax.edit',compact('ajaxs'));
    }

    public function update(Request $req){
    	$ajax = new ajax;
    	$data = $req->input();
    	unset($data['_token']);
    	$ajax_id = $req->input('id');
    	$rs = ajax::updateAjax($ajax_id,$data);
    	return response()->json([
           'ajax'=>$data,
    	]);
    } 
}
