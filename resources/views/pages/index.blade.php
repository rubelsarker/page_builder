@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Page</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key=>$row)
                <tr>
                    <td>{{$row->title}}</td>
                    <td>{{$row->status==true?'Active':'Inactive'}}</td>
                    <td>
                        <a class="btn btn-sm text-primary" href="{{route('pages.design',$row->id)}}">Design Page</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
