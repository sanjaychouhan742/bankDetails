@extends('layouts/app')
@section('content')
@include('sweetalert::alert')
<div class="content">
	<div class="container-fluid">
    <form method="POST" action="{{route('students.update')}}">
    	<input type="hidden" name="id" id="id" value="{{$student['id']}}">
    	@csrf
    	<div class="row">
    	<div class="col-sm-4">
    		<label class="label-control">Student First Name</label>
    		<input type="text" name="student_first_name" class="form-control" value="{{$student['student_first_name']}}">
    		@error('student_first_name')
    		  <div class="alert alert-danger">{{$message}}</div>
    		@enderror
        </div>
        <div class="col-sm-4">
        	<label class="label-control">Student Last Name</label>
        	<input type="text" name="student_last_name" class="form-control" value="{{$student['student_last_name']}}">
        	@error('student_last_name')
        	<div class="alert alert-danger">{{$message}}</div>
        	@enderror
        </div>
        <div class="col-sm-4">
        	<label class="label-control">Roll Number</label>
        	<input type="text" name="roll" class="form-control" value="{{$student['roll']}}">
        	@error('roll')
        	<div class="alert alert-danger">{{$message}}</div>
        	@enderror
        </div>
        <div class="col-lg-4">
        	<div class="mb-3">
           <button type="submit" class="btn btn-primary">Submit</button>
       </div>
        </div>
    </div>
    </form>
	</div>
	
</div>
@endsection