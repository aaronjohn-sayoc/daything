<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
{
    public function index() {
    	$recent_users = User::with('details')->with('photos')->where('admin', '!=', '1')->orderBy('created_at','DESC')->get();
/*    	echo "<pre>"; print_r($recent_users); die;*/
    	return view('index')->with(compact('recent_users'));
    }
}
