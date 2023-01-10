@extends('layouts.dashboard_master')
@section('home')
  active
@endsection
@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>
  <div class="sl-pagebody">

    <div class="row row-sm">
      <div class="col-md-8 m-auto">
        <div class="card mb-5">
          <div class="card-header">
            Admin
            <hr>
          </div>
          <div class="card-body">
            <p>You are logged in!</p>
          </div>
        </div>
    </div><!-- row -->

  </div><!-- sl-pagebody -->
@endsection
