 $(document).ready(function(){
fetch_leave_detail();  					//fetch data
    
   // var dataTable ;

     function fetch_leave_detail()
     {
   	  
     var  dataTable = $('#leave_list_data').DataTable({
       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
        url:"fetch_leave_list.php",
        type:"POST"
        },
   	"columnDefs":[
         {
          "targets":[0,11,14,17,19,20,21],
          "orderable":false,
         },
        ],	
      });
     }

     $(document).on('click', '.delete', function(){
      var leave_id = $(this).attr("id");
     $('#deleteModal').modal('show');
    $('#modal_title').text("Are you sure you want to delete?");
  $('#notdelbtn').click(function(){
    leave_id = null;
  });
//});
   $(document).on('submit', '#delete_form', function(event){
  event.preventDefault();
   
      //var c = confirm("Are you Sure?");
      //if(c == true)
      //{
       $.ajax({
   url:"leave_delete.php",
   method:"POST",
   data:{
     leave_id:leave_id
     }, 
     success:function(data)
    {
       $('#deleteModal').modal('hide');
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     setTimeout('$("#alert_message").html("")',3000);
     $('#leave_list_data').DataTable().destroy();
       fetch_leave_detail();      
          
    }
  });
    //}
  });
 });


  $(document).on('click', '.edit', function(){            //fetch single entry
  var leave_id = $(this).attr("id");
  $.ajax({
   url:"fetch_leave_single.php",
   method:"POST",
   data:{leave_id:leave_id},
   dataType:"json",
   success: function(data)
   {
    // console.log("hey");
    $('#myModal').modal('show');
    $('#name').val(data.student_name);
    $('#room_number').val(data.room_number);
    $('#roll_number').val(data.roll_number);
    $('#student_number').val(data.student_number);
    $('#course').val(data.course_branch);
    $('#semester').val(data.semester);
    $('#hostel_name').val(data.hostel_name);
    $('#leave_period').val(data.leave_period);
    $('#days_from').val(data.day_from);
    $('#days_to').val(data.day_to);
    $('#reason').val(data.reason);
    $('#visiting_person').val(data.visiting_person_name);
    $('#relation').val(data.relation);
    $('#visiting_person_address').val(data.address_contact_number);
    $('#applicant_number').val(data.applicant_mobile_number);
    $('#residence_address').val(data.residence_address_number);
    $('#student_signature').val(data.student_signature);
    $('#date').val(data.nowdate);
    
    $('.modal-title').html('<center><span class="text-primary"><b>Edit Leave Details</b></span></center>');
     //console.log("hello1");
    /*$('#hod_id').val(hod_id);
     $('#hod_action').val("Edit");
    $('#hod_operation').val("Edit");*/
   }
  });

  });
 //}); 

  
 //$(document).ready(function(){
   $('#save').val("Send");
   $('#save').attr("disabled",false);
   $(document).on('submit', '#leave_form_id' , function(event){
    //console.log("hello");
    event.preventDefault();
    $('.modal-title').html('<center><span class="text-primary"><b>Change Leave Details</b></span></center>');
    
    var name = $('#name').val();
    var room_number = $('#room_number').val();
    var roll_number = $('#roll_number').val();
    var student_number = $('#student_number').val();
    var course = $('#course').val();
    var semester = $('#semester').val();
    var hostel_name = $('#hostel_name').val();
    var leave_period = $('#leave_period').val();
    var days_from = $('#days_from').val();
    var days_to = $('#days_to').val();
    var reason = $('#reason').val();
    var visiting_person = $('#visiting_person').val();
    var relation = $('#relation').val();
    var visiting_person_address = $('#visiting_person_address').val();
    var applicant_number = $('#applicant_number').val();
    var residence_address = $('#residence_address').val();
    var student_signature = $('#student_signature').val();
    var date = $('#date').val();


    if(name != '' && room_number != '' && roll_number != '' && student_number != '' && course != '' && semester != '' && hostel_name != '' && leave_period != '' &&
     days_from != '' && days_to != '' && reason != '' && visiting_person != '' && relation != '' && visiting_person_address != '' && applicant_number != '' &&
      residence_address != '' && student_signature != '' && date != '')
{

     $.ajax({
   url:"edit_leave_single.php",
   method:"POST",
   data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
   {
     if(data == 100)
    {  
     $('#leave_form_id')[0].reset();
     $('#myModal').modal('hide');
     $('#alert_message').html('<div class="alert alert-success">Details Updated</div>'); 
    setTimeout('$("#alert_message").html("")',3000);  
     $('#leave_list_data').DataTable().destroy();
       fetch_leave_detail();      
   }
     else{
        $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>'); 
      setTimeout('$("#alert_message").html("")',3200);  
     }
   }
  });
  
   /*setInterval(function(){
     $('#alert_task_assign_list_message').html('');
    }, 10000);*/

}
    else
   {
     alert("All Fields are Required");
   }

  });


  $(document).on('click', '.send', function(){
      var leave_id = $(this).attr("id");
      
      $.ajax({
   url:"leave_send.php",
   method:"POST",
   data:{
     leave_id:leave_id
     }, 
     beforeSend:function(){
     
     $("#"+leave_id+".send").val("Sending...");
   $("#"+leave_id+".send").removeClass("btn-primary");
   $("#"+leave_id+".send").removeClass("btn-success");
   $("#"+leave_id+".send").removeClass("btn-warning");
   $("#"+leave_id+".send").addClass("btn-info");  
  
   },
     success:function(data)
    {
      if(data == 101)
     {   
     
    $("#"+leave_id+".send").attr("disabled",true);
    $("#"+leave_id+".send").val("Sent");
    $("#"+leave_id+".send").removeClass("btn-primary");
    $("#"+leave_id+".send").removeClass("btn-warning");
    $("#"+leave_id+".send").removeClass("btn-danger");
    $("#"+leave_id+".send").removeClass("btn-info");
    $("#"+leave_id+".send").addClass("btn-success"); 
     //$("#"+leave_id+".send").removeClass("btn-info");   // Not needed bcoz on one row btn-info class is only at one SEND button 
     //$("#"+leave_id+".send").addClass("btn-success");   //needed some clarification as where to add success class of btn in the row with same id on every column
     $('#alert_message').html('<div class="alert alert-success">Leave Request has been Sent, wait for Warden Response now.</div>');
     setTimeout('$("#alert_message").html("")',3500);
     /*$(".edit").attr("disabled",true);
     $(".delete").attr("disabled",true);*/
     /*$("#"+leave_id).attr("disabled",true);
     $("#"+leave_id).attr("disabled",true);*/
                    //OR......
     $("#"+leave_id+".edit").attr("disabled",true);      //is this possible
     $("#"+leave_id+".delete").attr("disabled",true);    //is this possible

     /*$('#leave_list_data').DataTable().destroy();
       fetch_leave_detail();*/

     }
   
    else if(data == 102){
     $('#alert_message').html('<div class="alert alert-danger">Some Connection issue, Email cannot be Sent!!</div>');
       $("#"+leave_id+".send").attr("disabled",false);
     $("#"+leave_id+".send").text("Try Again");
       $("#"+leave_id+".send").removeClass("btn-primary");
       $("#"+leave_id+".send").removeClass("btn-warning");
       $("#"+leave_id+".send").removeClass("btn-success");
       $("#"+leave_id+".send").addClass("btn-danger");   
     }
   
   else{
         $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>');
         setTimeout('$("#alert_message").html("")',3500);
      }

    }
  });
   
  });

    $(document).on('submit', '#student_change_password_form', function(event){    //Change Password
  event.preventDefault();
  var student_old_change_password = $('#student_old_change_password').val();
  var student_new_change_password = $('#student_new_change_password').val();
  var student_confirm_change_password = $('#student_confirm_change_password').val();
  if(student_old_change_password != '' && student_new_change_password != ''  && student_confirm_change_password != '')
  {  //console.log("hey");    //not showing either??
   $.ajax({
    url:"student_change_password.php",
    method:'POST',
  data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
   $('#student_change_password_form')[0].reset();
     $('#student_change_password_modal').modal('hide');
     $('#alert_message').html(data);
    }
   });
   setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
  }
  else
  {
   alert("All Fields are Required");
  }
 });

    $(document).on('click', '#change_password_button', function(){
   $('.modal-title').text("Change Password");
 });

  // change password ends here


});







 
  
   
     

      










         