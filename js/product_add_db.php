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
$prd_name = $_POST['prd_name'];
$prd_type= $_POST['prd_type'];
$prd_detail = $_POST['prd_detail'];
$price= $_POST['price'];
$p_qty=$_POST['p_qty'];
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
	
		$sql = "INSERT INTO products
		(
		prd_name,
		prd_type,
		prd_detail,
		prd_picture,
        price,
		p_qty
		)
		VALUES
		(
		'$prd_name',
		'$prd_type',
		'$prd_detail',
		'$newname',
        '$price',
		'$p_qty')";
		
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('Add Succesfuly');";
echo "window.location = 'product.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'product.php'; ";
echo "</script>";
}
?>