@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-baseline">
                    <div class="pe-3">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px" alt="">
                    </div>
                    <div>
                        <div class="pe-3">
                            <a style="text-decoration: none" href="/profile/{{ $post->user->id }}">
                                <span class="text-black"><strong>{{ $post->user->username }}</strong></span>
                            </a>
                        </div>
                    </div>
                    
                    <div><strong><a style="text-decoration: none" href="#">Follow</a></strong></div>
                </div>  
            </div>          
            <p class="pt-4">
                <a style="text-decoration: none" href="/profile/{{ $post->user->id }}">
                    <span class="pe-1 text-dark"><strong>{{ $post->user->username }}</strong></span>
                </a>
                <span>{{ $post->caption }}</span>
            </p>
        </div>
    </div>   
</div>
@endsection
