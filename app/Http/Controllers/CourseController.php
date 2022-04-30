<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //7
    public function index(){
        $courses =Course::All();
        return view('admin.course',['courses' => $courses]);
    }
    public function courseCount(){
        $coursecount = Course::All()->count();
        return view('admin.dashboard',['coursecount' => $coursecount]);
    }

  public function addCourseView(){
       $categories = Category::all();
        return view('admin.addcourse',['categories'=>$categories]);
    }
    public function addCourse(Request $request){
        $request->validate([
            'title'=>'required|string|regex:/^[\pL\s]+$/u|unique:courses',
            'description'=>'string',
            'title'=>'required|string|regex:/^[\pL\s]+$/u|unique:courses',
            'second_resource'=>'string|active_url',
            'image'=>'required|image',
            'first_resource'=>'required|mimes:pdf',
       ]);

       $course=new Course();

       if($request->file('image')){
        $file= $request->file('image');
        $filename=$file->getClientOriginalName();
        $file-> move(public_path('images'), $filename);
        $course['image']= $filename;
    }
    if($request->file('first_resource')){
        $file= $request->file('first_resource');
        $filename= $file->getClientOriginalName();
        $file-> move(public_path('images'), $filename);
        $course['first_resource']= $filename;
    }
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->second_resource = $request->input('second_resource');
            $course->category_id = $request->category_id;

        $course->status = $request->input('category_visible')==TRUE?'0':'1';
        $course->save();


        return redirect()->back()->with('message', 'Course Added  successfully!');
    }
    public function editCourseView($id) {
        $courses = Course::find($id);
        return view('admin.editcourse', ['courses' => $courses]);

       }
    public function editCourse(Request $request) {
        $request->validate([
            'title'=>'required|string|regex:/^[\pL\s]+$/u|unique:courses',
            'description'=>'string',
            'title'=>'required|string|regex:/^[\pL\s]+$/u|unique:courses',
            'second_resource'=>'string|active_url',
            'image'=>'required|image',
            'first_resource'=>'required|mimes:pdf',
       ]);

       $course=new Course();

       if($request->file('image')){
        $file= $request->file('image');
        $filename=$file->getClientOriginalName();
        $file-> move(public_path('images'), $filename);
        $course['image']= $filename;
    }
    if($request->file('first_resource')){
        $file= $request->file('first_resource');
        $filename= $file->getClientOriginalName();
        $file-> move(public_path('images'), $filename);
        $course['first_resource']= $filename;
    }
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->second_resource = $request->input('second_resource');
            $course->category_id = $request->category_id;

        $course->status = $request->input('status')==TRUE?'0':'1';
        $course->save();
        return redirect()->back()->with('message', 'Course Updated  successfully!');
        }
        public function deleteCourse($id)
    {
        Course::find($id)->delete();

        return redirect()->back()->with('message', 'Course Deleted successfully!');
    }
}
