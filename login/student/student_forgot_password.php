<?php
include '../../connect_db.php';
include '../../header.php';
include '../../core_session.php';

if(loggedin())
{
   header("Location: index.php");
}
?>

<html>
<head>
<style>
  
   .container{
  margin-top: 5%;
  
   }

    body {
       height : 85vh;
       margin:0;
  padding:0;
    background-image: url("../../additional/well_bg.jpg");
    background-repeat: no-repeat;
  background-attachment: fixed;
   background-size: cover;
}

</style>
<script>
  
$(function(){

	 /*$.validator.addMethod( "username_email", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==10;
    }, "Valid University Roll Number only please !" );

	 $.validator.addMethod( "password", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9$@# ]+$/i.test( value ) && value.length>=7;
    }, "Letters Numbers $ @ # only please and should atleast consist of seven characters." );*/

  $.validator.setDefaults({
    errorClass: 'text-danger',
  
   highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error')
    .removeClass('has-success');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error')
    .addClass('has-success');
    },
  
  });

   $("#student_forgot_password_form_id").validate({

      rules:{

      	    username_email:{
                       required: true,
                 },
          },
     }); 

});

</script>
</head>  

<body>
	<div class = "container">
  <div class="well well-lg col-md-8 col-md-offset-2"> 
  <center><h3><img src = "../../additional/favicon.png" height = "6%" width = "6%" id="animate1"><span ><b>Forgot Password</b></span></h3></center>
</br>
  <!--<h2 class="text-center">STUDENT LOGIN</h2></br>class="pull-right"-->
 <form   id="student_forgot_password_form_id" class="form-horizontal">
    <div class = "row">
 <!--<div class="form-group col-xs-12 col-md-8">-->
       <label class="control-label col-sm-2" for="username_email">Username or Email :</label>
       <div class="form-group"><div class="col-sm-8"><input type="text" name="username_email" id="username_email" class="form-control" placeholder="Enter Username or Email" ></div>
      </div>
    </div></br></br>
    
     <div class = "row" >
     <div class="col-sm-offset-2 col-sm-10">
     	<input type="submit" class="btn btn-info" id="student_forgot_password_button" name="student_forgot_password_button" value="Send Email" >
     </div>
     </div></br>
    <div id = "alert_message"></div>
</form>
</div>
</div>

</body>

</html>  
 
 <script>
  $(document).on('submit', '#student_forgot_password_form_id', function(event){
  event.preventDefault();
    $("#student_forgot_password_button").attr("disabled",false);
      $('#student_forgot_password_button').val("Send Email");
	  $("#student_forgot_password_button").removeClass("btn-primary");
	  $("#student_forgot_password_button").removeClass("btn-warning");
	  $("#student_forgot_password_button").removeClass("btn-danger");
	  $("#student_forgot_password_button").removeClass("btn-success");
	  $("#student_forgot_password_button").addClass("btn-info");
      $('#alert_message').html('');	  
  var username_email = $('#username_email').val();
  $.ajax({
   url:"student_forgot_password_php_code.php",
   method:"POST",
   data:new FormData(this),
    dataType:"json",
	contentType:false,
    processData:false,
   beforeSend:function(){
		 $('#student_forgot_password_button').val("Sending...");      //this isn't showing up
    // $("#student_forgot_password_button").val("Sending..");
	 $("#student_forgot_password_button").removeClass("btn-primary");
	 $("#student_forgot_password_button").removeClass("btn-success");
	 $("#student_forgot_password_button").removeClass("btn-info");
	 $("#student_forgot_password_button").addClass("btn-warning");	
	
   },
   success:function(data)
   {
	       
	if(data.number == 100){
		   $('#alert_message').html(data.message);
		   $('#student_forgot_password_form_id')[0].reset();
	  $('#student_forgot_password_button').attr("disabled",true);
      $('#student_forgot_password_button').val("Email Sent");      //neither this text change shows up!!
	  $("#student_forgot_password_button").removeClass("btn-primary");
	  $("#student_forgot_password_button").removeClass("btn-warning");
	  $("#student_forgot_password_button").removeClass("btn-danger");
	  $("#student_forgot_password_button").removeClass("btn-info");
	  $("#student_forgot_password_button").addClass("btn-success");	
	}
	if(data.number == 101){
		   $('#alert_message').html(data.message);
		   $('#student_forgot_password_form_id')[0].reset();
	  $("#student_forgot_password_button").attr("disabled",false);
      $('#student_forgot_password_button').val("Try Again");
	  $("#student_forgot_password_button").removeClass("btn-primary");
	  $("#student_forgot_password_button").removeClass("btn-warning");
	  $("#student_forgot_password_button").removeClass("btn-success");
	  $("#student_forgot_password_button").removeClass("btn-info");
	  $("#student_forgot_password_button").addClass("btn-danger");	
	}
   }
  });
 });

 
 </script>
 
 <?php
  mysqli_close($conn);
 ?>