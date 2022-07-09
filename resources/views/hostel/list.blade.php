@extends('layouts.app')
@section('content')
   <div class="content">
   	<div class="container-wrapper">
   		<table class="table table-strip" id="hostel">
   			<thead>
   				<tr>
   					<th scope="col">S.No.</th>
   					<th scope="col">Hostel Name</th>
   					<th scope="col">Area</th>
   					<th scope="col">Warden</th>
                  <th scope="col">Image</th>
   					<th scope="col">Status</th>
   				   <th scope="col">Action</th>
   				</tr>
   			</thead>
   			<tbody>
   				@if($hostel)
   				@foreach($hostel as $key => $h)
                  <tr>
   					<th scope="row">{{$key+1}}</th>
   					<td>{{$h['hostel_name']}}</td>
   					<td>{{$h['area']}}</td>
   					<td>{{$h['warden']}}</td>
                  <td>
                        <img src="{{ asset('public/images/'. $h['image'] ) }}" alt="N/a"  width="60px" height="70px">
            
                  
                  </td>
   					<td>
   						@if($h['status']==1)
   						<button class="btn btn-primary">
   							Active
   						</button>
   						@else
   						<button class="btn btn-danger">Deactive</button>
   						@endif
   					</td>
   					<td>
   						<a href="{{route('hostel.edit',$h['id'])}}">
   						<button class="btn btn-primary">Edit</button>
   					</a>

                     <a href="{{route('hostel.delete',$h['id'])}}">
                     <button class="btn btn-danger">Delete</button>
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