@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{ Auth::user()->name }} <span class="caret"></span>
                    You are logged in as a <strong>USER</strong>
                  <!-- Table to store uploads made by logged in user -->
                    <table class = "table table-striped">
                      <tr>
                         <th>Title</th>
                         <th>Description</th>
                         <th>Created</th>
                         <th>Updated</th>
                         <th>Extension</th>
                         <th>Size</th>
                         
                         <th>                    </th>
                         <th>Actions</th>
                         <th></th>
                      </tr>
                      @foreach($uploads as $upload) 
                        <tr>
                         <th>{{$upload -> title}}   </th>
                         <td>{{$upload -> description}}</td>
                         <td>{{$upload -> Created_at}}</td>
                         <td>{{$upload -> updated_at}}</td>
                         <td>{{$upload -> extension}} </td> 
                         <td>{{$upload -> fileSize}} </td> 
                         <td>         </td> 
                         <th><a href ="pages/{{$upload->id}}/edit" class ="btn btn default">Edit</a><th>
                         <th><a href ="/home/download/{{$upload ->id}}"download = "{{$upload ->file_name}}"><button type = "button" class ="btn btn-primary"> <i class = "glyphicon glyphicon-download"><strong>Download</strong></i></a><th>
                         </tr>
                        @endforeach 
                      </table>  
                     
                    <p><a href="{{ url('/create') }}">Upload a file</a> </p>
                    <p><a href="{{ url('/index') }}">View Log</a> </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
