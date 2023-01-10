<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewslatterController extends Controller
{
  // method newsletter start
  public function newsletter(){
    return view('dashboard.newsletter',[
      'newsletters' => Newsletter::all(),
    ]);
  }
  // method newsletter end

  // method newsletteralldel start
  public function newsletteralldel(){
    $newsletters = Newsletter::all();
    foreach ($newsletters as $newsletter) {
      $newsletter->delete();
    }
    return back()->with('all_subcription_del_alert', 'All subcription deleted!');
  }
  // method newsletteralldel end

  // method newsletterdel start
  public function newsletterdel($newsletter_id){
    Newsletter::find($newsletter_id)->delete();
    return back()->with('sub_del_alert', 'Subcription deleted!');
  }
  // method newsletterdel end
}
