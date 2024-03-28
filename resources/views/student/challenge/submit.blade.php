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
                    <h1>Submit Answer Challenge</h1>
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
                                <label>Description: </label>                                    
                                <span>{!! $getRecord->description !!}</span>
                            </div>                                

                            <div class="form-group">
                                <label>File: </label>
                                <span class="text-gray-600 font-bold">
                                    @if(!empty($getRecord->getDocument()))
                                        <a href="{{ asset('upload/challenge/'.$getRecord->document_file) }}" read only>
                                            {{ strlen($getRecord->challenge_file) > 20 ? substr($getRecord->challenge_file, 0, 20) . ' ..' : 
                                            $getRecord->challenge_file }}</a>
                                    @endif
                                </span>                                    
                            </div>
                            <div class="form-group">
                                <label>Submit Your Answer: </label>
                                <input type="text" class="form-control" name="challenge_answer" required>                           
                            </div>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit Answer</button>
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
