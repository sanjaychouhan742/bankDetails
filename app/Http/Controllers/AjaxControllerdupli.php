<?php
// Duplicate
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
	public function getData(Request $req){
		$id = $req->input('id');
		$table_name = $req->input('table');
		$filtered_by = $req->input('filtered_by');
		$data = DB::table($table_name)
		       ->select('id','name')
		       ->where($id,$filtered_by)
		       ->get();
		 echo json_encode($data);
	}
}