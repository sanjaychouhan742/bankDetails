@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-wapper">
		<div class="row">
			<table class="table table-strip">
				<thead>
					<tr>
						<th scope="col">S.No</th>
						<th scope="col">Name</th>
						<th scope="col">Image</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tokens as $key => $to)
					<tr>
						<th scope="col">{{$key+1}}</th>
						<td>{{$to['name']}}</td>
						<td>
							<img src="{{asset('public/images/token/'.$to['image'])}}" width="50px" height="40px">
						</td>
						<td>
							@if($to['status']==1)
                                <button class="btn btn-primary">Active</button>
                                @else
                                <button class="btn btn-danger">Dactive</button>
							@endif
						</td>
						<td>
							<a href="{{route('token.edit',$to['id'])}}">
							<button class="btn btn-primary">Edit</button>
							</a>
							<a href="{{route('token.delete',$to['id'])}}">
							<button class="btn btn-danger">Delete</button>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection