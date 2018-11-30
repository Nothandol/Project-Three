@extends('layouts.app')

@section('content')
 <h3>Document Uploads</h3>
 {!! Form::open(['action' => 'UploadsController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
    <div class = "form-group">
       {{Form::label('title', 'Document Title')}}
       {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Document name'])}}
   </div>
   <div class = "form-group">
       {{Form::label('description', 'Document description')}}
       {{Form::textarea('description', '', ['id' =>'article-ckeditor','class' => 'form-control', 'placeholder' => 'Document description'])}}
   </div>
   <div class = "form-group">
   {{Form::file('doc_name')}}
 </div> 
{{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
{!! Form::close() !!}

   
@endsection 