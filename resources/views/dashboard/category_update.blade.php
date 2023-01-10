@extends('layouts.dashboard_master')

@section('Category')
  active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Category Table</span>
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-8 m-auto">
          <div class="card">
            <div class="card-header bg-info text-white">
              Category Update
            </div>
            <div class="card-body">
              <form action="{{ url('admin/update/category/post') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label>Category Name</label>
                  <input type="text" name="category_name" class="form-control" value="{{ $category_info->category_name }}">
                  <input type="hidden" name="category_id" value="{{ $category_info->id }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
