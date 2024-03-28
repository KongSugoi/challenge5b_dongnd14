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
                    <h1>Challenge</h1>
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
                                    <label>Challenge Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="challenge_date" value="{{$getRecord->challenge_date}}">
                                </div>                                

                                <div class="form-group">
                                    <label>File<span style="color:red">*</span></label>
                                    <input type="file" class="form-control" name="challenge_file"><br>
                                    <label>Last File:</label>
                                        @if(!empty($getRecord->getDocument()))
                                            <a href="{{ asset('upload/challenge/'.$getRecord->challenge_file) }}" download>{{ $getRecord->challenge_file }}</a>
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
