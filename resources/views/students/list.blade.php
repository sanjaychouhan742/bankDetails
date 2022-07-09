@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-wrapper">
<table class="table table-striped" id="student">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@if($student)
  	@foreach($student as $key => $s)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$s['student_first_name']}}</td>
      <td>{{$s['student_last_name']}}</td>
      <td>{{$s['roll']}}</td>
      <td>
      	<a href="{{route('students.edit',$s['id'])}}">
      		<button class="btn btn-primary">
      			Edit
      		</button>
      	</a>
        <a href="{{route('students.delete',$s['id'])}}">
          <button class="btn btn-danger">
            Delete
          </button>
        </a>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
  </div>
</div>
@endsection