<?php

include '../../core_session.php';
include '../../connect_db.php';
include '../../validate_input.php';
/*session_start();
$hod_username=$_SESSION["hod_username"];
$hod_department = $_SESSION["hod_department"];*/
if(loggedin())
   {
      $x = $_SESSION["student_id"];
   $q2= "SELECT username FROM student_detail WHERE id ='$x'";
   if($q2_run= mysqli_query($conn,$q2))
     {    $row2 = mysqli_fetch_row($q2_run);
        $n = $row2[0];
        
     }
    else{die("Error description: " . mysqli_error($conn));}  
   }
    // die($n); 
   
$columns = array('leave_id','student_name','room_number','roll_number', 'student_number', 'course_branch', 'semester', 'hostel_name', 'leave_period', 'day_from', 'day_to', 'reason', 'visiting_person_name', 'relation', 'address_contact_number', 'applicant_mobile_number', 'residence_address_number','student_signature', 'nowdate', 'status');
//$query = "SELECT * FROM hod_".$hod_department."_".$hod_username."";

$query = "SELECT * FROM leave_detail";

//WHERE roll_number = '$n'   THIS PART SHOWS ONLY SPECIFIC ROWS TO THE STUDENTS
//'".test_input($n)."'
//WHERE roll_number='".$n."'
if(isset($_POST["search"]["value"]))
{
 $query = $query.'
 WHERE (leave_id LIKE "%'.test_input($_POST["search"]["value"]).'%" 
 OR student_name LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR room_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR roll_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR student_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR course_branch LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR semester LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR hostel_name LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR leave_period LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR day_from LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR day_to LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR reason LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR visiting_person_name LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR relation LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR address_contact_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR applicant_mobile_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR residence_address_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR student_signature LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR nowdate LIKE "%'.test_input($_POST["search"]["value"]).'%"
 )';
}
//OR warden_remark LIKE "%'.test_input($_POST["search"]["value"]).'%"
// $query = $query.
$query = $query." AND roll_number='$n'";
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY leave_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

if($c=mysqli_query($conn, $query))
{$number_filter_row = mysqli_num_rows($c);}
else{die("Error description: " . mysqli_error($conn));}

//$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));
	

$result = mysqli_query($conn, $query . $query1);

$data = array();
$i=1;
while($row = mysqli_fetch_array($result))
{

  //$status_query = "SELECT status FROM leave_detail WHERE leave_id = '".$row["leave_id"]."'";

  //if(mysqli_query($conn,$status_query))
//{
 $sub_array = array();
 $sub_array[] = '<div id="'.$row["leave_id"].'" data-column="leave_id">' . $i . '</div>';
 $sub_array[] = '<div id="'.$row["leave_id"].'" data-column="student_name">' . $row["student_name"] . '</div>';
 
 $sub_array[] = '<div id="'.$row["leave_id"].'" data-column="room_number">' . $row["room_number"] . '</div>';
 $sub_array[] = '<div id="'.$row["leave_id"].'" data-column="roll_number">' . $row["roll_number"] . '</div>';
 $sub_array[] = '<div id="'.$row["leave_id"].'" data-column="student_number">' . $row["student_number"] . '</div>';

$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="course_branch">' . $row["course_branch"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="semester">' . $row["semester"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="hostel_name">' . $row["hostel_name"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="leave_period">' . $row["leave_period"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="day_from">' . $row["day_from"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="day_to">' . $row["day_to"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="reason">' . $row["reason"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="visiting_person_name">' . $row["visiting_person_name"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="relation">' . $row["relation"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="address_contact_number">' . $row["address_contact_number"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="applicant_mobile_number">' . $row["applicant_mobile_number"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="residence_address_number">' . $row["residence_address_number"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="student_signature">' . $row["student_signature"] . '</div>';
$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="nowdate">' . $row["nowdate"] . '</div>';
//$sub_array[] = '<div id="'.$row["leave_id"].'" data-column="warden_remark">' . $row["warden_remark"] . '</div>';



 
 /*if($row["hod_image_path"]!=""){
 $sub_array[] = '<div id="'.$row["hod_task_id"].'" data-column="hod_image_path"><a href = "'.$row["hod_image_path"].'" class="btn btn-success btn-xs" target="_blank">Click Here</a></div>';
 }
 else{
   $sub_array[] = '<div id="'.$row["hod_task_id"].'" data-column="hod_image_path">Not Available</div>';   data-toggle="modal" data-target="#myModal"
 }*/
     if($row["status"] == 1)
   {
    $sub_array[] = '<button type="button" name="edit" id="'.$row["leave_id"].'" class="btn btn-warning btn-sm edit" data-backdrop="static" disabled>Edit</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["leave_id"].'" class="btn btn-danger btn-sm delete" data-backdrop="static" disabled >Delete</button>';
    $sub_array[] = '<input type="button" name="send" class="btn btn-success btn-sm send" id="'.$row["leave_id"].'" data-backdrop="static" disabled value="Sent">';
   } 
   else{
    $sub_array[] = '<button type="button" name="edit" id="'.$row["leave_id"].'" class="btn btn-warning btn-sm edit" data-backdrop="static">Edit</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["leave_id"].'" class="btn btn-danger btn-sm delete" data-backdrop="static">Delete</button>';
    $sub_array[] = '<input type="button" name="send" class="btn btn-info btn-sm send" id="'.$row["leave_id"].'" data-backdrop="static" value="Send">';
   } 
 
 $data[] = $sub_array;
 $i=$i+1;
 //}
 //else{ die(mysqli_error($conn));}

}



function get_all_data($conn)
{
/*$hod_username=$_SESSION["hod_username"];   // REMEMBER session variable declared again
$hod_department = $_SESSION["hod_department"]; //outside variable do not work inside the functions*/
 $query = "SELECT * FROM leave_detail";
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);
echo json_encode($output);
 mysqli_close($conn);



?>
