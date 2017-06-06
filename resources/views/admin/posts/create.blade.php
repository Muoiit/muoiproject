@extends('layouts.admin')

@section('content')
<h1>Create Post</h1>


{!! Form::open(['action' => 'AdminPostsController@store', 'method' => 'POST','files'=> true]) !!}
 
  <div class="form-group">
   {!! Form::label('title', 'Title:') !!}
   {!! Form::text('title', null, ['class' => 'form-control'])!!}
  </div> 
  

   <div class="form-group">
    {!! Form::label('category_id', 'Category:'); !!}
    {!! Form::select('category_id',['' => 'Choose an option'] + $categories, null,['class' => 'form-control']);!!}
    </div>

    <div class="form-group">
    {!! Form::label('body', 'Content'); !!}
    {!! Form::textarea ('body', null, ['class' => 'form-control','row' => 3])!!}
    </div>
    <div class="form-group">
    {!! Form::file('photo_id')!!}
    </div>

    {!! Form::submit('Create!',['class'=>'btn btn-primary']);!!} 

{!! Form::close() !!}



@stop