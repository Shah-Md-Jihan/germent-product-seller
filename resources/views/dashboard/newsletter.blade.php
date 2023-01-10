@extends('layouts.dashboard_master')
@section('others')
  active
@endsection
@section('newsletter')
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
                <a href="{{ route('all.del.newsletter') }}" class="btn btn-danger btn-sm" style="float: right;" >All Delete</a>
              </h6>
              <hr>
            </div>
            <div class="card-body">
              {{-- all_subcription_del_alert start --}}
              @if (session('all_subcription_del_alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ session('all_subcription_del_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- all_subcription_del_alert end --}}
              {{-- sub_del_alert start --}}
              @if (session('sub_del_alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{ session('sub_del_alert') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              {{-- sub_del_alert end --}}
              <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Email</th>
                            <th>Subsribed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                        $flag = 1
                      @endphp
                      @foreach ($newsletters as $news)
                        <tr>
                          <td>{{ $flag++ }}</td>
                          <td>{{ $news->email }}</td>
                          <td>{{ $news->created_at->diffForHumans() }}</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ url('newsletter/delete') }}/{{ $news->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <th>Sl No</th>
                          <th>Email</th>
                          <th>Subsribed</th>
                          <th>Action</th>
                      </tr>
                    </tfoot>
                </table>



            </div>
          </div>
        </div>
      </div><!-- row -->
  </div><!-- sl-pagebody -->
@endsection
