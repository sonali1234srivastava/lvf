<?php

include '../../connect_db.php';
include '../../header.php';
?> 

<html>
	
<head>

 <style>
  
   .container{
  margin-top: 5%;
  
   }

    body {
       height : 100vh;
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
  
$.validator.addMethod( "lettersonly", function( value, element ) {
  return this.optional( element ) || /^[a-z ]+$/i.test( value );
    }, "Letters only please !" );
  
 /* $.validator.addMethod( "invalid_characters", function( value, element ) {
  return this.optional( element ) || /^[^&<>'"]+$/i.test( value );
    }, "Single quotes Double quotes & < > Not Allowed !" );
    */

  $.validator.addMethod( "email_2", function( value, element ) {
	return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)$/i.test( value );
    }, "Not a valid Email" );

  $.validator.addMethod( "numbersonly", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==10;
    }, "Valid number only please !" );

  $.validator.addMethod( "hostel_name", function( value, element ) {
  return this.optional( element ) || /^[1-3]+$/i.test( value );
    }, "Valid hostel name only please !" );
  
  $.validator.addMethod( "password", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9$@# ]+$/i.test( value ) && value.length>=7;
    }, "Letters Numbers $ _ @ # only please and should atleast consist of seven characters." );

  /*$.validator.addMethod( "year", function( value, element ) {
  return this.optional( element ) || /^[a-z1-4 ]+$/i.test( value );
    }, "Letters and Numbers only please !" );
    */

  $.validator.addMethod( "username", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9]+$/i.test( value ) && value.length>=7;
    }, "Valid warden userid only please !" );

  $.validator.addMethod( "address", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9, ]+$/i.test( value );
    }, "Valid address only please !" );

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


  $("#warden_form_id").validate({

      rules:{
               name:{
                       required: true,
                       lettersonly: true
               },
               number:{
                       required: true,
                       numbersonly: true
               },
               email: {
                required: true,
                email: true,
				        email_2:true
              },
              /*course:{
                       required: true,
                       lettersonly: true
               },
               branch:{
                       required: true,
                       lettersonly: true
               },
              year:{
                       required: true,
                       year: true
               },
               */
               username:{
                       required: true,
                       username: true
               },
               password:{
                       required: true,
                       password: true
               },
               password_again:{
                       required: true,
                       password: true
               },
               hostel_name:{
                       required: true,
                       hostel_name: true
               },
               home_address:{
                       required: true,
                       address: true
               },
               /*father_name:{
                       required: true,
                       lettersonly: true
               }, 
               father_number:{
                       required: true,
                       numbersonly: true
               },*/

      },

  }); 

});

</script>

<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
	<div class="container">
    <div class="well well-lg col-md-8 col-md-offset-2"> 
      <center><h3><img src = "../../additional/favicon.png" height = "6%" width = "6%" id="animate1"><span ><b>WARDEN REGISTRATION</b></span></h3></center>
</br>
  
<form   id="warden_form_id" class="form-horizontal">
<div class ="row">
  <label class="control-label col-sm-2" for="name">NAME :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="name" id="name" class="form-control" placeholder = "NAME"></div></div>
</div></br>
<div class="row">
  <label class="control-label col-sm-2" for="number">NUMBER :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="number" id="number" class="form-control" placeholder = "NUMBER"></div></div>
</div></br>
<div class="row">
  <label class="control-label col-sm-2" for="email">EMAIL :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="email" id="email" class="form-control" placeholder = "EMAIL"></div></div>
</div></br>
<!--<div class="form-group col-xs-12 col-md-8">
<input type="text" name="course" id="course" class="form-control" placeholder = "COURSE"></div></br>
<div class="form-group col-xs-12 col-md-8">
<input type="text" name="branch" id="branch" class="form-control" placeholder = "BRANCH"></div></br>
<div class="form-group col-xs-12 col-md-8">
<input type="text" name="year" id="year" class="form-control" placeholder = "YEAR"></div></br>-->
<div class="row">
  <label class="control-label col-sm-2" for="username">USERNAME :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="username" id="username" class="form-control" placeholder = "WARDEN_ID"></div></div>
</div></br>
<div class="row">
  <label class="control-label col-sm-2" for="password">PASSWORD :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="password" name="password" id="password" class="form-control" placeholder = "PASSWORD"></div></div>
</div></br>
<div class="row">
  <label class="control-label col-sm-2" for="password">PASSWORD AGAIN :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="password" name="password_again" id="password_again" class="form-control" placeholder = "PASSWORD_AGAIN"></div></div>
</div></br>
<div class="row">
  <label class="control-label col-sm-2" for="hostel_name">HOSTEL NAME :</label>
<div class="form-group">
  <div class="col-sm-8">
        <select name="hostel_name" id="hostel_name" class="form-control">
                        <option value="1"><b>GH1</b></option>
                        <option value="2"><b>GH2</b></option>
                        <option value="3"><b>GH3</b></option>
        </select>
</div>
</div></div></br>
<div class="row">
  <label class="control-label col-sm-2" for="home_address">HOME ADDRESS :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="home_address" id="home_address" class="form-control" placeholder = "HOME_ADDRESS"></div>
</div></div></br></br>
<!--<div class="form-group col-xs-12 col-md-8">
<input type="text" name="father_name" id="father_name" class="form-control" placeholder = "FATHER_NAME"></div></br>
<div class="form-group col-xs-12 col-md-8">
<input type="text" name="father_number" id="father_number" class="form-control" placeholder = "FATHER_NUMBER"></div></br>-->
<div class = "row">
<div class="form-group col-xs-12 col-sm-offset-2 col-sm-8">
<div id = "alert_message"></div></div></div>

<div class="col-sm-offset-1"><div class="g-recaptcha" data-sitekey="6LdGFXcUAAAAAA7wKR7TYj6YKgyJyfjJiAhlFoTJ"></div></div></br>

<div class="row">
<div class="text-center">
<input type="submit" id="action" class = "btn btn-info" value="SEND">
</div></div></br>
</form>
</div>
</div>
</body>

<script>
 $(document).ready(function(){
   $('#action').val("Send");
   $('#action').attr("disabled",false);
   $(document).on('submit', '#warden_form_id' , function(event){
    
    event.preventDefault();
    var name = $('#name').val();
    var number = $('#number').val();
    var email = $('#email').val();
    /*var course = $('#course').val();
    var branch = $('#branch').val();
    var year = $('#year').val();*/
    var username = $('#username').val();
    var password = $('#password').val();
    var password_again = $('#password_again').val();
    var hostel_name= $('#hostel_name').val();
    var home_address = $('#home_address').val();
    /*var father_name = $('#father_name').val();
    var father_number = $('#father_numberh').val();*/


    if(name != '' && number != '' && email != '' && username != '' && password != '' && password_again != '' && hostel_name != '' && home_address != ''){

     $.ajax({
     
      url:"warden_registration_database.php",
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,

      beforeSend: function(){
        
        $('#action').val("Sending...");
        $('#action').attr("disabled",false);
     },
     success:function(data){
      // alert("123");
      $('#action').val("Sent");
     $('#action').attr("disabled",true);
     
      if(data == 100)
      {
        $('#alert_message').html('<span class="text-success"><b>Before being Registered, Please VERIFY Your Email Detail !!</b></span>');
       setTimeout('$("#alert_message").html("")',4000);
        $('#warden_form_id')[0].reset();
       // window.location.href = "registered.php";
      }
      else
      {
         $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
         setTimeout('$("#alert_message").html("")',3500);
         //$('#warden_form_id')[0].reset();
      }
        /* $('#alert_message').html(data);
     $('#warden_form_id')[0].reset();*/
     }
   

   });
  }
  else
  {
   alert("All Fields are Required");
  }

  });

}); 

</script>  

</html>