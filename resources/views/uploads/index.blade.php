<!-- {{-- @extends('layouts.app')
@section('content')

 <h3>Documents Repository</h3>

 <body>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 @if(count($uploads) > 0)
   @foreach($uploads as $upload)
     <div class = "well">
      <h4>{{$upload->title}}</h4>
       <small>Author: {{$upload -> author}} | </small>
       <small>Written on: {{$upload -> Created_at}}</small>
     </div>
    @endforeach
   @else 
      <p>No posts found</P>
   @endif   
      </body>    
@endsection --}} -->

@extends('layouts.app')
@section('content')

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <h3>Documents Repository</h3>
   
<div class="container">
                                
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Author</th>
        <th>Created</th>
        <th>Updated</th>
        <th>File Size</th>
        <th>Extension</th>

      </tr>
      @if(count($uploads) > 0)
      @foreach($uploads as $upload) 
    </thead>
    <tbody>
       
      <tr >
       
        <td>{{$upload -> title}}</td>
        <td>{{$upload -> description}}</td>
        <td>{{$upload -> author}}</td>
        <td>{{$upload -> Created_at}}</td>
        <td>{{$upload -> updated_at}}</td>
        <td>{{$upload -> fileSize}} </td> 
        <td>{{$upload -> extension}} <br></td> 

        @endforeach
        @else 
   <p>No posts found</P>
@endif   

      </tr>
    </tbody>
  </table>
</div>
<a href ="/create" class ="btn btn-default">Go Back</a>
<form method= "post" enctype= "multipart/form-data" action= "{{route('upload.file')}}" class="form-horizontal">
  @csrf
  <input type = "file" name = "file">
  <input type="submit" class = "btn btn-info">
  </form>
@endsection