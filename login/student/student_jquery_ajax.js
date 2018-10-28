$(document).ready(function(){

$(document).on('submit', '#student_reset_password_form', function(event){    //Faculty Reset Password
  event.preventDefault();
  var student_reset_password = $('#student_reset_password').val();
  var student_confirm_reset_password = $('#student_confirm_reset_password').val();
  if(student_reset_password != ''  && student_confirm_reset_password != '')
  {
   $.ajax({
    url:"student_reset_password_php_code.php",
    method:'POST',
	data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
	 $('#student_reset_password_form')[0].reset();
     $('#alert_message').html(data);
	 $(".form-group").removeClass("has-success has-error");
    }
   });
   setInterval(function(){
     $('#alert_message').html('');
    }, 50000);
  }
  else
  {
   alert("All Fields are Required");
  }
 });

});