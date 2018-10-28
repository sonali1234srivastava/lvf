$(document).ready(function(){
fetch_warden_leave_detail();  					//fetch data
    
   // var dataTable ;

     function fetch_warden_leave_detail()
     {
   	  
     var  dataTable = $('#warden_leave_list_data').DataTable({

        dom : 'lBfrtip',
      // title: 'abc',
      buttons : [
        {
           extend: 'copy',
           text: 'COPY',
           title: "Leave Requests :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'csv',
           text: 'CSV',
           title: "Leave Requests :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'excel',
           text: 'EXCEL',
           title: "Leave Requests :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'pdf',
           text: 'PDF',
           title: "Leave Requests :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'print',
           text: 'PRINT',
           title: "Leave Requests :",
           exportOptions: {
               columns: ':visible'
            },
        },
        {
           extend: 'colvis',
           text: 'COLUMN VISIBILITY',
        },
        
      ],



       "processing" : true,
       "serverSide" : true,
       "order" : [],
       "ajax" : {
        url:"fetch_warden_leave_list.php",
        type:"POST"
        },
   	"columnDefs":[
         {
          "targets":[0,11,14,17,19,20],
          "orderable":false,
         },
        ],	
      });
     }

   $(document).on('click', '.grant', function(){
      var leave_id = $(this).attr("id");
      
      $.ajax({
   url:"leave_grant.php",
   method:"POST",
   data:{
     leave_id:leave_id
     }, 
     beforeSend:function(){
     
   $("#"+leave_id+".grant").val("Granting...");
   $("#"+leave_id+".grant").removeClass("btn-primary");
   $("#"+leave_id+".grant").removeClass("btn-success");
   $("#"+leave_id+".grant").removeClass("btn-info");
   $("#"+leave_id+".grant").addClass("btn-warning");  
  
   },
     success:function(data)
    {
      if(data == 101)
     {   
     
    $("#"+leave_id+".grant").attr("disabled",true);
    $("#"+leave_id+".grant").val("Granted");
    $("#"+leave_id+".grant").removeClass("btn-primary");
    $("#"+leave_id+".grant").removeClass("btn-warning");
    $("#"+leave_id+".grant").removeClass("btn-danger");
    $("#"+leave_id+".grant").removeClass("btn-info");
    $("#"+leave_id+".grant").addClass("btn-success"); 
    // alert("abc");
     //$("#"+leave_id+".send").removeClass("btn-info");   // Not needed bcoz on one row btn-info class is only at one SEND button 
     //$("#"+leave_id+".send").addClass("btn-success");   //needed some clarification as where to add success class of btn in the row with same id on every column
     $('#alert_message1').html('<div class="alert alert-success">Leave has been granted to the student and approval mail is being sent!!</div>');
     setTimeout('$("#alert_message1").html("")',3500);
     /*$(".edit").attr("disabled",true);
     $(".delete").attr("disabled",true);*/
     /*$("#"+leave_id).attr("disabled",true);
     $("#"+leave_id).attr("disabled",true);*/
                    //OR......
     $("#"+leave_id+".refuse").attr("disabled",true);      //is this possible
    /* $("#"+leave_id+".delete").attr("disabled",true); */   //is this possible

     /*$('#leave_list_data').DataTable().destroy();
       fetch_leave_detail();*/

     }
   
    else if(data == 102){
       $('#alert_message1').html('<div class="alert alert-danger">Some Connection issue, Email cannot be Sent!!</div>');
       $("#"+leave_id+".grant").attr("disabled",false);
       $("#"+leave_id+".grant").text("Try Again");
       $("#"+leave_id+".grant").removeClass("btn-primary");
       $("#"+leave_id+".grant").removeClass("btn-warning");
       $("#"+leave_id+".grant").removeClass("btn-success");
       $("#"+leave_id+".grant").addClass("btn-danger");   
     }

     else{
         $('#alert_message1').html('<div class="alert alert-danger">'+data+'</div>');
         setTimeout('$("#alert_message1").html("")',3500);
      }

    }
  });
   
  });


   $(document).on('click', '.refuse', function(){
      var leave_id = $(this).attr("id");
      
      $.ajax({
   url:"leave_refuse.php",
   method:"POST",
   data:{
     leave_id:leave_id
     }, 
     beforeSend:function(){
     
   $("#"+leave_id+".refuse").val("Refusing...");
   $("#"+leave_id+".refuse").removeClass("btn-primary");
   $("#"+leave_id+".refuse").removeClass("btn-success");
   $("#"+leave_id+".refuse").removeClass("btn-info");
   $("#"+leave_id+".refuse").addClass("btn-danger");  
  
   },
     success:function(data)
    {
      if(data == 101)
     {   
     
    $("#"+leave_id+".refuse").attr("disabled",true);
    $("#"+leave_id+".refuse").val("Refused");
    $("#"+leave_id+".refuse").removeClass("btn-primary");
    $("#"+leave_id+".refuse").removeClass("btn-warning");
    $("#"+leave_id+".refuse").removeClass("btn-danger");
    $("#"+leave_id+".refuse").removeClass("btn-info");
    $("#"+leave_id+".refuse").addClass("btn-danger"); 
     //$("#"+leave_id+".send").removeClass("btn-info");   // Not needed bcoz on one row btn-info class is only at one SEND button 
     //$("#"+leave_id+".send").addClass("btn-success");   //needed some clarification as where to add success class of btn in the row with same id on every column
     $('#alert_message1').html('<div class="alert alert-success">Leave has been rejected to the student and denial mail is being sent!!</div>');
     setTimeout('$("#alert_message1").html("")',3500);
     /*$(".edit").attr("disabled",true);
     $(".delete").attr("disabled",true);*/
     /*$("#"+leave_id).attr("disabled",true);
     $("#"+leave_id).attr("disabled",true);*/
                    //OR......
     $("#"+leave_id+".grant").attr("disabled",true);      //is this possible
     /*$("#"+leave_id+".delete").attr("disabled",true); */   //is this possible

     /*$('#leave_list_data').DataTable().destroy();
       fetch_leave_detail();*/

     }
   
    else if(data == 102){
       $('#alert_message1').html('<div class="alert alert-danger">Some Connection issue, Email cannot be Sent!!</div>');
       $("#"+leave_id+".refuse").attr("disabled",false);
       $("#"+leave_id+".refuse").text("Try Again");
       $("#"+leave_id+".refuse").removeClass("btn-primary");
       $("#"+leave_id+".refuse").removeClass("btn-warning");
       $("#"+leave_id+".refuse").removeClass("btn-success");
       $("#"+leave_id+".refuse").addClass("btn-danger");   
     }

     else{
         $('#alert_message1').html('<div class="alert alert-danger">'+data+'</div>');
         setTimeout('$("#alert_message1").html("")',3500);
      }

    }
  });
   
  });


 });    