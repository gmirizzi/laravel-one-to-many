@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary me-2" href="{{ route('admin.posts.create') }}">Create a post</a>
                    <a class="btn btn-primary me-2" href="{{ route('admin.posts.index') }}">All posts</a>
                    <a class="btn btn-primary me-2" href="{{ route('admin.posts.myindex') }}">My posts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection