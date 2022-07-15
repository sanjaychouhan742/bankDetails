@extends('layouts.app')
@section('content')

<div class="content">
	<div class="content-wrapp">
		<form action="{{route('teachers.update')}}" method="post">
			@csrf
			<input type="hidden" name="id" id="id" value="{{$teacher['id']}}">
			<div class="row">
			<div class="col-lg-4">
				<label class="label-control">Teacher Name</label>
				<input type="text" name="name" id="name" value="{{$teacher['name']}}" class="form-control">
				@error('name')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>

			<div class="col-lg-4">
				<label class="label-control">Surname</label>
				<input type="text" name="surname" id="surname" value="{{$teacher['surname']}}" class="form-control">
				@error('surname')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>

			<div class="col-lg-4">
				<label class="label-control">School</label>
				<input type="text" name="school" id="school" value="{{$teacher['school']}}" class="form-control">
				@error('school')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>

			<div class="col-lg-6">
				<label class="label-control">City</label>
				<input type="text" name="city" id="city" value="{{$teacher['city']}}" class="form-control">
				@error('city')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>

			<div class="col-lg-6">
				<label class="label-control">Status</label>
				<select name="status" id="status" class="form-control">
					<option value="">Select Status</option>
					<option value="1" {{1==$teacher['status']?'selected':''}}>Active</option>
					<option value="0">Deactive</option>
				</select>
				@error('status')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
		</div>

		<div class="col-lg-6">
           <button class="btn btn-primary">Submit</button>
		</div>
		</form>
		
	</div>
	
</div>

@endsection