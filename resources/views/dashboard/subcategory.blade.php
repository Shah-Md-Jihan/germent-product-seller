@extends('layouts.dashboard_master')

@section('Category')
  active
@endsection
@section('subcategory')
  active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Sub Category Table</span>
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-12">
          <div class="card">
            @error ('subcategory_name')
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @enderror
            {{-- add_subcategory_alert start --}}
            @if (session('add_subcategory_alert'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('add_subcategory_alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            {{-- add_subcategory_alert end --}}
            {{-- sub_category_delete_alert start --}}
            @if (session('sub_category_delete_alert'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('sub_category_delete_alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            {{-- sub_category_delete_alert end --}}

            <div class="card-header">
              <h6>
                Sub Category List
                <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".bd-example-modal-lg">Add New</a>
              </h6>
              <hr>
            </div>
            <div class="card-body">
              <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $flag = 1
                      @endphp
                      @forelse ($sub_categories as $sub_category)
                        <tr>
                          <td>{{ $flag++ }}</td>
                          <td>{{ $sub_category->subcategory_name }}</td>
                          <td>
                            {{ $sub_category->realationwithcategorytable->category_name }}
                          </td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('admin/sub/category/edit') }}/{{ $sub_category->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a href="{{ url('admin/sub/category/delete') }}/{{ $sub_category->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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

                      <form action="{{ route('post.subcategory') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Sub-Category Name</label>
                          <input type="text" name="subcategory_name" class="form-control" placeholder="Enter category name!">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Category</label>
                          <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Sub Category</button>
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
