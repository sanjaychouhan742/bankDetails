<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    #regForm {
  background-color: #ffffff;
  margin: 100px auto;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
  </style>
  <?php
  echo asset('storage/file.txt'); 
  ?>
  </head>
  <body>
<div class="content">
<form id="regForm" action="{{route('bank.store')}}" method="post" enctype="multipart/form-data">
  @csrf
<h1>Bank Account Opening Form:</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">
  <div class="col-sm-12">
    <label class="label-control">Name</label>
  <p><input name="first_name" id="first_name" value="{{old('first_name')}}" placeholder="First name..." oninput="this.className = ''"></p>
 @error('first_name')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
</div>

<div class="col-sm-12">
  <label class="label-control">Last Name:</label>
  <p><input name="last_name" id="last_name" value="{{old('last_name')}}" placeholder="Last name..." oninput="this.className = ''"></p>
  @error('last_name')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
</div>

<div class="col-sm-12">
  <label class="label-control">Upload Image:</label>
  <input type="file" id="image" name="image" value="{{old('image')}}"  placeholder="Upload Image..." oninput="this.className = ''">
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
   <input style="display:none;" type="text" name="addharcard" id="addharcard" value="{{old('addharcard')}}" oninput="this.className = ''" placeholder="Enter Addharcard Number..."/>
   @error('addharcard')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
   </div>

</div>
</div>

<div class="tab">
  <div class="col-sm-3">
  <label class="label-control">Add Nominee</label>
  <p><input type="radio" value="Nominee" id="nominee_check"  placeholder="E-mail..." oninput="this.className = ''"></p>
  </div>
 <div class="nominee_div" style="display:none;">
    <div class="col-sm-12">
      <label class="label-control">Nominee Full Name:</label>
    <p><input style="display:none;" name="nominee_fullName" id="nominee_fullName" placeholder="Nominee Full Name" value="{{old('nominee_fullName')}}" oninput="this.className = ''" class="form-control nominee_div"></p>
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
    <p><input type="text" name="nominee_account" id="nominee_account" value="{{old('nominee_account')}}" placeholder="Nominee Account Number" oninput="this.className = ''" class="form-control"></p>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
<script type="text/javascript">
  var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  //if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
  </body>
</html>