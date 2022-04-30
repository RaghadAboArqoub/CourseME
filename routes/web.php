<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomePageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/about', function () {
//     return view('website.about');
// });
//admin
Route::get('/admin-login',[AdminController::class,'index']);
Route::post('/admin-login',[AdminController::class,'login'])->name('admin_login');


//user
Route::get('/login', [UserController::class,'index']);
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/register', [UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'registration'])->name('registration');
    Route::get('/logout-admin',[AdminController::class,'logout'])->name('logout');
    Route::get('/logout',[HomePageController::class,'logout'])->name('userLogout');

Route::middleware(['protectedpagesadmin'])->group(function () {
    //user
    Route::get('/user-list',[UserController::class,'allUser'])->name('user_list');
    Route::get('/add-user', [UserController::class,'addUserView'])->name('add_user');
    Route::get('/edit-user/{id}', [UserController::class,'editUserView'])->name('editUserView');
    Route::post('/edit-user/{id}',[UserController::class,'editUser'])->name('editUser');
    Route::post('/add-user',[UserController::class,'addUser'])->name('addUser');
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/enroll-list',[AdminController::class,'enrollCourses'])->name('enroll_list');
        Route::post('/enroll/{course_id}/{user_id}',[AdminController::class,'enroll'])->name('enroll');

    //admin
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

//course
Route::get('/course-list',[CourseController::class,'index'])->name('course_list');
Route::get('/add-course', [CourseController::class,'addCourseView'])->name('add_course');
Route::post('/add-course',[CourseController::class,'addCourse'])->name('addCourse');
Route::get('/edit-course/{id}', [CourseController::class,'editCourseView'])->name('editCourseView');
Route::post('/edit-course/{id}',[CourseController::class,'editCourse'])->name('editCourse');
Route::delete('/delete-course/{id}', [CourseController::class, 'deleteCourse'])->name('deleteCourse');
//category
Route::get('/category-list',[CategoryController::class,'index'])->name('category_list');
Route::get('/add-category', [CategoryController::class,'addCategoryView'])->name('add_category');
Route::post('/add-category',[CategoryController::class,'addCategory'])->name('addCategory');
Route::get('/edit-category/{id}', [CategoryController::class,'editCategoryView'])->name('editCategoryView');
Route::post('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('editCategory');
Route::delete('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
   });
   Route::get('/',[HomePageController::class,'index'])->name('homePageView');
//feedback
Route::get('/feedback',[HomePageController::class,'feedBackView'])->name('index');
Route::get('/about',[HomePageController::class,'aboutUs']);

Route::post('/feedback',[HomePageController::class,'feedBack'])->name('feedBack');
Route::get('/courses',[HomePageController::class,'courseView'])->name('courseView');
Route::get('/course-page/{id}',[HomePageController::class,'courseViewButton'])->name('courseViewButton');
Route::post('/enroll/{id}',[HomePageController::class,'courseEnroll'])->name('courseEnroll');