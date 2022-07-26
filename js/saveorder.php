<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php
	session_start();

	include('hder.php');
	
	   //echo '<pre>';
   //print_r($_SESSION['cart']);
   //echo '</pre>'; 

     include("condb.php");
	//echo '<pre>';
	//print_r($_SESSION['user_id']);
	//echo $user_id;

	$user_id = $_SESSION['user_id'];
	$order_date = Date("Y-m-d G:i:s");
	
	$sql ="SELECT *  FROM user WHERE user_id=user_id";
	$result = mysqli_query($con,$sql) or die ("Error : $sql").
	mysqli_error();

	$sql1	= "INSERT INTO order_head VALUES
	(
	null,
	'$user_id',
	'$order_date'

	)";
	$query1	= mysqli_query($con, $sql1); // or die("Error : $sql1". mysqli_error($condb));
?>

<?php
	
	$sql12 = "
	SELECT max(order_id) as order_id 
	FROM order_head 
	WHERE user_id='$user_id'
	";
	$query12	= mysqli_query($con, $sql12); // or die("Error : $sql2". mysqli_error($condb));
	$row = mysqli_fetch_array($query12);
	$order_id = $row["order_id"];


	$sql10	= "INSERT INTO deliverys VALUES
	(
	null,
	'$delivery_status กำลังจัดส่ง',
	'$order_id',
	'$user_id'

	)";
	$query10	= mysqli_query($con, $sql10); // or die("Error : $sql1". mysqli_error($condb));

?>


<?php

	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "
	SELECT max(order_id) as order_id 
	FROM order_head 
	WHERE user_id='$user_id'
	";
	$query2	= mysqli_query($con, $sql2); // or die("Error : $sql2". mysqli_error($condb));
	$row = mysqli_fetch_array($query2);
	$order_id = $row["order_id"];
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array

//ตัด stock
foreach($_SESSION['cart'] as $prd_id=>$qty)
{
	$sql3	= "select * from products where prd_id=$prd_id";
	$query3	= mysqli_query($con, $sql3);
	$row3	= mysqli_fetch_array($query3);
	$total	= $row3['price']*$qty;
	$count=mysqli_num_rows($query3);
	//เอาลง db
	
		
		$sql4	= "INSERT INTO order_detail VALUES
		(null, '$order_id', '$prd_id', '$qty', '$total','$user_id')";
		$query4	= mysqli_query($con, $sql4); // or die("Error : $sql4". mysqli_error($condb));

				  //ตัดสต๊อก
				  for($i=0; $i<$count; $i++){
					$have =  $row3['p_qty'];
					
					$stc = $have - $qty;
					
					$sql9 = "UPDATE products SET  
					   p_qty=$stc
					   WHERE  prd_id=$prd_id ";
					$query9 = mysqli_query($con, $sql9);  
					}
			
				if($query1 && $query4){
					mysqli_query($con, "COMMIT");
					
					foreach($_SESSION['cart'] as $prd_id)
					{	
						//unset($_SESSION['cart'][$p_id]);
						unset($_SESSION['cart']);
					}
				}
				else{
					mysqli_query($con, "ROLLBACK");  
					
				}
			}
			?>
	<script type="text/javascript">
	window.location ='well_done.php';
</script> 
			
 
			
			
			
			
			</body>
			</html>

