@extends('layouts.dashboard_master')
@section('home')
  active
@endsection
@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>
  <div class="sl-pagebody">

    <div class="row row-sm">
      <div class="col-md-8 m-auto">
        <div class="card mb-5">
          <div class="card-header">
            Welcome, {{ Auth::user()->name }}
            <hr>
          </div>
          <div class="card-body">
            <p>All Users</p>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <th scope="row">1</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->name }}</td>
                  <td>
                    @if ($user->is_admin === 1)
                      {{ 'Admin' }}
                      @else
                      {{ "User" }}
                    @endif
                  </td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-warning btn-sm">Block</button>
                      <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                  </td>
                </tr>  
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
    </div><!-- row -->

  </div><!-- sl-pagebody -->
@endsection
