<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Multi Step Registration Form Using JQuery Bootstrap in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  .box
  {
   width:800px;
   margin:0 auto;
  }
  .active_tab1
  {
   background-color:#fff;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  </style>
 </head>
 <body>
 <br />
  <div class="container box">
   <br />
   <h2 align="center">Bank Opening Form</h2><br />
   <form id="register_form" action="{{route('bank.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul class="nav nav-tabs">
     <li class="nav-item">
      <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Personal Details</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Nominees Details</a>
     </li>
    </ul>
    <div class="tab-content" style="margin-top:16px;">
     <div class="tab-pane active" id="login_details">
      <div class="panel panel-default">
       <div class="panel-heading">Personal Details</div>
       <div class="panel-body">
        <div class="form-group">
         <label>First Name</label>
         <input type="text" name="first_name" id="first_name" class="form-control" onkeyup="isEmpty()" />
         <span id="error_first_name" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Last Name</label>
         <input type="text" name="last_name" id="last_name" class="form-control" onkeyup="isEmpty()" />
         <span id="error_last_name" class="text-danger"></span>
        </div>
         <div class="form-group">
         <label>Image</label>
         <input type="file" name="image" id="image" class="form-control" onkeyup="isEmpty()">
         <span id="error_image" class="text-danger"></span>
        </div>
        <div class="form-group">
        <div class="group-group">
          <label class="label-control">Addhar Number Is:</label>
  No <input type="radio" value="no">
    Yes<input type="radio" id="yes_check" value="yes">
   </div>

   <div class="form-group">
   <input style="display:none;" type="text" name="addharcard" id="addharcard" value="{{old('addharcard')}}" placeholder="Enter Addharcard Number..." class="form-control" />
   @error('addharcard')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
   </div>

        </div>
        <br />
        <div align="center">
         <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>
     <div class="tab-pane fade" id="personal_details">
      <div class="panel panel-default">
       <div class="panel-heading">Fill Personal Details</div>
       <div class="panel-body">
         <div class="form-group">
  <label class="label-control">Add Nominee</label>
  <p><input type="radio" value="Nominee" id="nominee_check"  placeholder="E-mail..." oninput="this.className = ''"></p>
  </div>
 <div class="form-group nominee_div" style="display:none;">
    <div class="col-sm-12">
      <label class="label-control">Nominee Full Name:</label>
    <p><input style="display:none;" name="nominee_fullName" id="nominee_fullName" placeholder="Nominee Full Name" value="{{old('nominee_fullName')}}" class="form-control nominee_div" onkeyup="isEmpty()"></p>
     @error('nominee_fullName')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
  </div>

  <div class="form-group">
      <label class="label-control">Nominee has Account In Same Bank:</label>
    <p>Yes<input type="radio" id="account_yes" value="yes_account"  oninput="this.className = ''"/></p>
    <p>No<input type="radio" value="no_account" oninput="this.className = ''"/></p>
  </div>
  <div class="form-group nominee_account" style="display:none;" >
    <label class="label-control">Nominne Account</label>
    <p><input type="text" name="nominee_account" id="nominee_account" value="{{old('nominee_account')}}" placeholder="Nominee Account Number" onkeyup="isEmpty()" class="form-control"></p>
     @error('nominee_account')
  <div class="alert alert-danger">{{$message}}</div>
 @enderror
  </div>
 </div>
        <br />
         <br />
        <div align="center">
         <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg" disabled>Register</button>
        </div>
        <br />

       </div>
      </div>
     </div>
    </div>
   </form>
  </div>
 </body>
</html>

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

function isEmpty(){
  let first_name = document.getElementById("first_name").value;
  let last_name = document.getElementById("last_name").value;
  let image = document.getElementById("image").value;
  let nominee_fullName = document.getElementById("nominee_fullName").value;
  let nominee_account = document.getElementById("nominee_account").value;
  $('#btn_contact_details').prop('disabled', true);
  if (first_name!='' && last_name!='' && image!='' && nominee_fullName!='' && nominee_account!='') {
    $('#btn_contact_details').prop('disabled', false);
  }
}
</script>


<script>
$(document).ready(function(){
 
 $('#btn_login_details').click(function(){
  var first_name = $('#first_name').val();
  var last_name = $('#last_name').val();
  var error_image = '';
  var error_last_name = '';
  var error_first_name = '';

  if($.trim($('#first_name').val()).length == 0)
  {
   error_first_name = 'First Name is required';
   $('#error_first_name').text(error_first_name);
   $('#first_name').addClass('has-error');
  }
  else
  {
   if (first_name.length >10)
   {
    error_first_name = 'Please enter Less than 10';
    $('#error_first_name').text(error_first_name);
    $('#first_name').addClass('has-error');
   }
   else
   {
    error_first_name = '';
    $('#error_first_name').text(error_first_name);
    $('#first_name').removeClass('has-error');
   }
  }

  if($.trim($('#last_name').val()).length == 0)
  {
   error_last_name = 'Last Name is required';
   $('#error_last_name').text(error_last_name);
   $('#last_name').addClass('has-error');
  }
  else
  {
   if (last_name.length >10)
   {
    error_last_name = 'Please enter Less than 10';
    $('#error_last_name').text(error_first_name);
    $('#last_name').addClass('has-error');
   }
   else
   {
    error_last_name = '';
    $('#error_last_name').text(error_last_name);
    $('#last_name').removeClass('has-error');
   }
  }

  if($.trim($('#image').val()).length == 0)
  {
   error_image = 'image is required';
   $('#error_image').text(error_image);
   $('#image').addClass('has-error');
  }
  else
  {
   var image = document.getElementById("image");
   var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2); 
            if(size > 2) {
                alert('Please select image size less than 2 MB');
            }else{
                 error_image = '';
    $('#error_image').text(error_image);
    $('#image').removeClass('has-error');
      }
    }
  
  // if($.trim($('#password').val()).length == 0)
  // {
  //  error_password = 'Password is required';
  //  $('#error_password').text(error_password);
  //  $('#password').addClass('has-error');
  // }
  // else
  // {
  //  error_password = '';
  //  $('#error_password').text(error_password);
  //  $('#password').removeClass('has-error');
  // }

  if(error_first_name != '' || error_last_name != '' || error_image != '')
  {
   return false;
  }
  else
  {
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#login_details').removeClass('active');
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in'); 
  }
 });
 
 $('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_login_details').removeClass('inactive_tab1');
  $('#list_login_details').addClass('active_tab1 active');
  $('#list_login_details').attr('href', '#login_details');
  $('#list_login_details').attr('data-toggle', 'tab');
  $('#login_details').addClass('active in');
 });
 
 // $('#btn_personal_details').click(function(){
 //  var error_first_name = '';
 //  var error_last_name = '';
  
 //  if($.trim($('#first_name').val()).length == 0)
 //  {
 //   error_first_name = 'First Name is required';
 //   $('#error_first_name').text(error_first_name);
 //   $('#first_name').addClass('has-error');
 //  }
 //  else
 //  {
 //   error_first_name = '';
 //   $('#error_first_name').text(error_first_name);
 //   $('#first_name').removeClass('has-error');
 //  }
  
 //  if($.trim($('#last_name').val()).length == 0)
 //  {
 //   error_last_name = 'Last Name is required';
 //   $('#error_last_name').text(error_last_name);
 //   $('#last_name').addClass('has-error');
 //  }
 //  else
 //  {
 //   error_last_name = '';
 //   $('#error_last_name').text(error_last_name);
 //   $('#last_name').removeClass('has-error');
 //  }

 //  if(error_first_name != '' || error_last_name != '')
 //  {
 //   return false;
 //  }
 //  else
 //  {
 //   $('#list_personal_details').removeClass('active active_tab1');
 //   $('#list_personal_details').removeAttr('href data-toggle');
 //   $('#personal_details').removeClass('active');
 //   $('#list_personal_details').addClass('inactive_tab1');
 //   $('#list_contact_details').removeClass('inactive_tab1');
 //   $('#list_contact_details').addClass('active_tab1 active');
 //   $('#list_contact_details').attr('href', '#contact_details');
 //   $('#list_contact_details').attr('data-toggle', 'tab');
 //   $('#contact_details').addClass('active in');
 //  }
 // });
 
 // $('#previous_btn_contact_details').click(function(){
 //  $('#list_contact_details').removeClass('active active_tab1');
 //  $('#list_contact_details').removeAttr('href data-toggle');
 //  $('#contact_details').removeClass('active in');
 //  $('#list_contact_details').addClass('inactive_tab1');
 //  $('#list_personal_details').removeClass('inactive_tab1');
 //  $('#list_personal_details').addClass('active_tab1 active');
 //  $('#list_personal_details').attr('href', '#personal_details');
 //  $('#list_personal_details').attr('data-toggle', 'tab');
 //  $('#personal_details').addClass('active in');
 // });
 
 $('#btn_contact_details').click(function(){
   $('#btn_contact_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
   $("#register_form").submit();
  
 });

 $('#')
 
});
</script>