<?php
include '../../connect_db.php';
include '../../validate_input.php';
include '../../header.php';
if(isset($_GET["email"]) && isset($_GET["token"])){
$warden_email = test_input($_GET["email"]);
$warden_token = test_input($_GET["token"]);

$warden_email = mysqli_real_escape_string($conn,$warden_email);
$warden_token = mysqli_real_escape_string($conn,$warden_token);

$query = "SELECT id, token, email FROM warden_detail WHERE email = ? AND token = ?";  
				$query_prepare_statement = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($query_prepare_statement, "ss", $warden_email, $warden_token);  
                if ( mysqli_stmt_execute($query_prepare_statement)) {  
				
				  mysqli_stmt_store_result($query_prepare_statement);  //single step security
				  
				   /* bind result variables */
                  mysqli_stmt_bind_result($query_prepare_statement, $warden_id, $warden_token, $warden_email);  //two step security

                   /* fetch value */
                  mysqli_stmt_fetch($query_prepare_statement);
				  
                $count = mysqli_stmt_num_rows($query_prepare_statement); 
                if($count > 0)  
                {  
                   
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
</head>
<body>  
			  <script src="warden_jquery_validation.js"></script>    <!--Jquery validation Rules-->
          <br><br>
		   
          <div class = "container">
  <div class="well well-lg col-md-8 col-md-offset-2"> 
  <center><h3><img src = "../../additional/favicon.png" height = "6%" width = "6%" id="animate1"><span ><b>Reset Password</b></span></h3></center>
</br>
  <!--<h2 class="text-center">STUDENT LOGIN</h2></br>class="pull-right"-->
 <form   method="post" id="warden_reset_password_form" class="form-horizontal" enctype="multipart/form-data" >
    <div class = "row">
 <!--<div class="form-group col-xs-12 col-md-8">-->
       <label class="control-label col-sm-2" for="new_password">Enter New Password</label>
       <div class="form-group"><div class="col-sm-8"><input type="password" name="warden_reset_password" id = "warden_reset_password" class="form-control" placeholder="Enter New Password"></div>
      </div>
    </div></br>
    <div class = "row">
 <!--<div class="form-group col-xs-12 col-md-8">-->
       <label class="control-label col-sm-2" for="confirm_password">Confirm New Password</label>
       <div class="form-group"><div class="col-sm-8"><input type="password" name="warden_confirm_reset_password" id = "warden_confirm_reset_password" class="form-control" placeholder="Enter New Password"></div>
      </div>
    </div></br>
    <div class = "row">
      <div class = "form-group col-sm-12">
        <input type="hidden" name="warden_email" id="warden_email" value = "<?php echo $warden_email; ?>"/>
                     <input type="hidden" name="warden_token" id="warden_token" value = "<?php echo $warden_token; ?>"/> 
      </div>
    </div>
    
     <div class = "row" >
     <div class="col-sm-offset-2 col-sm-10">
      <!--<input type="submit" name="student_reset_password_button" class="btn btn-info" value="Reset Password" id="faculty_reset_password_button"/>-->
      <button type="submit" class="btn btn-info" id="warden_reset_password_button" name="warden_reset_password_button">Reset Password</button>
     </div>
     </div></br>
    <div id = "alert_message"></div>
</form>
</div>
</div></br>

</body>  

</html>
<script src = "warden_jquery_ajax.js"></script>
<?php  
          
        
                }  
                else  
                {  
                     echo "Link Expired !";  
                } 
		   }

//echo $hod_email . $hod_token;
}else{
	echo "Not Allowed";
}
  mysqli_close($conn);
?>