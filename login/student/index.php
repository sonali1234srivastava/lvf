
<?php
include '../../core_session.php';
include "../../connect_db.php";
include "../../header.php";

if(!loggedin())
{  
  header('Location: ../index.php');
}

?>
<html>
<head>
   <style>
    /*.container{
       width:94.5%;
     
    }*/
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
</head>
<body>

<b><i><h1 class="text-center">Leave List</h1></i></b></br></br>
   <div id="alert_message"></div>
   <div class = "row">
      <div class="col-sm-offset-1" class="col-sm-4"><a href="leave_form.php"><button type="button" name="add" class="btn btn-info btn-md">+ ADD LEAVE</button></a><a href="" class="btn btn-warning btn-md" id = "change_password_button" data-toggle="modal" data-target="#student_change_password_modal">CHANGE PASSWORD</a><span class="col-sm-offset-7" class="col-sm-2"><a href="logout.php"><button type="button" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-log-out"></span>  LOG OUT</button></a></span></div>
   </div></br></br>
              <div class = "container">
                <br> 
                <div class="well well-lg">
                  <div class="table-responsive">
                     <table class="table table-hover table-bordered" id = "leave_list_data">
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
							                <th>EDIT</th>
                              <th>DELETE</th>
                              <th>SEND</th>
                              
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
 </br></br>  

     <!--modal to add leave-->
    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog lvf">

    <!-- Modal content  modal-lg  -->
    <div class="modal-content">
      <form method="post" id="leave_form_id" enctype="multipart/form-data">
      <div class="modal-header">
        <button type="button" class="btn btn-danger btn-lg close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <!--<center><h3 class="modal-title">Edit Leave</h3></center>-->
        <h4 class="modal-title"></h4>
      </div></br>
      <div class="modal-body">
        
       <!-- <form   id="leave_form_id" action="" method="POST">-->
<div class = "row">
<label class="control-label col-sm-2">1. Name of Student :</label>
<div class="form-group"><div class="col-sm-5"><input type="text" name="name" id="name" class="form-control" required></div></div>
<label class="control-label col-sm-2"> Room No :</label>
<div class="form-group"><div class="col-sm-3"><input type="text" name="room_number" id="room_number" class="form-control" required></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2 ">2. Roll No :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="roll_number" id="roll_number" class="form-control" required></div></div>
<label class="control-label col-sm-2">Student No :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="student_number" id="student_number" class="form-control" required></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">3. Course/Branch :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="course" id="course" class="form-control" required></div></div>
<label class="control-label col-sm-2">Semester :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="semester" id="semester" class="form-control" required></div></div>
<label class="control-label col-sm-2">Hostel Name :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="hostel_name" id="hostel_name" class="form-control" required></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">4. Period of Leave :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="leave_period" id="leave_period" class="form-control" required></div></div>
<label class="control-label col-sm-2">Days From :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="days_from" id="days_from" class="form-control pick" placeholder="DD-MM-YYYY" required></div></div>
<label class="control-label col-sm-2">Days To :</label>
<div class="form-group"><div class="col-sm-2"><input type="text" name="days_to" id="days_to" class="form-control pick" placeholder="DD-MM-YYYY" required></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">5. Reason :</label>
<div class="form-group"><div class="col-sm-6"><textarea rows="2" cols="70" name="reason" id="reason" form="leave_form_id" required></textarea></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">6. Name of the person you are visiting :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="visiting_person" id="visiting_person" class="form-control" required></div></div>
<label class="control-label col-sm-2">Relation :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="relation" id="relation" class="form-control" required></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">7. Address and Contact No (of person you are visiting) :</label>
<div class="form-group"><div class="col-sm-6"><textarea rows="4" cols="70" name="visiting_person_address" id="visiting_person_address" form="leave_form_id" required></textarea></div></div>
</div></br>
<!--<input type="text" name="visiting_person_address" id="visiting_person_address" class="form-control" style="row: 3; col:10; " ></div></div></br>-->
<div class = "row">
<label class="control-label col-sm-2">8. Applicant's Mobile No.(if any) :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="applicant_number" id="applicant_number" class="form-control" required></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">9. Residence Address & Phone No. :</label>
<div class="form-group"><div class="col-sm-6"><textarea rows="4" cols="70" name="residence_address" id="residence_address" form="leave_form_id" required></textarea></div></div>
</div></br>
<!--<input type="text" name="residence_address" id="residence_address" class="form-control" style = "row: 3; col:10;" ></div></br>-->
<div class = "row">
<label class="control-label col-sm-2">10. Student's Signature :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="student_signature" id="student_signature" class="form-control" required></div></div>
</div></br>
<div class = "row">
<label class="control-label col-sm-2">11. Date :</label>
<div class="form-group"><div class="col-sm-4"><input type="text" name="date" id="date" class="form-control pick" placeholder="DD-MM-YYYY" required><!--<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>--></div></div>
</div></br>
<!--<div class="form-group col-xs-12 col-md-8">
<input type="text" name="father_name" id="father_name" class="form-control" placeholder = "FATHER_NAME"></div></br>
<div class="form-group col-xs-12 col-md-8">
<input type="text" name="father_number" id="father_number" class="form-control" placeholder = "FATHER_NUMBER"></div></br>-->

<!-- CAPCHA TO APPEAR HERE   data-dismiss="modal"-->

</div>



      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-sm save" id = "save" >SAVE CHANGES</button>
      </div>
  </form>
  </div>
  </div>
</div>
<!--add leave modal closes here-->

<!-- Modal for Change Password-->
      <div class="modal fade" id="student_change_password_modal" role="dialog">
         <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
               <form method="post" id="student_change_password_form" enctype="multipart/form-data">
                  <div class="modal-header">
                     <button type="button" class="close modal_close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                     <div class= "row">
                        <div class="form-group col-sm-12">
                           <label>Enter Old Password</label>
                           <input type="password" name="student_old_change_password" id="student_old_change_password" class="form-control" />
                        </div>
                        <div class="form-group col-sm-12">
                           <label>Enter New Password</label>
                           <input type="password" name="student_new_change_password" id="student_new_change_password" class="form-control" />
                        </div>
            
            <div class="form-group col-sm-12">
                           <label>Confirm Password</label>
                           <input type="password" name="student_confirm_change_password" id="student_confirm_change_password" class="form-control" />
                          
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

 </body>
 </html>   
 
 <script>
 $(document).on('click', '.pick', function(){ 
 $("#date").datetimepicker();
 $("#days_from").datetimepicker();
 $("#days_to").datetimepicker();
 });
</script>

<script src = "fetch_leave_detail.js"></script>

<!--<?php
//X echo '<a href="logout.php"><input type="submit" value="CLOSE"></a>';

//echo '<a href="logout.php"><center><button type="button" class="btn btn-danger btn-sm">LOG OUT</button></center></a>';
?> -->             