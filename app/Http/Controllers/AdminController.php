<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UsersDetail;
use App\UsersPhoto;

class AdminController extends Controller
{



 public function login(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->input();
            //Attempt to login
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '1'])) {
                //Load the admin dashboard
                Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard');
            } else if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '0'])) {
                return redirect('/admin')->with('flash_message_error', 'You are not authorized to access the dashboard!');
            } else {
                return redirect('/admin')->with('flash_message_error', 'Your email or password is invalid!');
            }
        } elseif (Session::has('adminSession')) {
            return redirect('/admin/dashboard');
        }
        return view('admin.admin_login');
    }
    


    public function dashboard() {
        if (Session::has('adminSession')) {
            return view('admin.dashboard'); 
        } else {
            return redirect('admin')->with('flash_message_warning', "Please login as admin to access dashboard!");
        }
        
    }

    public function settings() {
        if (Session::has('adminSession')) {
            return view('admin.settings');
        } else {
            return redirect('admin')->with('flash_message_warning', "Please login as admin to access dashboard!");
        }
    }

    public function chkPassword(Request $request){
        if (Session::has('adminSession')) {
            $data = $request->all();
            $current_password = $data['current_pwd'];
            $check_password = User::where(['admin'=>'1'])->first();
            if(Hash::check($current_password,$check_password->password)){
                echo "true"; die;
            }else {
                echo "false"; die;
            }
        } else {
            return redirect('admin')->with('flash_message_warning', "Please login as admin to access dashboard!");
        }
    }

    public function updatePassword(Request $request){
        if (Session::has('adminSession')) {
            if($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>"; print_r($data); die;
                $check_password = User::where(['email' => Auth::user()->email])->first();
                $current_password = $data['current_pwd'];
                if(Hash::check($current_password,$check_password->password)){
                    $password = bcrypt($data['new_pwd']);
                    User::where('id','1')->update(['password'=>$password]);
                    return redirect('admin/settings')->with('flash_message_success', 'Password updated successfully!');
                }else {
                    return redirect('admin/settings')->with('flash_message_error', 'Your current password is wrong!');
                }
            }
        } else {
            return redirect('admin')->with('flash_message_warning', "Please login as admin to access dashboard!");            
        }
    }

    public function viewUsers(Request $request){
        if (Session::has('adminSession')) {
            $users = User::with('details')->with('photos')->where('admin', '!=', '1')->get();
            return view('admin.users.view_users')->with(compact('users'));

        } else {
            return redirect('admin')->with('flash_message_warning', "Please login as admin to access dashboard!");              
        }
    }

    public function updateUserStatus(Request $request) {
        $data = $request->all();
        UsersDetail::where('user_id',$data['user_id'])->update(['approved'=>$data['approved']]);            
    }
    public function updatePhotoStatus(Request $request) {
        $data = $request->all();
        UsersPhoto::where('id',$data['photo_id'])->update(['approved'=>$data['approved']]);
    }

    public function updateUserDetails(Request $request) {
        if($request->ajax() && Session::has('adminSession'))
        {
        $data = $request->all();
        UsersDetail::where('user_id',$data['user_id'])->update([
        'date_of_birth' => $data['date_of_birth'],
        'marital_status' => $data['marital_status'],
        'body_type' => $data['body_type'],
        'height' => $data['height'],
        'description' => $data['description'],
        'gender' => $data['gender'],
         ]);
        return "AJAX";
        } else {
            return redirect('admin')->with('flash_message_warning', "Please login as admin to access dashboard!");              
        }
        return redirect('/admin/view-users');  

    }

    public function deleteUser(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            User::where('id', $data['id'])->delete();
            return "true"; 
            return redirect('/admin/view-users');
        } else {
            return redirect('/login')->with('flash_message_warning', "Please login as admin to access dashboard!");
        }
    }    


    public function logout() {
        Session::flush();
        return redirect('admin')->with('flash_message_success', 'You have successfully logged out!');
    }
}
