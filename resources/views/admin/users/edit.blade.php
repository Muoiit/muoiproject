@extends('layouts.admin')

@section('content')
 <h1>Edit Users</h1>

 @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
<div class="col-sm-3">
	<img  src="{{$user->photo ? $user->photo->file : "http://placeholder.com/350x350"}}" class="img-responsive img-rounded "></img>   
</div>

<div class="col-sm-9">

 {!! Form::model($user,['method' => 'PATCH','action' => ['AdminUsersController@update',$user->id],'files'=> true]) !!}
 
  <div class="form-group">
   {!! Form::label('username', 'UserName:') !!}
   {!! Form::text('name', null, ['class' => 'form-control','id'=> 'user','placeholder' => 'Username'])!!}
  </div>
   
  <div class="form-group">
   {!! Form::label('password', 'Password:') !!}
   {!! Form::password('password', ['class' => 'form-control','id'=> 'pass','placeholder' => 'Password']); !!}
  </div>

	<div class="form-group">
     {!! Form::label('email', 'E-Mail Address'); !!}
     {!! Form::email('email',null,['class'=>'form-control','id'=> 'email','placeholder' => 'Email']);!!} 
    </div>

     <div class="form-group">
    {!! Form::label('Role', 'Role:'); !!}
    {!! Form::select('role_id',['' => 'Choose an option']+ $roles, null,['class' => 'form-control']);!!}
    </div>

    <div class="form-group">
    {!! Form::label('is_Active', 'Status'); !!}
    {!! Form::select('is_Active',array(1 => 'active',0 => 'Inactive'), null,['class' => 'form-control']);!!}
    </div>
    <div class="form-group">
    {!! Form::file('photo_id')!!}
    </div>

    {!! Form::submit('Click Me!',['class'=>'btn btn-primary col-sm-6']);!!} 

{!! Form::close() !!}

{!! Form::open(['method' => 'DELETE','action' => ['AdminUsersController@destroy',$user->id]]) !!}
{!! Form::submit('DELETE!',['class'=>'btn btn-danger col-sm-6']);!!} 
{!! Form::close() !!}

</div>

</div>

@endsection


