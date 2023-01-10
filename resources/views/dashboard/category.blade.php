@extends('layouts.dashboard_master')

@section('Category')
  active
@endsection
@section('category')
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h6>
                Category List
                <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".bd-example-modal-lg">Add New</a>
              </h6>
              <hr>
              @error ('category_name')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @enderror
              @if (session('category_add_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('category_add_message') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              @if (session('category_update_alert'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong>{{ session('category_update_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- category_delete_alert start --}}
              @if (session('category_delete_alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ session('category_delete_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- category_delete_alert end --}}
            </div>
            <div class="card-body">
              <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $flag = 1;
                      @endphp
                      @forelse ($categories as $category)
                        <tr>
                          <td>{{ $flag++ }}</td>
                          <td>{{ Str::title($category->category_name) }}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('admin/update/category') }}/{{ $category->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a href="{{ url('admin/delete/category') }}/{{ $category->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                          </td>
                        </tr>

                      @empty
                        <div class="alert alert-danger">
                          <strong>No data to show</strong>
                        </div>
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

                      <form action="{{ route('add.category') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Add Category Name</label>
                          <input type="text" name="category_name" class="form-control" placeholder="Enter category name!">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Category</button>
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
