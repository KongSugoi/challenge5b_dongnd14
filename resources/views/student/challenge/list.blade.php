@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Challenge Board</h1>
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
                        {{csrf_field()}}
                            <div class="card-header">
                                <h3 class="card-title">Challenge List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Challenge Date</th>
                                            <th>Challenge File</th>   
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
                                            <td>{{date('d-m-Y',strtotime($value->challenge_date))}}</td>
                                            <td>
                                                @if(!empty($value->getDocument()))
                                                    <a href="{{ asset('upload/challenge/'.$value->document_file) }}" read only>
                                                        {{ strlen($value->challenge_file) > 20 ? substr($value->challenge_file, 0, 20) . ' ..' : 
                                                            $value->challenge_file }}</a>
                                                @endif
                                            </td>
                                            <td>{!! $value->description !!}</td>
                                            <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                            <td>
                                                <a href="{{url('student/challenge/submit/'.$value->id)}}" class="btn btn-primary">Submit Answer</a>                                            
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