@extends('layouts.app')
@extends('layouts.header')
@section('content')

<div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('student/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
                    
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <a href="{{url('student/list')}}" class="info-box-text" >Total User</a>
                <span class="info-box-number"></span>
              </div>
            </div>
          </div>
          

        </div>
      </div>
    </section>
  </div>

  @endsection