<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bank_detail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
     public function add(){
    	return view('bank.add');
    }

    public function store(Request $req){
    	$bank = new bank_detail;
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
