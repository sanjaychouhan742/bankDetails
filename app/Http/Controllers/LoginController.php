<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Alert;


class LoginController extends Controller
{
    public function index(){
    	if (auth()->user()) {
    		return redirect()->route('home.index')->with('success', 'Created successfully!');
    	}
    	return view('admin/login');
    }

    public function user(){
    	$user = new User;
    	$user->name = "Sarita";
    	$user->email ="s@gmail.com";
    	$user->password=Hash::make('test@123');
    	$user->save();
    }

    public function autentication(Request $req){
    	$credentials = $req->validate([
             'email' => ['required','email'],
             'password' => 'required',
    	]);

    	if (Auth::attempt($credentials)) {
    		$req->session()->regenerate();
            alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
    	return redirect()->route('home.index');
    		
    	}
    	return back()->withInput();
    }
}
