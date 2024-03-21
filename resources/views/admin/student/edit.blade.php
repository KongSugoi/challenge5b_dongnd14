@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Student</li>
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
                    <label for="exampleInputUsername">Name</label>
                    <input type="text" class="form-control" value=" {{$getRecord->name}}" name="name" required placeholder="Enter name">
                  </div>                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value=" {{$getRecord->email}}" name="email" required placeholder="Enter email">                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control" value=" {{$getRecord->phone}}" name="phone" required placeholder="Enter phone number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" value=""name="password" required placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label>Profile Pic<span style="color: red"></span></label>
                    <input type="file" class="form-control" name="profile_pic">
                    @if(!empty($getRecord->getProfile()))
                      <img src="{{$getRecord->getProfile()}}" style="width: 100px;">
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Status<span style="color: red"></span></label>
                    <select class="form-control" required name="status">
                      <option value="">Select Status</option>
                      <option  {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                      <option  {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                    </select>
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