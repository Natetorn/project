<meta charset="UTF-8">
<?php
// database: 
include('condb.php');  //ชื่อมต่อกับ database 
//สร้างตัวแปรสำหรับรับค่า id จากไฟล์แสดงข้อมูล
$user_id = $_REQUEST["ID"];

//ลบข้อมูลออกจาก database ตาม _id ที่ส่งมา

$sql = "DELETE FROM user WHERE user_id='$user_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con));

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Delete Succesfuly');";
  echo "window.location = 'member.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>