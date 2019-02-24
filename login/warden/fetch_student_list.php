<?php
ob_start();
session_start();
include '../../connect_db.php';
include '../../validate_input.php';
/*session_start();
$hod_username=$_SESSION["hod_username"];
$hod_department = $_SESSION["hod_department"];*/
if(isset($_SESSION["warden_id"])&& !empty($_SESSION["warden_id"]))
   {
      $x = $_SESSION["warden_id"];
   $q2= "SELECT hostel_name FROM warden_detail WHERE id ='$x'";
   if($q2_run= mysqli_query($conn,$q2))
     {    $row2 = mysqli_fetch_row($q2_run);
        $n = $row2[0];
     }
    else{die("Error description: " . mysqli_error($conn));}  
   }
   //die($n);
     $v = 1 ;
$columns = array('id','name','number','email','course','branch','year','username', 'hostel_name','room_number','home_address', 'father_name','father_number','verify');

//$query = "SELECT * FROM hod_".$hod_department."_".$hod_username."";     OR verify LIKE "%'.test_input($_POST["search"]["value"]).'%"
$query = "SELECT * FROM student_detail";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE (id LIKE "%'.test_input($_POST["search"]["value"]).'%" 
 OR name LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR email LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR course LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR branch LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR year LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR username LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR hostel_name LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR room_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR home_address LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR father_name LIKE "%'.test_input($_POST["search"]["value"]).'%"
 OR father_number LIKE "%'.test_input($_POST["search"]["value"]).'%"
 '
 ;
}
    //die($n);  `$n`
$query = $query.") AND (hostel_name ='$n' AND is_email_confirmed = '$v')";



if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();
$i=1;
while($row = mysqli_fetch_array($result))
{

 $sub_array = array();
 $sub_array[] = '<div id="'.$row["id"].'" data-column="id">' . $i . '</div>';
 $sub_array[] = '<div id="'.$row["id"].'" data-column="name">' . $row["name"] . '</div>';
 
 $sub_array[] = '<div id="'.$row["id"].'" data-column="number">' . $row["number"] . '</div>';
 $sub_array[] = '<div id="'.$row["id"].'" data-column="email">' . $row["email"] . '</div>';
 $sub_array[] = '<div id="'.$row["id"].'" data-column="course">' . $row["course"] . '</div>';

$sub_array[] = '<div id="'.$row["id"].'" data-column="branch">' . $row["branch"] . '</div>';

$sub_array[] = '<div id="'.$row["id"].'" data-column="year">' . $row["year"] . '</div>';
$sub_array[] = '<div id="'.$row["id"].'" data-column="username">' . $row["username"] . '</div>';

$sub_array[] = '<div id="'.$row["id"].'" data-column="hostel_name">' . $row["hostel_name"] . '</div>';
$sub_array[] = '<div id="'.$row["id"].'" data-column="room_number">' . $row["room_number"] . '</div>';
$sub_array[] = '<div id="'.$row["id"].'" data-column="home_address">' . $row["home_address"] . '</div>';
$sub_array[] = '<div id="'.$row["id"].'" data-column="father_name">' . $row["father_name"] . '</div>';
$sub_array[] = '<div id="'.$row["id"].'" data-column="father_number">' . $row["father_number"] . '</div>';
//$sub_array[] = '<div id="'.$row["id"].'" data-column="verify">' . $row["verify"] . '</div>';




 
 /*if($row["hod_image_path"]!=""){
 $sub_array[] = '<div id="'.$row["hod_task_id"].'" data-column="hod_image_path"><a href = "'.$row["hod_image_path"].'" class="btn btn-success btn-xs" target="_blank">Click Here</a></div>';
 }
 else{
   $sub_array[] = '<div id="'.$row["hod_task_id"].'" data-column="hod_image_path">Not Available</div>';
 }*/

  if($row["verify"] == 1)
   {
    $sub_array[] = '<input type="button" name="approve" id="'.$row["id"].'" class="btn btn-success btn-sm approve" data-backdrop="static" value="Approved" disabled >';
    $sub_array[] = '<input type="button" name="update" class="btn btn-info btn-sm update" id="'.$row["id"].'" data-backdrop="static" value="Update">';
    $sub_array[] = '<input type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete" data-backdrop="static" value="Delete">';
   } 
   else{
    $sub_array[] = '<input type="button" name="approve" id="'.$row["id"].'" class="btn btn-warning btn-sm approve" data-backdrop="static" value="Approve">';
    $sub_array[] = '<input type="button" name="update" class="btn btn-info btn-sm update" id="'.$row["id"].'" data-backdrop="static"  value="Update">';
    $sub_array[] = '<input type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete" data-backdrop="static" value="Delete">';
   } 

 
  /*$sub_array[] = '<button type="button" name="approve" id="'.$row["student_id"].'" class="btn btn-primary btn-xs approve">Approve</button>';
  $sub_array[] = '<button type="button" name="update" id="'.$row["student_id"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["student_id"].'">Delete</button>';*/
 
 $data[] = $sub_array;
 $i=$i+1;
}



function get_all_data($conn)
{
/*$hod_username=$_SESSION["hod_username"];   // REMEMBER session variable declared again
$hod_department = $_SESSION["hod_department"]; //outside variable do not work inside the functions*/
 $query = "SELECT * FROM student_detail";
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
