@extends('layouts.app')
@section('content')
<div class="content">
	<div class="container-wrapper">
		<form id="ajaxForm">
			@csrf
			<div class="row">
				<div class="col-sm-6">
					<label class="label-control">Name:</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="col-sm-6">
					<label class="label-control">Email</label>
					<input type="text" name="email" id="email" class="form-control">
				</div>
				<button class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
	$("#ajaxForm").submit(function(e){
	  e.preventDefault();
      var data = $(this).serialize();
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      $.ajax({
      	url:"{{route('ajax.store')}}",
      	method:'POST',
      	data:data,
      	dataType:'json',
      	success:function(data){
         console.log(data);
      	}
      });
	});
</script>
@endsection