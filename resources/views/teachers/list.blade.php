@extends('layouts.app')
@section('content')
 <div class="content">
 	<div class="container-wrapper">
 		<table class="table table-stripe" id="teacher">
 			<thead>
 				<tr>
 					<th scope="col">S.No.</th>
 					<th scope="col">Teacher Name</th>
 					<th scope="col">Surname</th>
 					<th scope="col">School</th>
 					<th scope="col">City</th>
 					<th scope="col">Status</th>
 					<th scope="col">Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				@if($teacher)
 				@foreach($teacher as $key => $t)
 				<tr>
 					<th scope="row">{{$key+1}}</th>
 					<td>{{$t['name']}}</td>
 					<td>{{$t['surname']}}</td>
 					<td>{{$t['school']}}</td>
 					<td>{{$t['city']}}</td>
 					<td>
 						@if($t['status']==1)
 						<button class="btn btn-primary">
 							Active
 						</button>
                        @else
                        <button class="btn btn-danger">
                        	Deactive
                        </button>
                        @endif
 					</td>
 					<td>
 						<a href="{{route('teachers.edit',$t['id'])}}">
 							<button class="btn btn-primary">
 								Edit 
 							</button>
 						</a>
 						<a href="{{route('teachers.delete',$t['id'])}}">
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