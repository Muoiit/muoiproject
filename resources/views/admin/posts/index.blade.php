@extends('layouts.admin')

@section('content')
<h1>Posts</h1>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>photo</th>
        <th>title</th>
        <th>content</th>
        <th>Owner</th>        
        <th>Category?</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    
    @if($posts)
        @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt=""></td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->user->name}}</td>       
        <td>cat</td>
        <!-- Carbon/Carbon co san trong laravel, cu xai thoai mai -->
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
    @endif

    </tbody>
  </table>
@stop

