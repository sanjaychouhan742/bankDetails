@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-wrapper">
		<table class="table table-strip">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	   $.ajax({
			type:"GET",
			url:"{{route('ajax.fetch')}}",
			dataType:"json",
			success: function(response){
				//console.log(response.ajaxs);
				$.each(response.ajaxs, function(key,ajax){
                 $('tbody').append('<tr>\
					<td>'+ajax.id+'</td>\
					<td>'+ajax.name+'</td>\
					<td>'+ajax.email+'</td>\
					<td></td>\
				</tr>');
				});
			}
		});
	});
</script>
@endsection