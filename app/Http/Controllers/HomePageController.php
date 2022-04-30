<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedBack;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;

class HomePageController extends Controller
{
    //
    public function index(){
  $courses = Course::latest()->take(5)->get();

        return view('website.index', ['courses' => $courses]);
    }
    public function aboutUs(){

        return view('website.about');
    }
 public function feedBackView(){
        return view('website.feedback');
    }
    function feedBack(Request $request){
    $request->validate([
        'username' => 'required|string',
        'feedback' => 'required|string'
    ]);

    $FeedBack = new FeedBack();

                $FeedBack->username = $request->input('username');
                $FeedBack->feedback = $request->input('feedback');
				$FeedBack->save();
        return redirect()->back()->with('message', 'Thank you for your feedback');

}
public function courseView(){
$courses=Course::All();
$categories=Category::All();
 return view('website.coursepage',['courses' => $courses,'categories' => $categories]);

}

public function courseViewButton($course_id){
      $course = Course::findorfail($course_id);
      foreach ($course->users as $user) {
         $user->pivot->enroll_flag;
}
        return view('website.course', ['course' => $course]);
 }

public function courseEnroll($course_id){

    $user=new User();
    $user->id=Session()->get('user_id');

     if(!(Session()->has('user_id'))){
             return redirect()->back()->with('message', 'please login');
}
$result = User::find(Session()->get('user_id'))->course()->where('course_id', $course_id)
 ->where('enroll_flag',0)->first();
$result2 = User::find(Session()->get('user_id'))->course()->where('course_id', $course_id)
 ->where('enroll_flag',1)->first();

 if((Session()->has('user_id'))&&$result){
 return redirect()->back()->with('message', 'Please wait admin to accept your request');
}
if((Session()->has('user_id'))&&$result2){
return redirect()->back()->with('message', 'Admin Already accepted');
}
    else {
         $user->course()->attach($course_id);

 return redirect()->back()->with('message', 'request send');}



}
public function logout(Request $request){


    $request->session()->invalidate();

    return  redirect('/login');

}
}