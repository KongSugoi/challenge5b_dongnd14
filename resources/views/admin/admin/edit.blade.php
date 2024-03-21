@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Teacher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Teacher</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">             
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputUsername">Username</label>
                    <input type="text" class="form-control" name="name" value="{{$getRecord->name}}" required placeholder="Enter username">
                  </div>                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{$getRecord->email}}" required placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="{{$getRecord->phone}}" required placeholder="Enter phone number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="" placeholder="Password">                    
                  </div>
                  <div class="form-group">
                    <label>Profile Pic<span style="color: red"></span></label>
                    <input type="file" class="form-control" name="profile_pic">
                    @if(!empty($getRecord->getProfile()))
                      <img src="{{$getRecord->getProfile()}}" style="width: 100px;">
                    @endif
                  </div>                              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>        
          </div>         
        </div>        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection