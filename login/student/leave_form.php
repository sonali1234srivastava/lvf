<?php

include '../../core_session.php';
include '../../header.php';
include '../../connect_db.php';

if(!loggedin())
 {
      header('Location: ../index.php');
 }    
?>
<html>
<head>
  <style>
  
    body {
       height : 100vh;
       margin:0;
      padding:0;
      background-image: url("../../additional/bg_logo.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
}

   input[name="student_signature"] { font-size: 16px;  font-family: cursive; }


 </style>
</head>
<body>

<script>
  
$(function(){
  
$.validator.addMethod( "lettersonly", function( value, element ) {
  return this.optional( element ) || /^[a-z ]+$/i.test( value );
    }, "Letters only please !" );
  
  $.validator.addMethod( "course", function( value, element ) {
  return this.optional( element ) || /^[a-z/ ]+$/i.test( value );
    }, "Letters only please !" );
  
  $.validator.addMethod( "numbersonly", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==10;
    }, "Valid number only please !" );

  $.validator.addMethod( "leaveno", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length<=2;
    }, "Valid leave days count only please, maximum of 3 months !" );

  $.validator.addMethod( "room_number", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==3 ;
    }, "Valid room number only please !" );

  $.validator.addMethod( "semester", function( value, element ) {
  return this.optional( element ) || /^[1-8]+$/i.test( value ) && value.length==1;
    }, "Valid semester number only please !" );

  $.validator.addMethod( "rollno", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==10;
    }, "Valid University Roll Number only please !" );

  $.validator.addMethod( "studentno", function( value, element ) {
  return this.optional( element ) || /^[0-9a-z]+$/i.test( value ) && value.length==7;
    }, "Valid Student Number only please !" );

  $.validator.addMethod( "address", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9,.\/()\- ]+$/i.test( value );
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


  $("#leave_form_id").validate({

      rules:{
               name:{
                       required: true,
                       lettersonly: true
               },
               room_number:{
                       required: true,
                       room_number: true
               },
               roll_number:{
                       required: true,
                       rollno: true
               },
               student_number:{
                       required: true,
                       studentno: true
               },
               course:{
                       required: true,
               },
               semester:{
                       required: true,
                       semester: true
               },
               hostel_name:{
                       required: true,
               },
               leave_period:{
                       required: true,
                       leaveno: true
               },
               days_from:{
                       required: true,
               },
               days_to:{
                       required: true,
               },
               reason:{
                       required: true,
                       lettersonly: true
               },
               visiting_person:{
                       required: true,
                       lettersonly: true
               },
               relation:{
                       required: true,
                       lettersonly: true
               },
               visiting_person_address:{
                       required: true,
                       address: true
               },
               applicant_number:{
                       required: true,
                       numbersonly: true
               },
               residence_address:{
                       required: true,
                       address: true
               },
               student_signature:{
                       required: true,
                       lettersonly: true
               },
               date:{
                       required: true,
               }, 

     }

  }); 

});

</script>

  <!--style="width: 100%; height: 25%;"    style=" float:left; display:inline; width:23%; height:100%; margin: 15px 0 0 0;"  style=" float:left; display:inline; width:77%; height:100%; "style="margin: 50px 0 15px 0;"
  <center><h2 style="margin: 0 0 20px 150px;" col-sm-offset-4 col-xs-offset-1 col-xs-10-->


   <div class = "container">
    <div class = "row" style="margin: 15px 0 0 0;" width="100%">
     <span class="control-label col-xs-1 col-sm-3" width="5%" style=" float:left; display:inline;">
       <img src="../../logocsi.png" width="65%" height="100%" class="image">
     </span>
     <span class="control-label col-sm-8 col-xs-8" width="95%" style=" float:left; display:inline;">
       <h2><i>AJAY KUMAR GARG ENGINEERING COLLEGE, GHAZIABAD </i></h2>
	   <h2><i>HOSTEL LEAVE APPLICATION FORM</i></h2>
	 </span>  
	 </div> 
    <!--<div class = "row" class="col-sm-offset-6 col-sm-8" >
       
     </div>--> 
   
   </br></br></br></br>

    
  <!--<div class = "container">-->

<form   id="leave_form_id">
<div class = "row">
<label class="control-label col-sm-2">1. Name of Student :</label>
<div class="form-group"><div class="col-sm-5"><input type="text" name="name" id="name" class="form-control"></div></div>
<label class="control-label col-sm-2"> Room No :</label>
<div class="form-group"><div class="col-sm-3"><input type="text" name="room_number" id="room_number" class="form-control" ></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2 ">2. Roll No :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="roll_number" id="roll_number" class="form-control"></div></div>
<label class="control-label col-sm-2">Student No :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="student_number" id="student_number" class="form-control"></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">3. Course/Branch :</label>
<div class="form-group"><div class="col-sm-2">
                        <select name="course" id="course" class="form-control">
                        <option value="CSE"><b>CSE</b></option>
                        <option value="IT"><b>IT</b></option>
                        <option value="ECE"><b>ECE</b></option>
                        <option value="EN/EI"><b>EN/EI</b></option>
                        <option value="CE"><b>CE</b></option>
                        <option value="ME"><b>ME</b></option>
                        <option value="BCA"><b>BCA</b></option>
                        <option value="MCA"><b></b>MCA</option>
                        <option value="MBA"><b>MBA</b></option>
         </select>
</div></div>
<label class="control-label col-sm-2">Semester :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="semester" id="semester" class="form-control"></div></div>
<label class="control-label col-sm-2">Hostel Name :</label>
<div class="form-group"><div class="col-sm-2">
        <select name="hostel_name" id="hostel_name" class="form-control">
                        <option value="1"><b>GH1</b></option>
                        <option value="2"><b>GH2</b></option>
                        <option value="3"><b>GH3</b></option>
        </select>
     </div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">4. Period of Leave :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="leave_period" id="leave_period" class="form-control" ></div></div>
<label class="control-label col-sm-2">Days From :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="days_from" id="days_from" class="form-control" placeholder="YYYY/MM/DD"></div></div>
<label class="control-label col-sm-2">Days To :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="days_to" id="days_to" class="form-control" placeholder="YYYY/MM/DD"></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">5. Reason :</label>
<div class="form-group"><div class="col-sm-6"><textarea rows="2" cols="70" name="reason" id="reason" form="leave_form_id"></textarea></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">6. Name of the person you are visiting :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="visiting_person" id="visiting_person" class="form-control"></div></div>
<label class="control-label col-sm-2">Relation :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="relation" id="relation" class="form-control"></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">7. Address and Contact No (of person you are visiting) :</label>
<div class="form-group"><div class="col-sm-6"><textarea rows="4" cols="70" name="visiting_person_address" id="visiting_person_address" form="leave_form_id"></textarea></div></div>
</div></br>
<!--<input type="text" name="visiting_person_address" id="visiting_person_address" class="form-control" style="row: 3; col:10; " ></div></div></br>-->
<div class = "row">
<label class="control-label col-sm-2">8. Applicant's Mobile No. :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="applicant_number" id="applicant_number" class="form-control" ></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">9. Residence Address & Phone No. :</label>
<div class="form-group"><div class="col-sm-6"><textarea rows="4" cols="70" name="residence_address" id="residence_address" form="leave_form_id"></textarea></div></div>
</div></br>
<!--<input type="text" name="residence_address" id="residence_address" class="form-control" style = "row: 3; col:10;" ></div></br>-->
<div class = "row">
<label class="control-label col-sm-2">10. Student's Signature :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="student_signature" id="student_signature" class="form-control" ></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">11. Date :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="date" id="date" class="form-control" placeholder="YYYY/MM/DD" ></div></div>
</div></br>
<div class = "row">
<div id="alert_message"></div>
</div></br></br>
<div class = "row">
<center><input type="submit" class="btn btn-success" id="action" value="SUBMIT"></center>
</div>

</br></br></br>

</form>
</div>


<!--<div id = "alert_message"></div>-->
</body>

<script>
 
 //$("#date").datetimepicker();
// $("#days_from").datetimepicker();
 //$("#days_to").datetimepicker(); 
 $('#date').datetimepicker({ minDate: new Date() });
                //$('#change_deadline').datetimepicker({ minDate: new Date() });
          $('#days_from').datetimepicker({
                    format:'Y/m/d H:m',
                    onShow:function( ct ){
                     this.setOptions({
                      minDate: new Date() ,
                      maxDate:$('#days_to').val()?$('#days_to').val():false
                     })
                    },
                    timepicker:true
                 });
                $('#days_to').datetimepicker({
                  format:'Y/m/d H:m',
                  onShow:function( ct ){
                   this.setOptions({
                    minDate:$('#days_from').val()?$('#days_from').val():false
                                   })
                  },
                  timepicker:true
                });

 $(document).ready(function(){
   
   $('#action').val("SUBMIT");
   $('#action').attr("disabled",false);
   $(document).on('submit', '#leave_form_id' , function(event){
    
    event.preventDefault();
    var name = $('#name').val();
    var room_number = $('#room_number').val();
    var roll_number = $('#roll_number').val();
    var student_number = $('#student_number').val();
    
    var course = $('#course').val();
    var semester = $('#semester').val();
    var hostel_name= $('#hostel_name').val();
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

    
    var mf = days_from.substring(5,7);
    var df = days_from.substring(8,10);
    var yf = days_from.substring(0,4);
    
    var mt = days_to.substring(5,7);
    var dt = days_to.substring(8,10);

    var leave_count ;
    var dti = parseInt(dt,10);
    var leave_period_int = parseInt(leave_period,10);
    
    if(mf==mt)
    {
      leave_count = dt - df ;
    }
    else
    {
      if(mf=='01'||mf=='03'||mf=='05'||mf=='07'||mf=='08'||mf=='10'||mf=='12')
      {
      	leave_count = dti + (31-df) ;
      }
      else if(mf=='04'||mf=='06'||mf=='09'||mf=='11')
      {
      	leave_count = dti + (30-df) ;
      }
      else
      {
      	if(yf%4 == 0)
      	{
      		leave_count = dti + (29-df) ;
      	}
      	else
      	{
            leave_count = dti + (28-df) ;
      	}

      }

    }	

     var room_number_int = parseInt(room_number,10);
     var check = 0;
  if((room_number_int>100) && (room_number_int<128))
    check = 1;
  if((room_number_int>200) && (room_number_int<228))
    check = 1;
  if((room_number_int>300) && (room_number_int<328))
    check = 1;
  if((room_number_int>400) && (room_number_int<428))
    check = 1;
  if((room_number_int>500) && (room_number_int<528))
    check = 1;
    
  if(check == 1)
  {  
    if(leave_period != '0' && leave_period != '00')
  {
    if(leave_period_int == leave_count && leave_period_int <= 30)
   { 	

    if(name != '' && room_number != '' && roll_number != '' && student_number != '' && course != '' && semester != '' && hostel_name != '' && leave_period != '' && days_from != '' && days_to != '' && reason != '' && visiting_person != '' && relation != '' && visiting_person_address != '' && applicant_number != '' && residence_address != '' && student_signature != '' && date != '' )
    {
             
     $.ajax({
     
      url:"leave_form_database.php",
      method: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,

      beforesend:function(){
      $('#action').val("Sending...");
      $('#action').attr("disabled",false);
     },

     success:function(data){
     
     if(data == 100)
     {
      $('#leave_form_id')[0].reset();
      window.location.href = "index.php" ;
      $('#leave_list_data').DataTable().destroy();
       fetch_leave_detail();
     }
     else
     {
      $('#alert_message').html('<span class="text-danger"><b>'+data+'</b></span>');
       setTimeout('$("#alert_message").html("")',3000);
       //window.location.href = "student_login_index.php" ;
     // $('#alert_message').html(data);
     }
     /*$('#leave_form_id')[0].reset();*/
    }

   });
  }
  else
  {
   alert("All Fields are Required");
  }
 }
 else
 {
 	alert("Leave period count does not match the dates mentioned and it could be maximum of THIRTY Days Only !!");
 }
} 
  else
  {
   alert("Leave period must not be zero !!");
  }
}
else
  {
   alert("Incorrect Room Number !!");
  }  


  });

}); 

</script>  

</html>