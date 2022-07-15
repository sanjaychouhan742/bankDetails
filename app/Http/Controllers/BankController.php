<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\bank;
=======
use App\Models\bank_detail;
>>>>>>> 095726324de77a1e8a74e2033a84d4f1bbc720bc
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
     public function add(){
    	return view('bank.add');
    }

    public function store(Request $req){
<<<<<<< HEAD
    	$validate = $req->validate([
           'first_name' => 'required|max:10',
           'last_name' => 'required|max:10',
           'image' => 'required|max:512',
           // 'addharcard' => 'min:12'
    	]);

    	$bank = new bank;
=======
    	$bank = new bank_detail;
>>>>>>> 095726324de77a1e8a74e2033a84d4f1bbc720bc
    	$data = $req->input();
       $images = $req->image;
       $fileName = time().'-'.Str::random(5).'.'.$images->extension();
        $file_upload = $images->move(public_path('bank'),$fileName);
        $data['image'] = $fileName;
        $rs = $bank->add($data);
      	return back();
      	Storage::disk('local')->put('example.txt',$data);
    }
<<<<<<< HEAD

=======
>>>>>>> 095726324de77a1e8a74e2033a84d4f1bbc720bc
}
