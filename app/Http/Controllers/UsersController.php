<?php

namespace App\Http\Controllers;

use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\UsersDetail;
use App\UsersPhoto;

class UsersController extends Controller
{
    public function register(Request $request) {
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$user = new User;
    		$user->name = $data['name'];
            $user->username = $data['username'];
    		$user->email = $data['email'];
    		$user->password = bcrypt($data['password']);
    		$user->save();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>0])) {
                /*echo "success"; die;*/
                Session::put('userSession', $data['username']);
                return redirect('/step/2');
            }            
    	}
    	return view('users.register');
    }

    public function checkEmail(Request $request) {
        	$data = $request->all();
        	$usersCount = User::where('email',$data['email'])->count();
        	if($usersCount>0){
        		echo 'false';
        	}else {
        		echo 'true';
        	}       
    }

    public function checkUsername(Request $request) {
            $data = $request->all();
            $usersCount = User::where('username',$data['username'])->count();
            if($usersCount>0){
                echo 'false';
            }else {
                echo 'true';
            }       

    }

    public function login(Request $request) {

        if ($request->isMethod('post')) {
            $data = $request->input();
            if(Auth::attempt(['username'=>$data['username'], 'password'=>$data['password'], 'admin'=>0])) {
                /*echo "success"; die;*/
                Session::put('userSession', $data['username']);
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
            return redirect('/login')->with('flash_message_error', "Please login as a user to access!");
        }
    }

    public function step3(Request $request) {
/*        $userProfileCount = UsersDetail::where(['user_id'=>Auth::user()['id'],'approved'=>0])->count();
        if($userProfileCount>0) {
            return redirect('/review');
        }*/
        if (Session::has('userSession')) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                if($request->hasFile('photo')) {
                    $files = $request->file('photo');
                    foreach($files as $file) {
                        //Upload photo at Folder
                        //Get photo extension
                        $extension = $file->getClientOriginalExtension();
                        //Give randon number to image and add to extension to avoid duplicates
                        $fileName = rand(111,99999).'.'.$extension;
                        //Set image path
                        $image_path = 'images/frontend_images/photos/'.$fileName;
                        //Intervetion code for uploading image
                        Image::make($file)->save($image_path);

                        //Add photos to users_photos table
                        $photo = new UsersPhoto;
                        $photo->photo = $fileName;
                        $photo->user_id = $data['user_id'];                   
                        $photo->save();   

                    }
                }
                else {
                    return redirect('/step/3')->with('flash_message_success', "You have NOT succesfully uploaded your photo(s)!");
                }
                return redirect('/step/3')->with('flash_message_success', "You have succesfully uploaded your photo(s)!");
            }
            $user_id = Auth::User()['id'];
            $user_photos = UsersPhoto::where('user_id',$user_id)->get();
            return view('users.step3')->with(compact('user_photos'));  
        } else {
            return redirect('/login')->with('flash_message_error', "Please login as a user to access!");
        }
    }

    public function deletePhoto($photo) {
        if (Session::has('userSession')){
            $user_id = Auth::User()->id;
            UsersPhoto::where(['user_id'=>$user_id, 'photo'=>$photo])->delete();
            //delete photo with PHP unlink function
            /*unlink('images/frontend_images/photos/'.$photo);*/

            //delete photo with Laravel
            File::delete('images/frontend_images/photos/'.$photo);
            return redirect()->back()->with('flash_message_success', "Photo has been deleted successfully!");       
        } else {
            return redirect('/login')->with('flash_message_error', "Please login as a user to access!");
        }
    }

    public function defaultPhoto($photo) {
        if (Session::has('userSession')){
            $user_id = Auth::User()->id;
            //Set all photos as non default
            UsersPhoto::where('user_id',$user_id)->update(['default_photo' => 'No']);
            //Make selected photo as default
            UsersPhoto::where(['user_id'=>$user_id, 'photo'=>$photo])->update(['default_photo' => 'Yes']);
            return redirect()->back()->with('flash_message_success', "Default photo has been set successfully!");       
        } else {
            return redirect('/login')->with('flash_message_error', "Please login as a user to access!");
        }
    }

    public function viewProfile($username) {
        if (Session::has('userSession')) {
        $userDetails = User::with('details')->with('photos')->where('username', $username)->first();
        return view ('users.profile')->with(compact('userDetails'));
            
        } else {
            return redirect('/login')->with('flash_message_error', "Please login as a user to access!");
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
            return redirect('/login')->with('flash_message_error', "Please login as a user to access!");
        }
        
    }

    public function logout() {
        Session::flush();
        return redirect()->action('IndexController@index');
    }    


}
