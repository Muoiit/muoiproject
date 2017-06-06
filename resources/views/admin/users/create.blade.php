@extends('layouts.admin')

@section('content')
 <h1>Create Users</h1>

 @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 {!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'POST','files'=> true]) !!}
 
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
    {!! Form::select('is_Active',array(1 => 'active',0 => 'Inactive'), 0,['class' => 'form-control']);!!}
    </div>
    <div class="form-group">
    {!! Form::file('file')!!}
    </div>

    {!! Form::submit('Click Me!',['class'=>'btn btn-primary']);!!} 

{!! Form::close() !!}





@endsection


