<meta charset="UTF-8">
<?php
// เชื่อม database: 
include('condb.php');  //ไฟล์เชื่อม database

//สร้างตัวแปรแก้ไขจากฟอร์ม
  $delivery_id = $_REQUEST["delivery_id"];
  $delivery_status = $_REQUEST["delivery_status"];
  $order_id = $_REQUEST["order_id"];

//ปรับปรุงข้อมูลdatabase 
  
  $sql = "UPDATE deliverys SET  
      delivery_id='$delivery_id' , 
      delivery_status='$delivery_status' , 
      order_id='$order_id' 
      WHERE delivery_id='$delivery_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 


  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'admin.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>