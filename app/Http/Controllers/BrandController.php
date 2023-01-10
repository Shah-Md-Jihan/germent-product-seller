<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use Image;

class BrandController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('is_admin');
  }
  public function addbrand(){
    return view('dashboard.brand',[
      'brands' => Brand::latest()->get(),
    ]);
  }

  public function addbrandpost(Request $request){
    // form validation
    $request->validate([
      'brand_name' => 'required|unique:brands|max:50',
      'brand_logo' => 'required|image',
    ]);
    // data insert
    $brand_id = Brand::insertGetId([
      'brand_name' => $request->brand_name,
      'brand_logo' => 'default.jpg',
      'created_at' => Carbon::now(),
    ]);
    $brand_image = $request->file('brand_logo');
    $brand_image_new_name = $brand_id.'.'.$brand_image->getClientOriginalExtension();
    $brand_image_upload_location = base_path('public/uploads/brands/').$brand_image_new_name;
    Image::make($brand_image)->resize(113, 20)->save($brand_image_upload_location);

    // brand logo name update start
    Brand::find($brand_id)->update([
      'brand_logo' => $brand_image_new_name,
    ]);
    return back()->with('add_brand_alert', 'One brand item added!');
    // brand logo name update end
  }

  // method editbrand start
  public function editbrand($brand_id){
    $brand_info = Brand::find($brand_id);
    return view('dashboard.brand_edit',compact('brand_info'));
  }
  // method editbrand end

  // method editbrandpost start
  public function editbrandpost(Request $request){
    // form validation
    $request->validate([
      'brand_name' => 'required|unique:brands|max:50',
      'brand_logo' => 'image',
    ]);
    if ($request->hasFile('brand_logo')){
      $current_brand_logo = base_path('public/uploads/brands/').Brand::find($request->brand_id)->brand_logo;
      unlink($current_brand_logo);
      $brand_image = $request->file('brand_logo');
      $brand_image_new_name = $request->brand_id.'.'.$brand_image->getClientOriginalExtension();
      $brand_image_upload_location = base_path('public/uploads/brands/').$brand_image_new_name;
      Image::make($brand_image)->resize(113, 20)->save($brand_image_upload_location);
      Brand::find($request->brand_id)->update([
        'brand_name' => $request->brand_name,
        'brand_logo' => $brand_image_new_name,
      ]);
    }
    else{
      Brand::find($request->brand_id)->update([
        'brand_name' => $request->brand_name,
      ]);
    }
    return back()->with('brand_update_alert', 'Brand updated successfully!');

  }
  // method editbrandpost end

  // deletebrand start
  public function deletebrand($brand_id){
    $current_brand_logo = base_path('public/uploads/brands/').Brand::find($brand_id)->brand_logo;
    unlink($current_brand_logo);
    Brand::find($brand_id)->delete();
    return back()->with('brand_delete_alert', 'One brand item deleted!');
  }
  // deletebrand end
}
