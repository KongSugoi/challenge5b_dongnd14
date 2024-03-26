@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Homework Board</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/homework/homework/add')}}" class="btn btn-primary">Add New Homework</a>
                </div>
            </div>  
        </div>
    </section>
    <section class="content">
        <div class= "container-fluid">
            <div class="row">
                <div class = "col-md-12">

                @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Homework List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Homework Date</th>
                                        <th>Submission Date</th>
                                        <th>Document</th>
                                        <th>Description</th>
                                        <th>Create Date</th>
                                        <th>Action<th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $counter = 1; 
                                @endphp
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{date('d-m-Y',strtotime($value->homework_date))}}</td>
                                        <td>{{date('d-m-Y',strtotime($value->submission_date))}}</td>
                                        <td>
                                            @if(!empty($value->getDocument()))
                                                <a href="{{ asset('upload/homework/'.$value->document_file) }}" download>{{ $value->document_file }}</a>
                                            @endif
                                        </td>
                                        <td>{!! $value->description !!}</td>
                                        <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/homework/homework/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('admin/homework/homework/delete/'.$value->id)}}" class="btn btn-danger">Delete</a> 
                                            <a href="{{url('admin/homework/homework/submitted/'.$value->id)}}" class="btn btn-success">Submitted Homework</a>                            
                                        </td>
                                    </tr>
                                    @php
                                        $counter++; 
                                    @endphp
                                    @empty
                                    <tr>
                                        <td colspan="100%">Record not found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection