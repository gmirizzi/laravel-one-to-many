@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $post->title }}</h1>
                <b>{{ $post->user->name }}</b> - <b>{{ $post->user->userInfo->phone }}</b>
                <p>{{ $post->content }}</p>
            </div>
        </div>
    </div>
@endsection