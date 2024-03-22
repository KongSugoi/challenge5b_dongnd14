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
                    <h1>Homework</h1>
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
                        <form method="post" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="card-body">                                

                                <div class="form-group">
                                    <label>Homework Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="homework_date" value="{{$getRecord->homework_date}}">
                                </div>

                                <div class="form-group">
                                    <label>Submission Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="submission_date" value="{{$getRecord->submission_date}}">
                                </div>

                                <div class="form-group">
                                    <label>Document<span style="color:red">*</span></label>
                                    <input type="file" class="form-control" name="document_file"><br>
                                    <label>Last Document :</label>
                                        @if(!empty($getRecord->getDocument()))
                                            <a href="{{ asset('upload/homework/'.$getRecord->document_file) }}" download>{{ $getRecord->document_file }}</a>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label for="compose-textarea">Description</label>
                                    <textarea id="compose-textarea" name="description" class="form-control" 
                                        style="height:300px">{{$getRecord->description}}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')                
<script src="{{ asset('public/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#compose-textarea').summernote({
            height: 300,
            placeholder: 'Type your description here...'
        });
    });
</script>
@endsection
