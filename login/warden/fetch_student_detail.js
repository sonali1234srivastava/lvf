$(document).ready(function(){
fetch_student_detail();  					//fetch data
       
     function fetch_student_detail()
     {
   	  
      var dataTable = $('#warden_student_list_data').DataTable({      



       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
        url:"fetch_student_list.php",
        type:"POST"
        },
   	"columnDefs":[
         {
          "targets":[0,13,14,15],
          "orderable":false,
         },
        ],

        dom : 'lBfrtip',
      // title: 'abc',
      buttons : [
        {
           extend: 'copy',
           text: 'COPY',
           title: "Student Details :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'csv',
           text: 'CSV',
           title: "Student Details :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'excel',
           text: 'EXCEL',
           title: "Student Details :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'pdf',
           text: 'PDF',
           title: "Student Details :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'print',
           text: 'PRINT',
           title: "Student Details :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'colvis',
           text: 'COLUMN VISIBILITY',
        },
        
      ],

      });
     }

    $(document).on('click', '.delete', function(){
      var student_id = $(this).attr("id");
     $('#deleteModal').modal('show');
    $('#modal_title').text("Are you sure you want to delete?");
  $('#notdelbtn').click(function(){
    student_id = null;
  });
//});
   $(document).on('submit', '#delete_form', function(event){
  event.preventDefault();
   
      //var c = confirm("Are you Sure?");
      //if(c == true)
      //{
       $.ajax({
   url:"warden_student_delete.php",
   method:"POST",
   data:{
     student_id:student_id
     }, 
     success:function(data)
    {
       $('#deleteModal').modal('hide');
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     setTimeout('$("#alert_message").html("")',3000);
     $('#warden_student_list_data').DataTable().destroy();
       fetch_student_detail();      
          
    }
  });
    //}
  });
 });


    $(document).on('click', '.update', function(){            //fetch single entry
  var student_id = $(this).attr("id");
  $.ajax({
   url:"fetch_student_single.php",
   method:"POST",
   data:{student_id:student_id},
   dataType:"json",
   success: function(data)
   {
    // console.log("hey");
    $('#myModal').modal('show');
    $('#name').val(data.name);
    $('#number').val(data.number);
    $('#email').val(data.email);
    $('#course').val(data.course);
    $('#branch').val(data.branch);
    $('#year').val(data.year);
    $('#username').val(data.username);
    $('#hostel_name').val(data.hostel_name);
    $('#room_number').val(data.room_number);
    $('#home_address').val(data.home_address);
    $('#father_name').val(data.father_name);
    $('#father_number').val(data.father_number);
    
    $('.modal-title').html('<center><span class="text-primary"><b>Edit Student Details</b></span></center>');
     
   }
  });

  });
 //}); 

  
 //$(document).ready(function(){
   $('#save').val("SAVE CHANGES");
   $('#save').attr("disabled",false);
   $(document).on('submit', '#student_form_id' , function(event){
    //console.log("hello");
    event.preventDefault();
    $('.modal-title').html('<center><span class="text-primary"><b>Change Student Details</b></span></center>');
    
    var name = $('#name').val();
    var number = $('#number').val();
    var email = $('#email').val();
    var course = $('#course').val();
    var branch = $('#branch').val();
    var year = $('#year').val();
    var username = $('#username').val();
    var hostel_name = $('#hostel_name').val();
    var room_number = $('#room_number').val();
    var home_address = $('#home_address').val();
    var father_name = $('#father_name').val();
    var father_number = $('#father_number').val();
    

    if(name != '' && number != '' && email != '' && course != '' && branch != '' && year != '' && username != '' && hostel_name != '' && room_number != '' && home_address != '' &&
     father_name != '' && father_number != '')
{

     $.ajax({
   url:"edit_student_single.php",
   method:"POST",
   data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
   {
     if(data == 100)
    {  
     $('#student_form_id')[0].reset();
     $('#myModal').modal('hide');
     $('#alert_message').html('<div class="alert alert-success">Details Updated</div>'); 
    setTimeout('$("#alert_message").html("")',3000);  
     $('#warden_student_list_data').DataTable().destroy();
       fetch_student_detail();      
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


   $(document).on('click', '.approve', function(){
      var student_id = $(this).attr("id");
      
      $.ajax({
   url:"student_approve.php",
   method:"POST",
   data:{
     student_id:student_id
     }, 
     beforeSend:function(){
     
   $("#"+student_id+".approve").val("Approving...");
   $("#"+student_id+".approve").removeClass("btn-primary");
   $("#"+student_id+".approve").removeClass("btn-success");
   $("#"+student_id+".approve").removeClass("btn-info");
   $("#"+student_id+".approve").addClass("btn-warning");  
  
   },
     success:function(data)
    {
      if(data == 101)
     {   
     
    $("#"+student_id+".approve").attr("disabled",true);
    $("#"+student_id+".approve").val("Approved");
    $("#"+student_id+".approve").removeClass("btn-primary");
    $("#"+student_id+".approve").removeClass("btn-warning");
    $("#"+student_id+".approve").removeClass("btn-danger");
    $("#"+student_id+".approve").removeClass("btn-info");
    $("#"+student_id+".approve").addClass("btn-success"); 
     //$("#"+leave_id+".send").removeClass("btn-info");   // Not needed bcoz on one row btn-info class is only at one SEND button 
     //$("#"+leave_id+".send").addClass("btn-success");   //needed some clarification as where to add success class of btn in the row with same id on every column
     $('#alert_message').html('<div class="alert alert-success">Student has been verified and approval mail is being sent!!</div>');
     setTimeout('$("#alert_message").html("")',3500);
     /*$(".edit").attr("disabled",true);
     $(".delete").attr("disabled",true);*/
     /*$("#"+leave_id).attr("disabled",true);
     $("#"+leave_id).attr("disabled",true);*/
                    //OR......
     /*$("#"+leave_id+".edit").attr("disabled",true);      //is this possible
     $("#"+leave_id+".delete").attr("disabled",true); */   //is this possible

     /*$('#leave_list_data').DataTable().destroy();
       fetch_leave_detail();*/

     }
   
    else if(data == 102){
     $('#alert_message').html('<div class="alert alert-danger">Some Connection issue, Email cannot be Sent!!</div>');
       $("#"+student_id+".approve").attr("disabled",false);
     $("#"+student_id+".approve").text("Try Again");
       $("#"+student_id+".approve").removeClass("btn-primary");
       $("#"+student_id+".approve").removeClass("btn-warning");
       $("#"+student_id+".approve").removeClass("btn-success");
       $("#"+student_id+".approve").addClass("btn-danger");   
     }

     else{
         $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>');
         setTimeout('$("#alert_message").html("")',3500);
      }

    }
  });
   
  });

   $(document).on('submit', '#warden_change_password_form', function(event){    //Change Password
  event.preventDefault();
  var warden_old_change_password = $('#warden_old_change_password').val();
  var warden_new_change_password = $('#warden_new_change_password').val();
  var warden_confirm_change_password = $('#warden_confirm_change_password').val();
  if(warden_old_change_password != '' && warden_new_change_password != ''  && warden_confirm_change_password != '')
  {  //console.log("hey");    //not showing either??
   $.ajax({
    url:"warden_change_password.php",
    method:'POST',
  data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
   $('#warden_change_password_form')[0].reset();
     $('#warden_change_password_modal').modal('hide');
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