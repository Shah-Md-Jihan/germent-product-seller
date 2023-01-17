<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\Product;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('is_admin');
  }

  // method addproduct start
  public function addproduct()
  {
    $categories = Category::all();
    $brands = Brand::all();
    return view('dashboard.add_product', compact('categories', 'brands'));
  }
  // method addproduct end

  // sub category collect by ajax
  public function getSubcat($category_id)
  {
    $cat = SubCategory::where('category_id', $category_id)->get();
    return json_encode($cat);
  }

  // method addproductpost start
  function addproductpost(Request $request)
  {
    print_r($request->all());
    // die();
    $request->validate([
      'product_name' => 'required',
      'category_id' => 'required',
      'quantity' => 'required',
      'size' => 'required',
      'color' => 'required',
      'selling_price' => 'required',
      'details' => 'required',
      'image1' => 'required|image',
    ]);
    $prouduct_id = Product::insertGetId([
      'product_name' => Str::title($request->product_name),
      'category_id' => $request->category_id,
      'quantity' => $request->quantity,
      'size' => $request->size,
      'color' => $request->color,
      'selling_price' => $request->selling_price,
      'details' => $request->details,
      'image1' => 'default.jpg',
      'created_at' => Carbon::now()
    ]);
    $product_image = $request->file('image1');
    $product_image_name = $prouduct_id . '.' . $product_image->getClientOriginalExtension();
    $product_image_location = base_path('public/uploads/product/' . $product_image_name);
    Image::make($product_image)->save($product_image_location);

    Product::find($prouduct_id)->update([
      'image1' => $product_image_name
    ]);

    echo "done";
    return back()->with('product_add_alert', 'Product info added successfully!');
  }
  // method addproductpost end


}
