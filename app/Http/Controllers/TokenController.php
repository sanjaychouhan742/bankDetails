<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\token;
use Illuminate\Support\str;

class TokenController extends Controller
{

    public function index_home(){
        return view('welcome/Welcome');
    }

    public function user_front(){
        return view('frontUser/view');
    }

	public function index(){
		$token = new token;
		$tokens = $token->getAll();
		// echo "<pre>";
		// print_r($tokens);
		// die;
		return view('token.list',compact('tokens'));
	}
    public function add(){
    	return view('token.add');
    }

    public function store(Request $req){
    	  $token = new token;
          $data = $req->input();
          $image = $req->image;
          $fileName = time().'-'.str::random(3).'.'.$image->extension();
          $filePath = $image->move(public_path('images/token'),$fileName);
          $data['image'] = $fileName;
          $rs = $token->add($data);
          return back();
    }

    public function edit($id){
    	$token = new token;
    	$tokens = $token->getToken($id);
    	return view('token.edit',compact('tokens'));
    }

    public function update(Request $req){
    	$token = new token;
    	$data = $req->input();
    	unset($data['_token']);
    	$image = $req->image;
    	$token_id = $req->input('id');
    	$fileName = time().'-'.str::random(3).'.'.$image->extension();
    	$filePath = $image->move(public_path('images/token'),$fileName);
    	$data['image'] = $fileName;
    	$rs = $token->updateToken($token_id,$data);
    	return redirect()->route('token.index');
    }

    public function delete($id){
    	$token = new token;
    	$rs = $token->deleteToken($id);
    	return redirect()->route('token.index');
    }
}
