<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\UsersDetail;

class UsersController extends Controller
{
    public function register(Request $request) {
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$user = new User;
    		$user->name = $data['name'];
    		$user->email = $data['email'];
    		$user->password = bcrypt($data['password']);
    		$user->save();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>0])) {
                /*echo "success"; die;*/
                Session::put('userSession', $data['email']);
                return redirect('/step/2');
            }            
    	}
    	return view('users.register');
    }

    public function checkEmail(Request $request) {
        if (Session::has('userSession')){
        	$data = $request->all();
        	$usersCount = User::where('email',$data['email'])->count();
        	if($usersCount>0){
        		echo 'false';
        	}else {
        		echo 'true';
        	}       
        } else {
            return redirect('/login');
        }
    }

    public function login(Request $request) {

        if ($request->isMethod('post')) {
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>0])) {
                /*echo "success"; die;*/
                Session::put('userSession', $data['email']);
                return redirect('/step/2');
            } else {
                /*echo "failed"; die;*/
                return Redirect::back()->with('flash_message_error', "Invalid username or password!");
            }
        }  elseif (Session::has('userSession')) {
            return redirect('/');
                    
        }
        return view('users.login');
    }

    public function step2(Request $request) {

        //Check if dating profile already exists
        $userProfileCount = UsersDetail::where(['user_id'=>Auth::user()['id'],'approved'=>0])->count();
        if($userProfileCount>0) {
            return redirect('/review');
        }

        if($request->isMethod('post')) {

            $data = $request->all();

            if(empty($data['user_id'])){
                $userDetail = new UsersDetail;
                $userDetail->user_id = Auth::User()['id'];
            }else{
                $userDetail = UsersDetail::where('user_id', $data['user_id'])->first();  
                $userDetail->approved = '0';              
            }

            $userDetail->date_of_birth = $data['date_of_birth'];
            $userDetail->gender = $data['gender'];
            $userDetail->height = $data['height'];
            $userDetail->marital_status = $data['marital_status'];
            $userDetail->body_type = $data['body_type'];
            $userDetail->description = $data['description'];
            $userDetail->save();
            return view('users.review');
        }
        if (Session::has('userSession')) {
            return view('users.step2');      
        } else {
            return redirect('/login');
        }
    }

    public function review() {
        if (Session::has('userSession')) {
            $user_id = Auth::User()['id'];
            $userApproval = UsersDetail::select('approved')->where('user_id',$user_id)->first();
            if($userApproval->approved == 1) {
                return redirect('/step/2');
            } else {
                return view('users.review');                
            }
        }
        else {
            return redirect('/login');
        }
        
    }

    public function logout() {
        Session::flush();
        return redirect()->action('IndexController@index');
    }    



}
