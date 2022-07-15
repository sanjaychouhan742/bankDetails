<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ajax extends Model
{
  public $table ="ajax";

  protected $fillable = ([
     'name',
     'email',
  ]);
  
  public function getAll(){
  	$rs = ajax::get();
  	return $rs;
  }

  public function add($data){
  	$rs = ajax::create($data);
  	return $rs;
  }

  public function getAjax($id){
  	$rs = ajax::where(['id'=>$id])->first();
  	return $rs;
  }

  public function updateAjax($id,$data){
  	$rs = ajax::where(['id'=>$id])->update($data);
  	return $rs;
  }
}
