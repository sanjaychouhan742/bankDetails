@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-wrapper">
		<form id="ajaxedit">
		<input type="hidden" name="id" id="id" value="{{$ajaxs['id']}}">
			@csrf
			<div class="row">
				<div class="col-sm-6">
					<label class="label-control">Name:</label>
					<input type="text" name="name" id="name" value="{{$ajaxs['name']}}" class="form-control">
				</div>
				<div class="col-sm-6">
					<label class="label-control">Email</label>
					<input type="text" name="email" id="email" value="{{$ajaxs['email']}}" class="form-control">
				</div>
				<button class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
	$("#ajaxedit").submit(function(e){
	  e.preventDefault();
      var data = $(this).serialize();
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      $.ajax({
      	url:"{{route('ajax.update')}}",
      	method:'POST',
      	data:data,
      	dataType:'json',
      	success:function(data){
         //console.log(data);
      	}
      });
	});
</script>
@endsection