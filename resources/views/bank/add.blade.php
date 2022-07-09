@extends('layouts.app')
@section('content')
<div class="content">
<form id="regForm" action="{{route('bank.store')}}" method="post" enctype="multipart/form-data">
  @csrf
<h1>Bank Account Opening Form:</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">
	<div class="col-sm-12">
		<label class="label-control">Name</label>
  <p><input name="first_name" id="first_name" placeholder="First name..." oninput="this.className = ''"></p>
 @error('first_name')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
</div>

<div class="col-sm-12">
  <label class="label-control">Last Name:</label>
  <p><input name="last_name" id="last_name" placeholder="Last name..." oninput="this.className = ''"></p>
  @error('last_name')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
</div>

<div class="col-sm-12">
  <label class="label-control">Upload Image:</label>
  <input type="file" id="image" name="image"  placeholder="Upload Image..." oninput="this.className = ''">
  @error('image')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
</div>

<div class="col-sm-12">
	<label class="label-control">Addhar Number Is:</label>

	<div class="col-sm-3">
	No <input type="radio" value="no" oninput="this.className = ''"/>
    Yes<input type="radio" id="yes_check" value="yes" oninput="this.className = ''"/>
   </div>

   <div class="col-sm-12 ">
   <input style="display:none;" type="text" name="addharcard" id="addharcard" oninput="this.className = ''" placeholder="Enter Addharcard Number..."/>
   @error('addharcard')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
   </div>

</div>
</div>

<div class="tab">
  <div class="col-sm-3">
  <label class="label-control">Add Nominee</label>
  <p><input type="radio" value="Nominee" id="nominee_check" placeholder="E-mail..." oninput="this.className = ''"></p>
  </div>
 <div class="nominee_div" style="display:none;">
  	<div class="col-sm-12">
  		<label class="label-control">Nominee Full Name:</label>
  	<p><input style="display:none;" name="nominee_fullName" id="nominee_fullName" placeholder="Nominee Full Name" oninput="this.className = ''" class="form-control nominee_div"></p>
  	 @error('nominee_fullName')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
  </div>

  <div class="col-sm-6">
  		<label class="label-control">Nominee has Account In Same Bank:</label>
  	<p>Yes<input type="radio" id="account_yes" value="yes_account"  oninput="this.className = ''"/></p>
  	<p>No<input type="radio" value="no_account" oninput="this.className = ''"/></p>
  </div>
  <div class="col-sm-12 nominee_account" style="display:none;" >
  	<label class="label-control">Nominne Account</label>
  	<p><input type="text" name="nominee_account" id="nominee_account" placeholder="Nominee Account Number" oninput="this.className = ''" class="form-control"></p>
  	 @error('nominee_account')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
  </div>
 </div>
  
 </div>



<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>
</div>

<script type="text/javascript">
$(document).ready(function(){
$("#yes_check").change(function(){
if($(this).val()=="yes")
{
$("#addharcard").show();
}
else
{
$("#addharcard").hide();
}
});

$("#nominee_check").change(function(){
if($(this).val()=="Nominee")
{
$(".nominee_div").show();
}
else
{
$(".nominee_div").hide();
}
});

$("#account_yes").change(function(){
if($(this).val()=="yes_account")
{
$(".nominee_account").show();
}
else
{
$(".nominee_account").hide();
}
});

});
</script>
@endsection