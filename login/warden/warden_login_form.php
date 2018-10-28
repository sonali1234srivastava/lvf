<?php
ob_start();
session_start();
include '../../connect_db.php';
include '../../header.php';
//include '../../core_session.php';
if(isset($_SESSION["warden_id"])&& !empty($_SESSION["warden_id"])){
  header('location: index.php');
}

// function isloggedin()
//    {
//    if(isset($_SESSION["warden_id"])&& !empty($_SESSION["warden_id"]))
//     return true;
//    else
//     return false;
//    }

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

   $.validator.addMethod( "username", function( value, element ) {
  return this.optional( element ) || /^[a-zA-Z0-9]+$/i.test( value ) && value.length==7;
    }, "Valid warden username only please!!" );

   $.validator.addMethod( "password", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9$@# ]+$/i.test( value ) && value.length>=7;
    }, "Letters Numbers $ @ # only please and should atleast consist of seven characters." );

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

   $("#warden_login_form_id").validate({

      rules:{

            username:{
                       required: true,
                       username: true
               },
               password:{
                       required: true,
                       password: true
               },

            },

  }); 

});

</script>
</head>  

<body>

   <div class = "container">
  <div class="well well-lg col-md-8 col-md-offset-2"> 
  <center><h3><img src = "../../additional/favicon.png" height = "6%" width = "6%" id="animate1"><span ><b>WARDEN LOGIN</b></span></h3></center>
</br>
  <!--<h2 class="text-center">STUDENT LOGIN</h2></br>class="pull-right"-->
 <form   id="warden_login_form_id"   class="form-horizontal">
    <div class = "row">
 <!--<div class="form-group col-xs-12 col-md-8">-->
       <label class="control-label col-sm-2" for="username">USERNAME :</label>
       <div class="form-group"><div class="col-sm-8"><input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" ></div>
      </div>
    </div></br></br>
    <div class = "row">
       <label class="control-label col-md-2" for="password">PASSWORD :</label>
       <div class="form-group"><div class="col-sm-8"><input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" ></div>
       </div>
    </div>
  </br>
  
     <div class = "row" >
     <div class="col-sm-offset-2 col-sm-10"><input type="submit" class="btn btn-success" id="action" value="LOGIN">
     </div>
     </div></br>
  <div id = "alert_message"></div>
</form>
<div class = "pull-right text-primary" id = "warden_forgot_password"><b><a href="warden_forgot_password.php">Forgot Password ?</a></b></div>

</div>
</div>

</body>

<script>
 $(document).ready(function(){
   $('#action').val("LOGIN");
   $('#action').attr("disabled",false);
   $(document).on('submit', '#warden_login_form_id' , function(event){

    event.preventDefault();
    var username = $('#username').val();
    var password = $('#password').val();
        // console.log("hey1");
    if(username != '' && password != '')
   { //console.log("hey2");

     $.ajax({
           //console.log("hey3");
      url:"warden_login.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,

      beforesend:function(){
      $('#action').val("Sending...");
      $('#action').attr("disabled",false);
     },
      success:function(data){
     
     if(data == 100)
     { //console.log("hh");
      window.location="index.php"
           
     }
     else{
            $('#alert_message').html('<span class="text-danger"><b>'+data+'</b></span>');
            setTimeout('$("#alert_message").html("")',3000);
       }
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


     