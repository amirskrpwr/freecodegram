@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('Patch')

        <div class="col-8 offset-2">
            <div class="form-group row">
                <div class="row"><h1>Edit Proflie</h1></div>
                <div class="row">
                    <label for="title" class="col-md-4 col-form-label">Profile Title</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                     name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="description" class="col-md-4 col-form-label">Profile Description</label>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                     name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="url" class="col-md-4 col-form-label">Profile URL</label>
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                     name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input id="image" type="file" name="image" class="form-control-file @error('image') is-invalid @enderror"
                    value="{{ old('image') }}" autocomplete="image" autofocus>
    
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

           
            <div class="row pt-4">
                <button class="btn btn-primary">Save Profile</button>
            </div>
        </div>
        
    </form>
</div>
@endsection
