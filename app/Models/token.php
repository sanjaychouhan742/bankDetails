<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class token extends Model
{
    use HasFactory;
   public $table = "token";

    protected $fillable =([
    	'name',
    	'image',
    	'status',
    ]);

    public function add($data){
    	$rs = token::create($data);
    	return $rs;
    }

    public function getAll(){
    	$rs = token::get();
    	return $rs;
    }

    public function getToken($id){
    	$rs = token::where(['id'=>$id])->first();
    	return $rs;
    }

    public function updateToken($id,$data){
    	$rs = token::where(['id'=>$id])->update($data);
    	return $rs;
    }

    public function deleteToken($id){
    	$rs = token::where(['id'=>$id])->update(['status'=>0]);
    }
}
