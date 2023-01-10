@extends('layouts.dashboard_master')

@section('Category')
  active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Sub-category Table</span>
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-8 m-auto">
          <div class="card">
            @error ('subcategory_name')
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @enderror
            @if (session('subcategory_update_alert'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('subcategory_update_alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="card-header bg-info text-white">
              Sub-category Update
            </div>
            <div class="card-body">
              <form action={{ url('admin/sub/category/edit/post') }} method="post">
                @csrf
                <div class="mb-3">
                  <label>Subcategory Name</label>
                  <input type="text" name="subcategory_name" class="form-control" value="{{ $sub_category_info->subcategory_name }}">
                  <input type="hidden" name="subcategory_id" value="{{ $sub_category_info->id }}">
                  <input type="hidden" name="category_id" value="{{ $sub_category_info->category_id }}">
                </div>
                <div class="mb-3">
                  <label>Category</label>
                  <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if($category->id == $sub_category_info->category_id) selected @endif>{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="Update" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
