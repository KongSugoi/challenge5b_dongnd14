@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{url('admin/admin/add')}}" class="btn btn-primary"> Add New Teacher </a>

            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">

          @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table of Teacher</h3>                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                        $counter = 1; 
                      @endphp
                      @foreach($getRecord as $value)                         
                        <tr>
                          <td>{{$counter}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->phone}}</td>
                          <td>{{$value->created_at}}</td>
                          <td>
                            <a href="{{url('admin/admin/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('admin/admin/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>                            
                            <a href="{{url('chat?receiver_id='.base64_encode($value->id))}}" class="btn btn-success">Send Message</a>                            
                          </td>                      
                        </tr>  
                      @php
                        $counter++; 
                      @endphp                 
                      @endforeach                      
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>                
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection