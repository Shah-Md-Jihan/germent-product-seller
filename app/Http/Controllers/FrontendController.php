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
}
