<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'surname',
      'school',
      'city',
      'status',  

    ];

    public function getAll(){
    	$rs = teacher::get();
    	return $rs;
    }

    public function add($data){
    	$rs = teacher::create($data);
    	return $rs;
    }

    public function getTeachers($id){
    	$rs = teacher::where(['id'=>$id])->first();
    	return $rs;
    }

    public function updateTeacher($id,$data){
    	$rs = teacher::where(['id'=>$id])->update($data);
    	return $rs;
    }

    public function deleteTeacher($id){
    	$rs = teacher::where(['id'=>$id])->update(['status'=>0]);
    	return $rs;
    }
}
