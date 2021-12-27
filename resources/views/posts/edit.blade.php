@extends('layouts.app')

@section('content')
    <div class="row">
        <form action="/post/{{ $post->id }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('patch')

            <div class="col-8 offset-2">
                <div class="form-group row">
                    <div class="row"><h1>Add new post</h1></div>
                    <div class="row">   
                        <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                        caption="caption" name="caption" value="{{ old('caption') ?? $post->caption }}" autocomplete="caption" autofocus>

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
                    image="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="pt-4 justify-content-start">
                    <button type="submit" class="btn btn-primary me-1">Edit Post</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Post
                    </button>
                </div>
            </div>            
        </form>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deleting {{ $post->caption }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you really want to delete this post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="/post/{{ $post->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Yes</button>
                    </form>                  
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
