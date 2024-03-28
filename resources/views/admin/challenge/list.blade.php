@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Challenge Board</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{url('admin/homework/challenge/add')}}" class="btn btn-primary">Add New Challenge</a>
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
                            <h3 class="card-title">Challenge List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Challenge Date</th>
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
                                        <td>{{date('d-m-Y',strtotime($value->challenge_date))}}</td>                                        
                                        <td>
                                            @if(!empty($value->getDocument()))
                                                <a href="{{ asset('upload/challenge/'.$value->challenge_file) }}" download>{{ $value->challenge_file }}</a>
                                            @endif
                                        </td>
                                        <td>{!! $value->description !!}</td>
                                        <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/homework/challenge/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('admin/homework/challenge/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>                             
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