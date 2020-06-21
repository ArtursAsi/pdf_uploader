@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Profile <span><a href="{{route('user.edit')}}">Edit</a></span></div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <img class="col-9"
                                     src="https://pbs.twimg.com/profile_images/378800000412022557/2c892ce382fcba919bcbf3a861228b80_400x400.jpeg"
                                     alt="">
                            </div>
                            <div class="col-6">
                                <p>Gender: {{Auth::user()->gender}}</p>
                                <p>Username: {{Auth::user()->username}}</p>
                                <p>Birthday: {{Auth::user()->birthday}}</p>
                                <p>Location: {{Auth::user()->location}}</p>
                                <p>Email address: {{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
