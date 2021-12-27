@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-12">
        <h2 class="d-flex justify-content-center mb-5">Profiles</h2>
        @foreach ($profiles as $profile)
        <div class="pb-2 mb-2">
            <a href="/profile/{{ $profile->id }}" style="text-decoration: none; color:black">
                <img src="{{ $profile->profileImage() }}" class="rounded-circle w-100 me-2" style="max-width: 50px" alt="{{ $profile->title }}">
                <span>{{ $profile->title }}</span>
            </a>
        </div>
            
        @endforeach
    </div>
    <div class="col-md-8 col-sm-12">
        <h2 class="d-flex justify-content-center mb-5">Posts</h2>
        @foreach ($posts as $post) 
            <post :post='@json($post)'></post>
        @endforeach   

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center" >
                {{ $posts->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
</div>
    
@endsection
    