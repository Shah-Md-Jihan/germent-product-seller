<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('is_admin');
  }

  public function index(){
    return view('dashboard.category',[
      'categories' => Category::all(),
    ]);
  }

  public function addcategorypost(Request $request){
    $request->validate([
    'category_name' => 'required|unique:categories|max:50',
    ],[
      'category_name.required' => 'You sent a null category value!',
    ]);
    Category::insert([
      'category_name' => $request->category_name,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('category_add_message', 'Congratulations! Category Added Successfully.');
  }

  public function updatecategory($category_id){
    $category_info = Category::find($category_id);
    return view('dashboard.category_update', compact('category_info'));
  }

  public function updatecategorypost(Request $request){
    Category::find($request->category_id)->update([
      'category_name' => $request->category_name
    ]);
    return redirect(route('add.category'))->with('category_update_alert', 'Category name updated!');
  }

  public function deletecategorypost($category_id){
    Category::find($category_id)->delete();
    return redirect(route('add.category'))->with('category_delete_alert', 'Category deleted!');
  }

  // method subcategory start
  public function subcategory(){
    return view('dashboard.subcategory',[
      'categories' => Category::all(),
      'sub_categories' => SubCategory::latest()->get(),
    ]);
  }
  // method subcategory end

  // method subcategorypost start
  public function subcategorypost(Request $request){
    $request->validate([
      'subcategory_name' => 'required|unique:sub_categories|max:50',
    ]);
    SubCategory::insert([
      'subcategory_name' => $request->subcategory_name,
      'category_id' => $request->category_id,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('add_subcategory_alert', 'One sub category added!');
  }
  // method subcategorypost end

  // method subcategoryedit start
  public function subcategoryedit($subcategory_id){
    $sub_category_info = SubCategory::find($subcategory_id);
    return view('dashboard.subcategory_update', compact('sub_category_info'),[
      'categories' => Category::all(),
    ]);
  }
  // method subcategoryedit end

  // method subcategoryeditpost start
  public function subcategoryeditpost(Request $request){
    $request->validate([
      'subcategory_name' => ['required','max:50',Rule::unique('sub_categories')->where('category_id',$request->category_id)],
    ]);
    SubCategory::find($request->subcategory_id)->update([
      'subcategory_name' => $request->subcategory_name,
      'category_id' => $request->category_id,
    ]);
    return back()->with('subcategory_update_alert', 'Sub-category updated!');
  }
  // method subcategoryeditpost end

  // method subcategorydelete start
  public function subcategorydelete($subcategory_id){
    SubCategory::find($subcategory_id)->delete();
    return back()->with('sub_category_delete_alert', 'One Sub Category Deleted!');
  }
  // method subcategorydelete end
}
