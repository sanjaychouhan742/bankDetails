@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-fluid">
		<form action="{{route('token.update')}}" method="Post" enctype="multipart/form-data">
		  @csrf
		  <input type="hidden" name="id" id="id" value="{{$tokens['id']}}">
			<div class="row">
			<div class="col-sm-4">
				<label class="label-control">Name</label>
				<input type="text" name="name" id="name" value="{{$tokens['name']}}" class="form-control">
			</div>

			<div class="col-sm-4">
				<label class="label-control">Image</label>
				<input type="file" name="image" id="image" class="form-control">
			</div>

			<div class="col-sm-4">
				<label class="label-control">Status</label>
			<select name="status" id="status" class="form-control">
				<option value="">Select Status</option>
				<option value="1" {{1==$tokens['status']?'selected':''}}>Active</option>
				<option value="0" {{0==$tokens['status']?'selected':''}}>Deactive</option>
			</select>
			</div>
             <div>
             	<label class="label-control">Preview</label>
			<img src="{{asset('public/images/token/'.$tokens['image'])}}" width="100px" height="150px">
			</div>
		</div>
		<button class="btn btn-primary">Add</button>
		</form>
	</div>
</div>
@endsection