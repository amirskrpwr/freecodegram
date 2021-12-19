@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="w-100 rounded-circle" src={{ $user->profile->profileImage() }} alt="image">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user->username}}</div>
                    @cannot('update', $user->profile)
                        <follow-button user_id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcannot
                </div>

                @can('update', $user->profile)
                    <a href="/post/create/">Add a new post</a>
                @endcan  
                
            </div>
            <div class="d-flex">
                <div class="pe-5"><strong>{{ $postsCount }}</strong> posts</div>
                <div class="pe-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pe-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>            

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">edit profile</a>
            @endcan

            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a style="text-decoration: none" href={{$user->profile->url}}>{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{ $post->id }}" style="color:black; text-decoration:none" >
                <div class="card">
                    <img src="/storage/{{$post->image}}" class="w-100"alt={{$post->title}}>
                    <div style="max-height: 50px; text-overflow: ellipsis; white-space: nowrap; overflow:hidden" class="card-body"><p>{{$post->caption}}</p></div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
