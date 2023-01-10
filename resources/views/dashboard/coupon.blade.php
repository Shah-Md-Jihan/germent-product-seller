@extends('layouts.dashboard_master')
@section('coupon')
  active
@endsection
@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Coupon Table</span>
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h6>
                Coupon List
                <a href="#" class="btn btn-warning btn-sm" style="float: right;" data-toggle="modal" data-target=".bd-example-modal-lg">Add New</a>
              </h6>
              <hr>
            </div>
            <div class="card-body">
              @error ('coupon')
                <div class="alert alert-danger">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              @error ('discount')
                <div class="alert alert-danger">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror
              {{-- coupon_add_alert start --}}
              @if (session('coupon_add_alert'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('coupon_add_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- coupon_add_alert end --}}
              {{-- coupon_delete_alert start --}}
              @if (session('coupon_delete_alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ session('coupon_delete_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- coupon_delete_alert end --}}
              <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Coupon Name</th>
                            <th>Coupon Discount %</th>
                            <th>Validity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $flag = 1
                      @endphp
                      @foreach ($coupons as $coupon)
                        <tr>
                          <td>{{ $flag++ }}</td>
                          <td>{{ $coupon->coupon }}</td>
                          <td>
                            {{ $coupon->discount }}%
                          </td>
                          <td>
                            @if ($coupon->status == 1)
                              <span class="badge badge-success">Active</span>
                            @else
                              <span class="badge badge-secondary">Deactive</span>
                            @endif
                          </td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              @if ($coupon->status == 1)
                                <a href="{{ url('admin/coupon/deactive') }}/{{ $coupon->id }}" class="btn btn-secondary btn-sm"><i class="fa fa-toggle-on" aria-hidden="true"></i> Deactive</a>
                              @else
                                <a href="{{ url('admin/coupon/active') }}/{{ $coupon->id }}" class="btn btn-success btn-sm"><i class="fa fa-toggle-on" aria-hidden="true"></i> Active</a>
                              @endif
                              <a href="{{ url('admin/coupon/edit') }}/{{ $coupon->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a href="{{ url('admin/coupon/delete') }}/{{ $coupon->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>Sl No</th>
                          <th>Coupon Name</th>
                          <th>Coupon Discount %</th>
                          <th>Validity</th>
                          <th>Action</th>
                      </tr>
                    </tfoot>
                </table>

                <!-- Large modal -->

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding: 10px">

                      <form action="{{ route('store.coupon') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Coupon Name</label>
                          <input type="text" name="coupon" class="form-control" placeholder="Enter coupon name!">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Coupon Discount %</label>
                          <input type="text" name="discount" class="form-control" placeholder="Enter only value!">
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
