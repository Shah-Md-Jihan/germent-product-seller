@extends('layouts.dashboard_master')

@section('Category')
  active
@endsection
@section('brand')
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h6>
                Brand List
                <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".bd-example-modal-lg">Add New</a>
              </h6>
              <hr>
              @error ('brand_name')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @enderror
              @error ('brand_logo')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @enderror

              {{-- add_brand_alert start --}}
              @if (session('add_brand_alert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('add_brand_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- add_brand_alert end --}}
              {{-- brand_delete_alert start --}}
              @if (session('brand_delete_alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ session('brand_delete_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- brand_delete_alert end --}}
            </div>
            <div class="card-body">
              <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Brand Name</th>
                            <th>Brand Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $flag = 1;
                      @endphp
                      @forelse ($brands as $brand)
                        <tr>
                          <td>{{ $flag++ }}</td>
                          <td>{{ Str::title($brand->brand_name) }}</td>
                          <td>
                            <img src="{{ asset('uploads/brands/') }}/{{ $brand->brand_logo }}" alt="not found">
                          </td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('admin/brand/edit') }}/{{ $brand->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a href="{{ url('admin/brand/delete') }}/{{ $brand->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                          </td>
                        </tr>

                      @empty
                        <tr>
                          <td colspan="50">
                            <strong>No data to show</strong>
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>Sl No</th>
                          <th>Category Name</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                </table>

                <!-- Large modal -->

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding: 10px">

                      <form action="{{ route('add.brand') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Brand Name</label>
                          <input type="text" name="brand_name" class="form-control" placeholder="Enter category name!">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Brand Logo</label>
                          <input type="file" name="brand_logo" class="form-control" placeholder="Enter category name!">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                    </form>
                  </div>
                </div>

              <!--modal end-->

            </div>
          </div>
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
