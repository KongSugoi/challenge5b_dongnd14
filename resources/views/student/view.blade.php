@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Profile {{$getRecord->name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('student/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">View Profile</li>
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
                    <input type="text" class="form-control" value=" {{$getRecord->name}}" name="name" readonly>
                  </div>                   
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" value=" {{$getRecord->email}}" name="email" readonly>                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control" value=" {{$getRecord->phone}}" name="phone" readonly>
                  </div>                  
                  <div class="form-group">
                    <label>Profile Pic<span style="color: red"></span></label>                    
                    @if(!empty($getRecord->getProfile()))
                      <img src="{{$getRecord->getProfile()}}" style="width: 100px;">
                    @endif
                  </div>                                         
                </div>
                <!-- /.card-body -->                
              </form>
            </div>        
          </div>         
        </div>        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection