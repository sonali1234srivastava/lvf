<?php

include '../../core_session.php';
include '../../header.php';
include '../../connect_db.php';

// if(!loggedin())
//  {
//       header('Location: ../index.php');
//  }    
?>
<html>
<head>
  <style>
  
    body {
       height : 100vh;
       margin:0;
      padding:0;
      background-image: url("../../additional/well_bg.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
}

   input[name="student_signature"] { font-size: 16px;  font-family: cursive; }


 </style>
</head>
<body>


 <!--<?php 

 /*if(!loggedin())
 {
      header('Location: student_login_form.php');

  }*/    

      //GIVE THE LEAVE FORM HERE..... 
 
   /*echo 'You\'r successfully logged in.<br><br>';

   $uf = getfield('firstname');
   $us = getfield('surname');
   echo  'Welcome <i><b>'.$uf.' '.$us.'</b></i> !! <br>';
   echo  'Email : <img src="generate.php"><br>';
   echo  'We have a lot new for you to explore!!!';

    echo '<br><br><br>';

   echo '<a href="logout.php"><input type="submit" value="LOG OUT"></a>';*/
?>-->



<script>
  
$(function(){
  
$.validator.addMethod( "lettersonly", function( value, element ) {
  return this.optional( element ) || /^[a-z ]+$/i.test( value );
    }, "Letters only please !" );
  
  $.validator.addMethod( "course", function( value, element ) {
  return this.optional( element ) || /^[a-z- ]+$/i.test( value );
    }, "Letters only please !" );
 /* $.validator.addMethod( "invalid_characters", function( value, element ) {
  return this.optional( element ) || /^[^&<>'"]+$/i.test( value );
    }, "Single quotes Double quotes & < > Not Allowed !" );
    

  $.validator.addMethod( "email_2", function( value, element ) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)$/i.test( value );
    }, "Not a valid Email" );*/

  $.validator.addMethod( "numbersonly", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==10;
    }, "Valid number only please !" );

  $.validator.addMethod( "number", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value );
    }, "Valid room number only please !" );

  $.validator.addMethod( "leave", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value );
    }, "Valid days count only please !" );
  
 /* $.validator.addMethod( "date", function( value, element ) {
  return this.optional( element ) || /^[0-9/: ]+$/i.test( value );
    }, "Valid date only please !" );
  /*$.validator.addMethod( "password", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9$_@# ]+$/i.test( value ) && value.length>=7;
    }, "Letters Numbers $ _ @ # only please and should atleast consist of seven characters." );

  $.validator.addMethod( "year", function( value, element ) {
  return this.optional( element ) || /^[1-4]+$/i.test( value );
    }, "Numbers only please !" );*/

  $.validator.addMethod( "student_number", function( value, element ) {
  return this.optional( element ) || /^[0-9a-z]+$/i.test( value ) && value.length==7;
    }, "Valid student number only please !" );

  $.validator.addMethod( "address", function( value, element ) {
  return this.optional( element ) || /^[a-z0-9, ]+$/i.test( value );
    }, "Valid address only please !" );

  $.validator.addMethod( "semester", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value );
    }, "Valid semester only please !" );

  $.validator.addMethod( "hostel_name", function( value, element ) {
  return this.optional( element ) || /^[1-3]+$/i.test( value );
    }, "Valid hostel number only please !" );

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
                       number: true
                },
               roll_number:{
                       required: true,
                       numbersonly: true
               },
               /*email: {
                required: true,
                email: true,
                email_2:true
              },*/
              student_number:{
                       required: true,
                       student_number: true
              },
              course:{
                       required: true,
                       course: true
               },
              semester:{
                       required: true,
                       semester: true
               },
              /*year:{
                       required: true,
                       year: true
               },
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
               },*/
               hostel_name:{
                       required: true,
                       hostel_name: true
               },
               leave_period:{
                      required: true,
                      leave: true
               },
               days_from:{
                       required: true,
                       //date: true
               },
               days_to:{
                       required: true,
                      // date: true
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
                       //date: true
               }, 
               
      }

  }); 

});

</script>

  


   <div class = container style="width: 100%; height: 25%;">
     <div style=" float:left; display:inline; width:23%; height:100%; margin: 15px 0 0 0;">
       <img src="../../logocsi.png" width="68%" height="100%" class="image">
     </div>
     <div style=" float:left; display:inline; width:77%; height:100%; " >
       <h2 style="margin: 50px 0 15px 0;"><i>AJAY KUMAR GARG ENGINEERING COLLEGE, GHAZIABAD </i></h2>
       <cente ><h2 style="margin: 0 0 20px 150px;"><i>HOSTEL LEAVE APPLICATION FORM</i></h2></center>
     </div> 
   </div>
   </br></br></br></br>

    
<div class = "container">

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
<div class="form-group"><div class="col-sm-2"><input type="text" name="course" id="course" class="form-control"></div></div>
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
<label class="control-label col-sm-2">8. Applicant's Mobile No.(if any) :</label>
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
<div class="form-group"><div class="col-sm-4"><input type="text" name="date" id="date" class="form-control" placeholder="YYYY/MM/DD" ><!--<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>--></div></div>
</div></br>
<!--<div class="form-group col-xs-12 col-md-8">
<input type="text" name="father_name" id="father_name" class="form-control" placeholder = "FATHER_NAME"></div></br>
<div class="form-group col-xs-12 col-md-8">
<input type="text" name="father_number" id="father_number" class="form-control" placeholder = "FATHER_NUMBER"></div></br>-->

<!-- CAPCHA TO APPEAR HERE-->
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
                    format:'Y/m/d',
                    onShow:function( ct ){
                     this.setOptions({
                      maxDate:$('#days_to').val()?$('#days_to').val():false
                     })
                    },
                    timepicker:false
                 });
                $('#days_to').datetimepicker({
                  format:'Y/m/d',
                  onShow:function( ct ){
                   this.setOptions({
                    minDate:$('#days_from').val()?$('#days_from').val():false
                                   })
                  },
                  timepicker:false
                });

 $(document).ready(function(){
   
      /*var date_input=$('input[name="date"]'); //our date input has the name "date"
      //var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);*/

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

  });

}); 

</script>  

</html>



<!--<?
 }/*else{
       echo 'Please Log In<br>';
        window.location.href: "student_login_form";  //this line is not working well ab
        //include 'loginform.php';
 }*/

 ?>
</html>-->
