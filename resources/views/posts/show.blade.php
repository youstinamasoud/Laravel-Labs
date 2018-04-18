@extends('layouts.master')
@section('content')

<div class="container">
        <div class="table-wrapper">         

            <table class="table table-bordered">
            <th style="background-color:#D3D3D3">Post Info</th>        
                <tr><td><b>Title </b>:-{{$post->title}}
                <br><b>Description </b>:-
                <br>{{$post->description}}</td></tr>
            </table>
            <table class="table table-bordered">
            <th style="background-color:#D3D3D3">Post Creator Info</th>        
                <tr><td><b>Name:-{{$post->user->name}} </b>
                <br><b>Email:-{{$post->user->email}} </b>
                <br><b>Created At:-{{$post->user->create_at}} </b>:-</td></tr>
            </table>
        </div>
    </div>
@endsection
