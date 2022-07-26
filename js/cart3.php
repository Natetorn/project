<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php
	session_start();
	
	$prd_id = $_GET['prd_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($prd_id))
	{
		if(isset($_SESSION['cart'][$prd_id]))
		{
			$_SESSION['cart'][$prd_id]++;
		}
		else
		{
			$_SESSION['cart'][$prd_id]=1;
		}
	}

	if($act=='remove' && !empty($prd_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$prd_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $prd_id=>$amount)
		{
			$_SESSION['cart'][$prd_id]=$amount;
		}
	}
?>


<title>Shopping Cart</title>
</head>

<body>
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("condb.php");
	foreach($_SESSION['cart'] as $prd_id=>$qty)
	{
		$sql = "select * from products where prd_id=$prd_id";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["prd_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$prd_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?prd_id=$prd_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
<td><a href="guest.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
</body>
</html>