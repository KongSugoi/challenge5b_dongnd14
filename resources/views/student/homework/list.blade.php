@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> My Homework Board</h1>
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
                                        <th>Created Date</th>
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
                                                <a href="{{ asset('upload/homework/'.$value->document_file) }}" download>
                                                    {{ strlen($value->document_file) > 20 ? substr($value->document_file, 0, 20) . ' ..' : 
                                                        $value->document_file }}</a>
                                            @endif
                                        </td>
                                        <td>{!! $value->description !!}</td>
                                        <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('student/my_homework/submit_homework/'.$value->id)}}" class="btn btn-primary">Submit Homework</a>                                            
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