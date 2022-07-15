<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hostel;
use Illuminate\Support\Str;

class HostleController extends Controller
{
	public function index(){
      $hostel = new hostel;
      $hostel = $hostel->getAll();
      return view('hostel.list',compact('hostel'));
	}

    public function add(){
    	return view('hostel.add');
    }

    public function store(Request $req){
    	$validate = $req->validate([
           'hostel_name' => 'required',
           'area' => 'required',
           'warden' => 'required',
           'status' => 'required',
           'image'  => 'required',
    	]);

    	$hostel = new hostel;
    	$data = $req->input();
      $images = $req->image;
      $fileName = time().'-'.Str::random(5).'.'.$image->extension();
        $file_upload = $image->move(public_path('images'),$fileName);
        $data['image'] = $fileName;
        $rs = $hostel->add($data);
      	return back();
    }

    public function edit($id){
      $hostel = new hostel;
      $hostel = $hostel->getHostel($id);
      return view('hostel.edit',compact('hostel'));
    }

    public function update(Request $req){
      $validate = $req->validate([
          'hostel_name' => 'required',
           'area' => 'required',
           'warden' => 'required',
           'status' => 'required',
      ]);
      $hostel = new hostel;
      $data = $req->input();
      // echo "<pre>";
      // print_r($data);
      // die;
      unset($data["_token"]);
      $hostel_id = $req->input('id');
      $rs = $hostel->updateHostel($hostel_id,$data);
      return redirect()->route('hostel.index');
    }

    public function delete($id){
      $hostel = new hostel;
      $rs = $hostel->deleteHostel($id);
     return redirect()->route('hostel.index'); 
    }
}
