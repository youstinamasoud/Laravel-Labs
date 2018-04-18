@extends('layouts.master')
@section('content')

<!-- <h1>Posts Index</h1> -->

<div class="container">
        <div class="table-wrapper">         
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                                            
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('posts.create')}}" class="btn btn-success" data-toggle="modal"> <span>Add New Post</span></a>
                    </div>
                    
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Posted By</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $count=0
                @endphp
        @foreach ($posts as $post)
                    <tr>
                        @php $count++ @endphp
                        <td>{{$page*3+$count}}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{ $post->created_at->toDateString() }}</td>
                        
                        <td>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm active" role="button">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm active" role="button">Edit</a>
                        <form method="post" action="/post/{{$post->id}}" >
                             {{csrf_field()}}
                             {{method_field('DELETE')}}
                        <button onclick="return confirm('Are You Sure ??')" type="submit" class="btn btn-danger btn-sm active" > Delete </button>
                        </form>
                        </td>
                    </tr>
                    
        @endforeach           
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>


@endsection