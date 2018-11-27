@extends('layouts.app')

@section('content')
 <h3>Document Uploads</h3>
 {!! Form::open(['action' => 'UploadsController@store', 'method' => 'POST']) !!}
    <div class = "form-group">
       {{Form::label('title', 'Document Title')}}
       {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Document name'])}}
   </div>
   <div class = "form-group">
       {{Form::label('description', 'Document description')}}
       {{Form::textarea('description', '', ['id' =>'article-ckeditor','class' => 'form-control', 'placeholder' => 'Document description'])}}
   </div>
   {{Form::submit('Submit',['btn btn-info'])}}
{!! Form::close() !!}

<form method= "post" enctype= "multipart/form-data" action= "{{route('upload.file')}}" class="form-horizontal">
  @csrf
  <input type = "file" name = "file">
  <input type="submit" class = "btn btn-info">
  </form>
@endsection 