@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_user'))
  {{session('deleted_user')}}
@endif
<h1>Users</h1>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Active?</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    
    @if($users)
        @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="100" src="{{$user->photo_id ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
        <td><a href="{{route('users.edit',$user->id)}}" >{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_Active==1?'active' : 'Inactive'}}</td>
        <!-- Carbon/Carbon co san trong laravel, cu xai thoai mai -->
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
    @endif

    </tbody>
  </table>


@endsection


