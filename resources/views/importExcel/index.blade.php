@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Import Excel File</h3>
            @if($errors->any())
                <div class="alert alert-danger">
                    Upload Validation Error/s
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <hr>
                <form method="POST" enctype="multipart/form-data" action="{{route('import.store')}}">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label for="importedFile">Select file for upload</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group mb-2">
                                <input type="file" class="form-control-file" id="importedFile" name="importedFile">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Upload</button>
                        </div>
                    </div>
                </form>
            <hr>
            @if(session('uploaded'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('uploaded')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
