<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories =Category::select(['id','category_name','category_visible'])->get();
        return view('admin.category',['categories' => $categories]);
    }
  public function addCategoryView(){
        return view('admin.addcategory');
    }
    public function addCategory(Request $request){
        $request->validate([
            'category_name'=>'required|string|regex:/^[\pL\s]+$/u|unique:categories',
       ]);
       $category=new Category();
        $category->category_name = $request->input('category_name');
        $category->category_visible = $request->input('category_visible')==TRUE?'0':'1';
        $category->save();
        return redirect()->back()->with('message', 'Category Added  successfully!');
    }
    public function categoryCount(){
        $categorycount = Category::All()->count();
        return view('admin.dashboard',['categorycount' => $categorycount]);
    }

    public function editCategoryView($id) {
        $categories = Category::find($id);
        return view('admin.editcategory', ['categories' => $categories]);

       }
    public function editCategory(Request $request,$id) {
        $request->validate([
            'category_name'=>'required|regex:/^[\pL\s]+$/u|unique:categories',

       ]);

       $category = Category::find($id);
       $category->category_name = $request->input('category_name');
       $category->category_visible = $request->input('category_visible')==TRUE?'0':'1';
       $category->update();
        return redirect()->back()->with('message', 'Category Updated successfully!');
        }
        public function deleteCategory($id)
    {
        Category::find($id)->delete();

        return redirect()->back()->with('message', 'Category Deleted successfully!');
    }

    }