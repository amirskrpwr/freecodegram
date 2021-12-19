@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post) 
        <div class="row">
            <div class="col-6 offset-3">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </div>
            <div class="col-6 offset-3">         
                <p class="pt-2">
                    <a style="text-decoration: none" href="/profile/{{ $post->user->id }}">
                        <span class="pe-1 text-dark"><strong>{{ $post->user->username }}</strong></span>
                    </a>
                    <span>{{ $post->caption }}</span>
                </p>
            </div>
        </div>
    @endforeach   

    <div class="row">
        <div class="col-12 d-flex justify-content-center" >
            {{ $posts->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection
    