@extends('layouts.base')

@section('content')
    <div class="container pt-5">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" id="description" rows="10" name="description">{{ old('content') }}</textarea>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
    </div>
@endsection