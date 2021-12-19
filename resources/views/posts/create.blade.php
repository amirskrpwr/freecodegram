@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="/post" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <div class="row"><h1>Add new post</h1></div>
                    <div class="row">
                        <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                        caption="caption" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    <input id="image" type="file" name="image" class="form-control-file @error('image') is-invalid @enderror"
                    image="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Post</button>
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
