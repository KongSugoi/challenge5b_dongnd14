@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
              <a href="{{url('admin/subject/add')}}" class="btn btn-primary"> Add New Subject </a>

            
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
                <h3 class="card-title">Table of Subject</h3>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($getRecord as $value)                         
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->type}}</td>
                          <td>
                            @if($value->status ==0)
                                Active
                            @else
                                Inative
                            @endif
                          </td>                         
                          <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                          <td>
                            <a href="{{url('admin/subject/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('admin/subject/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>                            
                          </td>                      
                        </tr>                   
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