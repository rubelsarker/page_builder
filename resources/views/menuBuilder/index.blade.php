@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Menu</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key=>$row)
                <tr>
                    <td>{{$row->title}}</td>
                    <td>
                        <a class="btn btn-sm text-primary" href="{{route('menu-builder.builder',$row->id)}}">Builder</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
