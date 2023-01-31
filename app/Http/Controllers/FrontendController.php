<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class FrontendController extends Controller
{
  public function index()
  {
    return view('pages.index', [
      'categories' => Category::all(),
      'products' => Product::latest()->limit(8)->get(),
    ]);
  }
  public function storenewslatter(Request $request)
  {
    $request->validate([
      'email' => 'required|email|unique:newsletters|max:55',
    ], [
      'email.unique' => 'You have already been subcribed!',
    ]);
    Newsletter::insert([
      'email' => $request->email,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('add_subcription_alert', "Thanks for subcribed!");
  }

  public function productsingle($product_id)
  {
    $product_info = Product::find($product_id);
    return view("pages.single_product", compact('product_info'));
  }

  public function shop()
  {
    return view('pages.shop', [
      'products' => Product::latest()->paginate(3),
    ]);
  }

  public function about()
  {
    return view('pages.about');
  }

  public function faq()
  {
    return view('pages.faq');
  }

  public function contact()
  {
    return view('pages.contact');
  }

  public function categoryproduct($category_id)
  {
    return view('pages.single_category_product', compact('category_id'), [
      'products' => Product::where('category_id', $category_id)->paginate(3),
    ]);
  }
}
