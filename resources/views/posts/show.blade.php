@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="{{ $post->caption }}" class="w-100">
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
                    @cannot('update', $post->user->profile)                        
                        <follow-button user_id='{{ $post->user->id }}' follows='{{ $follows }}'></follow-button>
                    @endcannot
                </div>  
            </div>          
            <p class="pt-4">
                <p class="fs-5">{{ $post->caption }}</p>
                @can('update', $post->user->profile)                        
                    <a href="/post/{{ $post->id }}/edit" class="btn btn-primary">Edit Post</a>
                @endcan
            </p>
        </div>
    </div>   
@endsection
