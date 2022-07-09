<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
     public function add(){
    	return view('bank.add');
    }

    public function store(Request $req){
    	$validate = $req->validate([
           'first_name' => 'required|max:10',
           'last_name' => 'required|max:10',
           'image' => 'required|max:512',
           // 'addharcard' => 'min:12'
    	]);

    	$bank = new bank;
    	$data = $req->input();
       $images = $req->image;
       $fileName = time().'-'.Str::random(5).'.'.$images->extension();
        $file_upload = $images->move(public_path('bank'),$fileName);
        $data['image'] = $fileName;
        $rs = $bank->add($data);
      	return back();
      	Storage::disk('local')->put('example.txt',$data);
    }

}
