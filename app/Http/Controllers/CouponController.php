<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('is_admin');
  }

  // method coupon start
  public function coupon(){
    return view('dashboard.coupon',[
    'coupons' => Coupon::latest()->get(),
    ]);
  }
  // method coupon end

  // method couponstore start
  public function couponstore(Request $request){
    $request->validate([
      'coupon' => 'required|unique:coupons|max:50',
      'discount' => 'required|numeric',
    ]);
    Coupon::insert([
      'coupon' => $request->coupon,
      'discount' => $request->discount,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('coupon_add_alert','Coupon added successfully!');
  }
  // method couponstore end

  // method coupondeactive start
  public function coupondeactive($coupon_id){
    Coupon::find($coupon_id)->update([
      'status' => 2
    ]);
    return back();
  }
  // method coupondeactive end

  // method couponactive start
  public function couponactive($coupon_id){
    Coupon::find($coupon_id)->update([
      'status' => 1
    ]);
    return back();
  }
  // method couponactive end

  // method couponedit start
  public function couponedit($coupon_id){
    $coupon_info = Coupon::find($coupon_id);
    return view('dashboard.coupon_update', compact('coupon_info'));
  }
  // method couponedit end

  // method couponeditpost start
  public function couponeditpost(Request $request){
    $request->validate([
      'coupon' => ['required','max:50',Rule::unique('coupons')->where('id',$request->coupon_id)],
      'discount' => 'required|numeric',
    ]);
    Coupon::find($request->coupon_id)->update([
      'coupon' => $request->coupon,
      'discount' => $request->discount,
    ]);
    return back()->with('coupon_update_alert', 'Coupon updated successfully!');
  }
  // method couponeditpost start

  // method coupondelete start
  public function coupondelete($coupon_id){
    Coupon::find($coupon_id)->delete();
    return back()->with('coupon_delete_alert','Coupon deleted!');
  }
  // method coupondelete end

}
