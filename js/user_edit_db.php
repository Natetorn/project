<meta charset="UTF-8">
<?php
// เชื่อม database: 
include('condb.php');  //ไฟล์เชื่อม database

//สร้างตัวแปรแก้ไขจากฟอร์ม
  $user_id = $_REQUEST["user_id"];
  $username = $_REQUEST["username"];
  $email = $_REQUEST["email"];
  $address = $_REQUEST["address"];
//ปรับปรุงข้อมูลdatabase 
  
  $sql = "UPDATE user SET  
      user_id='$user_id' , 
      username='$username' , 
      email='$email',
      address='$address' 
      WHERE user_id='$user_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 


  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'member.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>