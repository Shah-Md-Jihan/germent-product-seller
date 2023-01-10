@extends('layouts.dashboard_master')

@section('dashboard_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Coupon Update</span>
      </nav>
  <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-8 m-auto">
          <div class="card">
            <div class="card-header bg-info text-white">
              Coupon Update
            </div>
            <div class="card-body">
              {{-- coupon_update_alert start --}}
              @if (session('coupon_update_alert'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong>{{ session('coupon_update_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- coupon_update_alert end --}}
              <form action="{{ route('edit.coupon') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label>Coupon Name</label>
                  <input type="text" name="coupon" class="form-control" value="{{ $coupon_info->coupon }}">
                  <input type="hidden" name="coupon_id" value="{{ $coupon_info->id }}">
                  @error ('coupon')
                   <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
                <div class="mb-3">
                  <label>Coupon Discount%</label>
                  <input type="text" name="discount" class="form-control" value="{{ $coupon_info->discount }}">
                  @error ('discount')
                   <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
