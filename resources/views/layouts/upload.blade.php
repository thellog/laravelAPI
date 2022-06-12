@extends('main')

@section('content')
    <div class="container">
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="file" name="file" class="form-control">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload a File</button>
            </div>
        </div>
        </form>
    </div>
@endsection
