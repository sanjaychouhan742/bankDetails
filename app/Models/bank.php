<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    use HasFactory;
    public $table = "bank";
    protected $guarded = [];
    // protected $table = [
    //    'first_name',
    //    'last_name',
    //    'image',
    //    'addharcard',
    //    'nominee_fullName',
    //    'nominee_account',
    //    '_token',
    // ];

    public function add($data){
    	$rs = bank::create($data);
    	return $rs;
    }
}
