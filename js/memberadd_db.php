<?php
// ปิดการแสดง error
error_reporting(0);
?>
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
$username = $_POST['username'];
$password= $_POST['password'];
$email = $_POST['email'];
$user_tel = $_POST['user_tel'];
$address= $_POST['address'];
$userlevel= $_POST['userlevel'];
$user_picture =(isset($_POST['user_picture']) ? $_POST['user_picture'] :'');
//img
	$upload=$_FILES['user_picture'];
	if($upload <> '') {

	//โฟลเดอร์ที่เก็บไฟล์
	$path="user_picture/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['user_picture']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname ='user_picture'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="user_picture/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['user_picture']['tmp_name'],$path_copy);
	}

	$query = "SELECT username from user where username = '$username'";
	$result = mysqli_query($con,$query) or die ("Error in sql : $query").mysqli_error($query);
	$query1 = "SELECT email from user where email = '$email'";
	$result1 = mysqli_query($con,$query1) or die ("Error in sql : $query1").mysqli_error($query1);
	if(mysqli_num_rows($result)>0){
		//echo 'usernameนี้ มีคนใช้แล้ว';
		echo "<script type='text/javascript'>";
echo "alert('username นี้ มีคนใช้แล้ว');history.back();</script>"; exit();
	}else if (mysqli_num_rows($result1)>0){
		echo "<script type='text/javascript'>";
echo "alert('email นี้ มีคนใช้แล้ว');history.back();</script>"; exit();
	}else{
		$sql = "INSERT INTO user
		(
		username,
		password,
		email,
		user_picture,
		user_tel,
		userlevel,
        address
		)
		VALUES
		(
		'$username',
		'$password',
		'$email',
		'$newname',
		'$user_tel',
		'Member',
        '$address')";
		
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('Add Succesfuly');";
echo "window.location = 'member.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'member.php'; ";
echo "</script>";
}
	};
	

	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		
?>