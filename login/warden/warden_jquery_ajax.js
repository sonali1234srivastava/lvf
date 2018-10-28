$(document).ready(function(){

$(document).on('submit', '#warden_reset_password_form', function(event){    //Faculty Reset Password
  event.preventDefault();
  var warden_reset_password = $('#warden_reset_password').val();
  var warden_confirm_reset_password = $('#warden_confirm_reset_password').val();
  if(warden_reset_password != ''  && warden_confirm_reset_password != '')
  {
   $.ajax({
    url:"warden_reset_password_php_code.php",
    method:'POST',
	data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
	 $('#warden_reset_password_form')[0].reset();
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