@extends('layouts.dashboard_master_client')

@section('Category')
  active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-8 m-auto">
          <div class="card">
            <div class="card-header bg-info text-white">
                My Account
            </div>
            <div class="card-body">
              <p>Name: {{ Auth::user()->name }} <a href="#" class="ml-3">Edit</a></p>
              <p>Email: {{ Auth::user()->email }} <a href="#" class="ml-3">Edit</a></p>
              <p>Address: <a href="#" class="ml-3">Add+</a></p>

               
            </div>
          </div>
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
