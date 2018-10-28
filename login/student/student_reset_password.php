<?php
include '../../connect_db.php';
include '../../validate_input.php';
include '../../header.php';
if(isset($_GET["email"]) && isset($_GET["token"])){
$student_email = test_input($_GET["email"]);
$student_token = test_input($_GET["token"]);

$student_email = mysqli_real_escape_string($conn,$student_email);
$student_token = mysqli_real_escape_string($conn,$student_token);

$query = "SELECT id, token, email FROM student_detail WHERE email = ? AND token = ?";  
				$query_prepare_statement = mysqli_prepare($conn, $query);
		        mysqli_stmt_bind_param($query_prepare_statement, "ss", $student_email, $student_token);  
                if ( mysqli_stmt_execute($query_prepare_statement)) {  
				
				  mysqli_stmt_store_result($query_prepare_statement);  //single step security
				  
				   /* bind result variables */
                  mysqli_stmt_bind_result($query_prepare_statement, $student_id, $student_token, $student_email);  //two step security

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
			  <script src="student_jquery_validations.js"></script>    <!--Jquery validation Rules-->
          <br><br>
		   
          <div class = "container">
  <div class="well well-lg col-md-8 col-md-offset-2"> 
  <center><h3><img src = "../../additional/favicon.png" height = "6%" width = "6%" id="animate1"><span ><b>Reset Password</b></span></h3></center>
</br>
  <!--<h2 class="text-center">STUDENT LOGIN</h2></br>class="pull-right"-->
 <form   method="post" id="student_reset_password_form" class="form-horizontal" enctype="multipart/form-data" >
    <div class = "row">
 <!--<div class="form-group col-xs-12 col-md-8">-->
       <label class="control-label col-sm-2" for="new_password">Enter New Password</label>
       <div class="form-group"><div class="col-sm-8"><input type="password" name="student_reset_password" id = "student_reset_password" class="form-control" placeholder="Enter New Password"></div>
      </div>
    </div></br>
    <div class = "row">
 <!--<div class="form-group col-xs-12 col-md-8">-->
       <label class="control-label col-sm-2" for="confirm_password">Confirm New Password</label>
       <div class="form-group"><div class="col-sm-8"><input type="password" name="student_confirm_reset_password" id = "student_confirm_reset_password" class="form-control" placeholder="Enter New Password"></div>
      </div>
    </div></br>
    <div class = "row">
      <div class = "form-group col-sm-12">
        <input type="hidden" name="student_email" id="student_email" value = "<?php echo $student_email; ?>"/>
                     <input type="hidden" name="student_token" id="student_token" value = "<?php echo $student_token; ?>"/> 
      </div>
    </div>
    
     <div class = "row" >
     <div class="col-sm-offset-2 col-sm-10">
      <!--<input type="submit" name="student_reset_password_button" class="btn btn-info" value="Reset Password" id="faculty_reset_password_button"/>-->
      <button type="submit" class="btn btn-info" id="student_reset_password_button" name="student_reset_password_button">Reset Password</button>
     </div>
     </div></br>
    <div id = "alert_message"></div>
</form>
</div>
</div></br>

</body>  

</html>
<script src = "student_jquery_ajax.js"></script>
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