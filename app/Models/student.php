<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable =
    [
     'student_first_name',
     'student_last_name',
     'roll',
];

 public function add($data){
 	$rs = student::create($data);
 	return $rs;
 }

 public function getAll(){
 	$rs = student::get();
 	return $rs;
 }

 public function getStudent($id){
 	$rs = student::where(['id' => $id])->first();
 	return $rs;
 }

 public function updateStudent($id,$data){
 	$rs = student::where(['id' => $id])->update($data);
 	return $rs;
 }

 public function deleteStudent($id){
 	$rs = student::where(['id' => $id])->delete();
 	return $rs;
 }
}
 