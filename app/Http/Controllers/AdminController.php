<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Models\FeedBack;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //
    public function index(){

        return view("admin.login");
    }
    function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $admin_info = Admin::where('email',$email)->first();
        if(!$admin_info){
            return redirect()->back()->with('message', 'Email not recognize');
        }
        $hashed_pass = $admin_info->password;
        $result = Hash::check($password,$hashed_pass);
        if ($result) {
            Session()->put('admin_id',$admin_info->id);
          return redirect('/dashboard');
        }else{
            return redirect()->back()->with('message', 'Wrong Password');
        }
}
public function dashboard(){
    $usercount =User::All()->count();
        $feedback =FeedBack::All();

        $coursecount =Course::All()->count();
        $categorycount =Category::All()->count();
$req = User::with('course')->count();
            return view('admin.dashboard',['coursecount' => $coursecount,'usercount' => $usercount,'categorycount'=>$categorycount,'feedback'=>$feedback,'req'=>$req]);

}
public function logout(Request $request){


    $request->session()->invalidate();

    return  redirect('/admin-login');

}
public function enrollCourses(){

    $course = Course::All();

        return view('admin.enrollcourses', ['course'=>$course]);

}
public function enroll($courseid,$userid){
    $user=User::find($userid);
     $user->course()->sync([$courseid=>['enroll_flag' => 1]]);


 return redirect()->back()->with('message', 'request Accepted');





}
}