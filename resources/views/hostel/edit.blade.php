@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-wrapper">
		<form action="{{route('hostel.update')}}" method="post">
			@csrf
			<input type="hidden" name="id" id="id" value="{{$hostel['id']}}">
			<div class="row">
			<div class="col-lg-6">
				<label class="label-control">Hostel Name</label>
				<input type="text" name="hostel_name" id="hostel_name" value="{{$hostel['hostel_name']}}" class="form-control">
				@error('hostel_name')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
            <div class="col-lg-6">
				<label class="label-control">Area</label>
				<input type="text" name="area" id="area" value="{{$hostel['area']}}" class="form-control">
				@error('area')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
			<div class="col-lg-6">
				<label class="label-control">Warden</label>
				<input type="text" name="warden" id="warden" value="{{$hostel['warden']}}" class="form-control">
				@error('warden')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
			<div class="col-lg-6">
				<label class="label-control">status</label>
				<select name="status" id="status" class="form-control">
					<option value="">Select Status</option>
					<option value="1"{{1==$hostel['status']?'selected':''}}>Active</option>
					<option value="0"{{0==$hostel['status']?'selected':''}}>Deactive</option>
				</select>
				@error('status')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
		</div>
		<div class="col-lg-6">
			<label class="label-control"></label>
			<button class="btn btn-primary" class="form-control">Submit</button>
		</div>
		</form>
	</div>
</div>
@endsection