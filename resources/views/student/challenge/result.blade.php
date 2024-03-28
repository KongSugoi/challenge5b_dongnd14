@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('public/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/summernote/summernote-bs4.min.css') }}">
<style type="text/css">
    .select2-container .select2-selection--single {
        height: 40px;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Challenge Result</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('_message')
                    <div class="card card-primary">
                        <form method="" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="card-body">                                

                                <div class="form-group">
                                    <label>Challenge Status: </label>                                    
                                    <span>{{$status}}</span>
                                </div>                                

                                <div class="form-group">
                                    <label>File Result: </label>
                                    <span class="text-gray-600 font-bold">{!! $content !!}</span>                                    
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

