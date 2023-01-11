@extends('layouts.dashboard_master')

@section('products')
  active
@endsection
@section('addproduct')
  active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Add Product</span>
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-12 m-auto">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Top Label Layout</h6>
            <p class="mg-b-20 mg-sm-b-30">A form with a label on top of each form control.</p>

            {{-- product_add_alert start --}}
            @if (session('product_add_alert'))
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                <strong>{{ session('product_add_alert') }}</strong>
              </div>
            </div>
          @endif
          {{-- product_add_alert end --}}

            <form action={{ route('productpost') }} method="post" enctype="multipart/form-data">
            <div class="form-layout">
              <div class="row mg-b-25">
                  @csrf
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="product_name" placeholder="Enter firstname">
                    @error ('product_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="quantity"  placeholder="Enter email address">
                    @error ('quantity')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control select2" name="category_id" data-placeholder="Choose country">
                      <option label="Choose category" selected disabled></option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ Str::title($category->category_name) }}</option>
                      @endforeach
                    </select>
                    @error ('category_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                
                
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="size" type="text" name="size" data-role="tagsinput">
                    @error ('size')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="color" placeholder="Enter lastname">
                    @error ('color')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
              </div><!-- row -->
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="selling_price"  placeholder="Enter email address">
                    @error ('selling_price')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                    {{-- <input class="form-control" id="summernote" name="details"> --}}
                    <textarea class="form-control" name="details"></textarea>
                    @error ('details')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                  </div>
                </div><!-- col-4 -->
                

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Image One(Thumbnail)<span class="tx-danger">*</span></label>
                    <label class="custom-file">
                      <input type="file" id="file" name="image1" class="custom-file-input" onchange="readURL(this);">
                      <span class="custom-file-control"></span>
                      <img id="image_one">
                    </label>
                  </div>
                  @error ('image1')
                      <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div><!-- col-4 -->

              </div><!-- row -->
              <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
              </form>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </div><!-- card -->
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
