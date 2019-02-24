<?php
ob_start();
session_start();
include "../../connect_db.php";
include "../../header.php";

if(!isset($_SESSION["warden_id"]) || empty($_SESSION["warden_id"]))
{  
  header('Location: ../index.php');
}

?>
<html>
<head>
   <style>
    .container{
       width:94.5%;
     
    }
    .lvf{
      width:90%;
     
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

  <script>
  
$(function(){
  
$.validator.addMethod( "lettersonly", function( value, element ) {
  return this.optional( element ) || /^[a-z ]+$/i.test( value );
    }, "Letters only please !" );

$.validator.addMethod( "numbersonly", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==10;
    }, "Valid mobile number only please !" );

$.validator.addMethod( "course", function( value, element ) {
  return this.optional( element ) || /^[a-z-/ ]+$/i.test( value );
    }, "Letters only please !" );
  
 /* $.validator.addMethod( "invalid_characters", function( value, element ) {
  return this.optional( element ) || /^[^&<>'"]+$/i.test( value );
    }, "Single quotes Double quotes & < > Not Allowed !" );
    */

  $.validator.addMethod( "email_2", function( value, element ) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)$/i.test( value );
    }, "Not a valid Email" );

  $.validator.addMethod( "year", function( value, element ) {
  return this.optional( element ) || /^[1-4]+$/i.test( value ) && value.length==1;
    }, "Valid year number only please !" );

  $.validator.addMethod( "room_number", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==3 ;
    }, "Valid room number only please !" );
  
  $.validator.addMethod( "username", function( value, element ) {
  return this.optional( element ) || /^[0-9]+$/i.test( value ) && value.length==10;
    }, "Valid University Roll Number only please !" );

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


  $("#student_form_id").validate({

      rules:{
               name:{
                       required: true,
                       lettersonly: true
               },
               number:{
                       required: true,
                       numbersonly: true
               },
               email: {
                required: true,
                email: true,
                email_2:true
              },
              course:{
                       required: true,
                       course: true
               },
               branch:{
                       required: true,
                       course: true
               },
              year:{
                       required: true,
                       year: true
               },
               username:{
                       required: true,
                       username: true
               },
               
               hostel_name:{
                       required: true,
                       
               },
               room_number:{
                       required: true,
                       room_number: true
               },
               home_address:{
                       required: true,
                       address: true
               },
               father_name:{
                       required: true,
                       lettersonly: true
               }, 
               father_number:{
                       required: true,
                       numbersonly: true
               }

      }

  }); 

});

</script>


</head>
<body>

<b><i><h1 class="text-center">WELCOME</h1></i></b></br></br>
<!--<div id="alert_message"></div>-->
   <div class = "row">
      <div class="col-sm-offset-2" class="col-sm-4"><a href="" class="btn btn-primary btn-md" id = "change_password_button" data-toggle="modal" data-target="#warden_change_password_modal">CHANGE PASSWORD</a><span class="col-sm-offset-7" class="col-sm-2"><a href="logout.php"><button type="button" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-log-out"></span>  LOG OUT</button></a></span></div>
   </div></br></br>
              <div class = "container">
                <br> 
                <div class="well well-lg">
                <ul class="nav nav-tabs">
               <li class="active"><a data-toggle="tab" href="#student" id="student_tab">Students</a></li>
               <li><a data-toggle="tab" href="#leave" id = "leave_tab">Leaves</a></li>
            </ul>
            <div class="tab-content">
               <!--STUDENT TAB-->
               <div id="student" class="tab-pane fade in active">
                  
                <!--<div id="alert_hod_message"></div>-->
                  <h3>Student List</h3>
                  <div id="alert_message"></div></br>
                  <div class="table-responsive">
                     <table class="table table-hover table-bordered" id = "warden_student_list_data">
                        <thead>
                           <tr>
                              <th>Sl.No.</th>
                              <th>Student Name</th>
                              <th>Phone No</th>
                              <th>Email</th>
                              <th>Course</th>
                              <th>Branch</th>
                              <th>Year</th>
                              <th>University Roll Number</th>
                              <th>Hostel Name</th>
                              <th>Room Number</th>
                              <th>Home Address</th>
                              <th>Father's Name</th>
                              <th>Father's Number</th>
                              <!--<th>verify</th>-->
                              <th>Approve</th>
                              <th>Update</th>
                              <th>Delete</th>
                              
                           </tr>
                        </thead>
                     </table>
                  </div>
                </div>
                <!--STUDENT TAB ENDS-->
               <!--LEAVE TAB-->
               <div id="leave" class="tab-pane fade">
                  
               <!--<div id="alert_faculty_message"></div>-->
                  <h3>Leave Requests</h3>
                  <div id="alert_message1"></div></br>
                  <div class="table-responsive">
                     <table class="table table-hover table-bordered" id = "warden_leave_list_data">
                        <thead>
                           <tr>
                              <th>Sl.No.</th>
                              <!--<th>Email</th>-->
                              <th>Student Name</th>
                              <th>Room Number</th>
                              <th>University Roll Number</th>
                              <th>Student Number</th>
                              <th>Course/Branch</th>
                              <th>Semester</th>
                              <th>Hostel Name</th>
                              <th>Period of Leave</th>
                              <th>Leave From Date</th>
                              <th>Leave Till Date</th>
                              <th>Reason</th>
                              <th>Visiting Person Name</th>
                              <th>Relation</th>
                              <th>Address and Contact<small>(of person you are visiting)</small></th>
                              <th>Applicant's Mobile Number</th>
                              <th>Residence Address and Phone Number</th>
                              <th>Student Signature</th>
                              <th>Request Date</th>
                              <!--<th>Remark by Warden</th>-->    
                              <th>GRANT</th>
                              <th>REFUSE</th>
                              
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
               <!--LEAVE TAB ENDS-->   
            </div>
         </div>
      </div>
 </br></br>  

    <!-- Modal for Change Password-->
      <div class="modal fade" id="warden_change_password_modal" role="dialog">
         <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
               <form method="post" id="warden_change_password_form" enctype="multipart/form-data">
                  <div class="modal-header">
                     <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                     <div class= "row">
                        <div class="form-group col-sm-12">
                           <label>Enter Old Password</label>
                           <input type="password" name="warden_old_change_password" id="warden_old_change_password" class="form-control" />
                        </div>
                        <div class="form-group col-sm-12">
                           <label>Enter New Password</label>
                           <input type="password" name="warden_new_change_password" id="warden_new_change_password" class="form-control" />
                        </div>
            
                         <div class="form-group col-sm-12">
                           <label>Confirm Password</label>
                           <input type="password" name="warden_confirm_change_password" id="warden_confirm_change_password" class="form-control" />
                          
                        </div>
                     </div>
                                 
                  </div>
                  <div class="modal-footer">
                     <input type="hidden" name="change_password_id" id="change_password_id" />
                     <input type="hidden" name="change_password_operation" id="change_password_operation" />
                     <input type="submit" name="change_password_action" id="change_password_action" class="btn btn-success" value="Save" />
                     <button type="button" class="btn btn-default modal_close" data-dismiss="modal">Close</button>
                  </div>
            <!--<div id = "alert_message"></div>-->
            </form>
      </div>
            
         </div>
      </div>
      <!--Change Password Modal Ends-->

      <!-- Modal for confirm delete-->
      <div id="deleteModal" class="modal fade">
         <div class="modal-dialog">
            <form method="post" id="delete_form" enctype="multipart/form-data">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close notdelbtn" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title" id="modal_title">Are you sure you want to delete ?</h4>
                  </div>
                  <div class="modal-body">
             
                     <input type="submit" name="confirm" id="confirm" class="btn btn-danger" value="Yes" />
                     <button type="button" class="btn btn-default notdelbtn" data-dismiss="modal">No</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!--Modal End-->

     <!--modal for editing-->
    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog lvf">

    <!-- Modal content  modal-lg  -->
    <div class="modal-content">
<form method="post" id="student_form_id" class="form-horizontal" enctype="multipart/form-data">

      <div class="modal-header">
        <button type="button" class="btn btn-danger btn-lg close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <!--<center><h3 class="modal-title">Edit Leave</h3></center>-->
        <h4 class="modal-title"></h4>
      </div></br>
      <div class="modal-body">

   <div class = "row">
<label class="control-label col-sm-2" for="name">NAME :</label>
<div class="form-group">
<div class="col-sm-8">
<input type="text" name="name" id="name" class="form-control" placeholder = "NAME"></div>
</div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="number">NUMBER :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="number" id="number" class="form-control" placeholder = "NUMBER"></div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="email">EMAIL :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="email" id="email" class="form-control" placeholder = "EMAIL"></div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="course">COURSE :</label>
<div class="form-group">
  <div class="col-sm-8">
                 <select name="course" id="course" class="form-control">
                    <option value="B-Tech"><b>B-Tech</b></option>
                    <option value="M-Tech"><b>M-Tech</b></option>
                    <option value="BCA"><b>BCA</b></option>  
                    <option value="MCA"><b>MCA</b></option>
                    <option value="MBA"><b>MBA</b></option>                
                 </select>
</div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="branch">BRANCH :</label>
  <div class="form-group">
     <div class="col-sm-8">
         <select name="branch" id="branch" class="form-control">
                        <option value="none"><b>None</b></option>
                        <option value="CSE"><b>CSE</b></option>
                        <option value="IT"><b>IT</b></option>
                        <option value="ECE"><b>ECE</b></option>
                        <option value="EN/EI"><b>EN/EI</b></option>
                        <option value="CE"><b>CE</b></option>
                        <option value="ME"><b>ME</b></option>
         </select>
    </div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="year">YEAR :</label>
<div class="form-group">
  <div class="col-sm-8">
            <select name="year" id="year" class="form-control">
                        <option value="1"><b>First</b></option>
                        <option value="2"><b>Second</b></option>
                        <option value="3"><b>Third</b></option>
                        <option value="4"><b>Fourth</b></option>
            </select>
  </div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="username">UNIVERSITY ROLL NUMBER :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="username" id="username" class="form-control" placeholder = "UNIVERSITY_ROLL_NUMBER"></div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="hostel_name">HOSTEL NAME :</label>
<div class="form-group">
   <div class="col-sm-8">
         <select name="hostel_name" id="hostel_name" class="form-control">
                        <option value="1"><b>GH1</b></option>
                        <option value="2"><b>GH2</b></option>
                        <option value="3"><b>GH3</b></option>
        </select>
</div></div>
</div></br>
<div class = "row">
   <label class="control-label col-sm-2" for="room_number">ROOM NUMBER :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="room_number" id="room_number" class="form-control" placeholder = "ROOM_NUMBER"></div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="home_address">HOME ADDRESS :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="home_address" id="home_address" class="form-control" placeholder = "HOME_ADDRESS"></div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="father_name">FATHER'S NAME :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="father_name" id="father_name" class="form-control" placeholder = "FATHER_NAME"></div></div>
</div></br>
<div class = "row">
  <label class="control-label col-sm-2" for="father_number">FATHER'S MOBILE NUMBER :</label>
<div class="form-group">
  <div class="col-sm-8">
<input type="text" name="father_number" id="father_number" class="form-control" placeholder = "FATHER_NUMBER"></div></div>
</div></br>

</div>    <!--modal body closes here-->

<div class="modal-footer">
    <input type="submit" class="btn btn-primary btn-sm save" id = "save" value="SAVE CHANGES">
</div>
</form>
</div>
</div>
</div>
<!--edit modal closes here-->

 </body>
 </html>                 


    <script src = "fetch_student_detail.js"></script>   
    <script src = "fetch_warden_leave_detail.js"></script>           

<!--<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="name" id="name" class="form-control" placeholder = "NAME"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="number" id="number" class="form-control" placeholder = "NUMBER"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="email" id="email" class="form-control" placeholder = "EMAIL"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="course" id="course" class="form-control" placeholder = "COURSE"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="branch" id="branch" class="form-control" placeholder = "BRANCH"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="year" id="year" class="form-control" placeholder = "YEAR"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="username" id="username" class="form-control" placeholder = "UNIVERSITY_ROLL_NUMBER"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="password" name="password" id="password" class="form-control" placeholder = "PASSWORD"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="password" name="password_again" id="password_again" class="form-control" placeholder = "PASSWORD_AGAIN"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="hostel_name" id="hostel_name" class="form-control" placeholder = "HOSTEL_NAME"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="room_number" id="room_number" class="form-control" placeholder = "ROOM_NUMBER"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="home_address" id="home_address" class="form-control" placeholder = "HOME_ADDRESS"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="father_name" id="father_name" class="form-control" placeholder = "FATHER_NAME"></div></div></br>
<div class = "row">
<div class="form-group col-xs-12 col-md-offset-2 col-md-8">
<input type="text" name="father_number" id="father_number" class="form-control" placeholder = "FATHER_NUMBER"></div></div></br>

 <div class = "row">
<div class="text-center">
<input type="submit" id="action" class = "btn btn-warning" value="SEND">
</div>
</div>
</br></br></br>
</div>-->

   