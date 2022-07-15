@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-fluid">
		<form action="{{route('token.store')}}" method="Post" enctype="multipart/form-data">
		  @csrf
			<div class="row">
			<div class="col-sm-4">
				<label class="label-control">Name</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>

			<div class="col-sm-4">
				<label class="label-control">Image</label>
				<input type="file" name="image" id="image" class="form-control">
			</div>

			<div class="col-sm-4">
				<label class="label-control">Status</label>
			<select name="status" id="status" class="form-control">
				<option value="">Select Status</option>
				<option value="1">Active</option>
				<option value="0">Deactive</option>
			</select>
			</div>

		</div>
		<button class="btn btn-primary">Add</button>
		</form>
	</div>
</div>
@endsection