<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hostel extends Model
{
    use HasFactory;
    protected $fillable = [
      'hostel_name',
      'area',
      'warden',
      'status',
      'image',
];

public function getAll(){
	$rs = hostel::get();
	return $rs; 
}

public function add($data){
	$rs = hostel::create($data);
	return $rs;
}

public function getHostel($id){
  $rs = hostel::where(['id'=>$id])->first();
  return $rs;
}

public function updateHostel($id,$data){
  $rs = hostel::where(['id'=>$id])->update($data);
  return $rs;
}

public function deleteHostel($id){
  $rs = hostel::where(['id'=>$id])->update(['status'=>0]);
}

}
