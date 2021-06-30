@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif
            <form action="{{route('pages.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input required type="text" class="form-control" id="title" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input required type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
