<meta charset="UTF-8">
<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	//รับค่าไฟล์จากฟอร์ม
$vdo_name = $_POST['vdo_name'];
$link= $_POST['link'];
$vdo_detail =$_POST['vdo_detail'];
$credit =$_POST['credit'];
$p_img =(isset($_POST['prd_picture']) ? $_POST['prd_picture'] :'');

//img
	$upload=$_FILES['prd_picture'];
	if($upload <> '') {

	//โฟลเดอร์ที่เก็บไฟล์
	$path="prd_picture/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['prd_picture']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname ='prd_picture'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="prd_picture/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['prd_picture']['tmp_name'],$path_copy);
	}
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		$sql = "INSERT INTO videos
		(
		vdo_name,
		link,
		vdo_detail,
		credit,
		prd_picture
		
		)
		VALUES
		(
		'$vdo_name',
		'$link',
		'$vdo_detail',
		'$credit',
		'$newname')";
		
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('Add Succesfuly');";
echo "window.location = 'product_video.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'product_video.php'; ";
echo "</script>";
}
?>