<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function index(){
        return view('website.login');
   }
   public function register(){
    return view('website.registration');
}
   public function registration(Request $request){
       $request->validate([
           'first_name'=>'required|string|regex:/^[\pL\s]+$/u',
           'last_name'=>'required|string|regex:/^[\pL\s]+$/u',
           'email'=>'required|email|unique:users',
           'password'=>'required',
           'confirm_password'=>'required',

      ]);
      $confirmpassword= $request->input('confirm_password');
      $password= $request->input('password');
      $user = new User;
      if($confirmpassword==$password){
                $user->first_name = $request->input('first_name');
                $user->last_name = $request->input('last_name');
				$user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
				$user->save();

             return redirect()->back()->with('message', 'Account created  successfully!');
      }
      else{
        return redirect()->back()->with('error','password  and confirm password not equals!');
      }
   }
   function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    $email = $request->input('email');
    $password = $request->input('password');
    $user_info = User::where('email',$email)->first();
    if(!$user_info){
        return redirect()->back()->with('message', 'Email not recognize');
    }
    $hashed_pass = $user_info->password;
    $result = Hash::check($password,$hashed_pass);
    if ($result) {
        Session()->put('user_id',$user_info->id);
      return redirect('/');
    }else{
        return redirect()->back()->with('message', 'Wrong Password');
    }
}
public function allUser(){
    $users =User::All();
    return view('admin.user',['users' => $users]);
}
public function addUserView(){
    return view('admin.adduser');
}
public function addUser(Request $request){
    $request->validate([
        'first_name'=>'required|string|regex:/^[\pL\s]+$/u',
        'last_name'=>'required|string|regex:/^[\pL\s]+$/u',
        'email'=>'required|email|unique:users',
        'password'=>'required',
        'confirm_password'=>'required',

   ]);
   $confirmpassword= $request->input('confirm_password');
   $password= $request->input('password');
   $user = new User;
   if($confirmpassword==$password){
             $user->first_name = $request->input('first_name');
             $user->last_name = $request->input('last_name');
             $user->email = $request->input('email');
             $user->password = Hash::make($request->input('password'));
             $user->save();

          return redirect()->back()->with('message', 'Account created  successfully!');
   }
   else{
     return redirect()->back()->with('error','password  and confirm password not equals!');
   }
}
public function userCount(){
    $usercount = User::All()->count();
    return view('admin.dashboard',['usercount' => $usercount]);
}
public function deleteUser($id)
{
    User::find($id)->delete();
    return redirect()->back()->with('message', 'User Deleted successfully!');
}
public function editUserView($id) {
    $users = User::find($id);
    return view('admin.edituser', ['users' => $users]);

   }
   public function editUser(Request $request,$id) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
   $email = $request->input('email');
    $password = $request->input('password');
    $user_info = User::where('email',$email)->first();
    if(!$user_info){
        return redirect()->back()->with('message', 'Email not recognize');
    }
    $hashed_pass = $user_info->password;
    $result = Hash::check($password,$hashed_pass);
    if ($result) {
        Session()->put('user_id',$user_info->id);
             return redirect()->back()->with('message', 'User added successfully');

    }else{
        return redirect()->back()->with('message', 'Wrong Password');
    }}
}
