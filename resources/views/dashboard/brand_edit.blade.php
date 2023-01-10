@extends('layouts.dashboard_master')

@section('Category')
  active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Brand Table</span>
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-8 m-auto">
          <div class="card">
            <div class="card-header bg-info text-white">
              Brand Update
            </div>
            <div class="card-body">
              @error ('brand_name')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @enderror
              @error ('brand_logo')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @enderror
              @if (session('brand_update_alert'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong>{{ session('brand_update_alert') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <form action={{ route('edit.brand') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label>Brand Name</label>
                  <input type="text" name="brand_name" class="form-control" value="{{ $brand_info->brand_name }}">
                  <input type="hidden" name="brand_id" value="{{ $brand_info->id }}">
                </div>
                <div class="mb-3">
                  <label>Current Brand Logo</label><br>
                  <img src="{{ asset('uploads/brands') }}/{{ $brand_info->brand_logo }}" alt="not found">
                </div>
                <div class="mb-3">
                  <label>New Brand Logo</label>
                  <input type="file" name="brand_logo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
