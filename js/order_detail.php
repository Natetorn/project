<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php session_start();
include('hder.php');
include("condb.php");
//echo '<pre>';
//print_r($_SESSION['user_id']);

//echo $user_id;

$user_id = $_SESSION['user_id'];
$order_date = Date("Y-m-d G:i:s");

$sql ="SELECT *  FROM user WHERE user_id=user_id";
$result = mysqli_query($con,$sql) or die ("Error : $sql").
mysqli_error();
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
		<title>Your Orders</title>

		<link rel="stylesheet" href="delivery_user.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
	</head>

	<script>
            function increment() {
            document.getElementById('demoInput').stepUp();
        }
        function decrement() {
            document.getElementById('demoInput').stepDown();
        }

    </script>




	<body>

 
        <div class="navbar-top"> 
            <div class="logo">Taste Dee</div>
            
            <form class="sch-f" name="search" method="GET" action="show_product.php">
            <div class="search-box">
                <input value=""  class="bx-sch" type="text" name="search" placeholder="Search Thai Dessert">
            </div>    
            <button  class="bnt-sch">search</button>
            
            </form>

           


 			<button type="button" class="btn-deli" style="cursor:pointer"
                onclick="location.href ='delivery_user.php'">Your Orders</button>
 



            <div class="cart">
                <input class="add-cart" type="button" name="cart" 
                style="cursor:pointer" onclick="location.href ='cart2.php'" >   
            </div>
            
        </div>


        <div class="sidenav">
            <div class="profile"><br>
            <img src="user_picture/<?php echo $row["user_picture"];?>" 
                class="pic-pro">

                <h3 class="name-pro"><?php echo $row ['username'];?></h3>

                <button type="button" class="btn-pro" style="cursor:pointer"
                onclick="location.href ='userpage.php?act=edit'">Edit Profile</button>
            </div>
            <button class="shop" style="cursor:pointer"
                onclick="location.href ='show_product.php'">Shop</button><br>
            
            <button class="Shop-set-ing" style="cursor:pointer"
                onclick="location.href ='show_productmat.php'">Set ingredients</button><br> 
            
            <button class="recipes" style="cursor:pointer"
                onclick="location.href ='show_product_recieps.php'">Recipes</button><br>

            <button class="sgout" style="cursor:pointer"
                       onclick="location.href ='logout.php'">Sign out</button>
            
        </div>


        </div>

          
          <div class="allpage">
            <div class="head-cart"> 
				<img src="https://sv1.picz.in.th/images/2022/03/05/rDGJNN.png" alt=""  
					width="30px" height="30px"  onclick="window.location='delivery_user.php ' ;">
         
		 	<h1>Your Orders</h1>
				 
								
            </div>


			<form class="form-cart" id="frmcart" name="frmcart" method="post" action="?act=update">
			

					<table class="tb-cart"   >
					 
					 



<?php

//echo $_GET['order_id'];
$get_id =  $_GET['order_id'];
$sql2 = "select order_date,order_head.order_id,order_detail.order_id,order_detail.prd_id,order_detail.user_id,total,deliverys.order_id,deliverys.user_id,products.prd_id,prd_name,order_detail.p_qty from order_detail
inner join deliverys on (order_detail.order_id = deliverys.order_id)
inner join order_head on (order_detail.order_id = order_head.order_id)
inner join products  on (order_detail.prd_id = products.prd_id) 
where  order_detail.user_id=$user_id and order_detail.order_id =$get_id";
$result = mysqli_query($con, $sql2) or die ("Error : $sql2").
mysqli_error();;
$user_id = $_SESSION['user_id']; 
//4 . แสดงข้อมูลที่ query datatable
echo "<link rel='stylesheet' type='text/css' href='delivery_user.css'>";
echo " <table class='tb-ship' >"; 
  //หัวข้อตาราง 
  echo "  
  <tr class='shptr'>
  <tr class='shptr'>
  <td class='tdshp1'>Orders ID</td>
  <td class='tdshp2'>Product</td>
  <td class='tdshp2'>Order Date</td>
  <td class='tdshp2'>QTY</td>
  <td class='tdshp5'>Price</td>

  
  
  

</tr>";   





while($row = mysqli_fetch_array($result)) {
    $totalP = $totalP+$row["total"];
    $totalqty = $totalqty+$row["p_qty"];
echo "<tr class='shiptr'>";
echo "<td class='shiptd3'>" .$row["order_id"] .  "</td> ";
echo "<td class='shiptd2'>" .$row["prd_name"] .  "</td> ";
echo "<td class='shiptd3'>" .$row["order_date"] .  "</td> ";
echo "<td class='shiptd3'>" .$row["p_qty"] .  "</td> ";
echo "<td class='shiptd3'>" .$row["total"] .  "</td> ";





}
echo "<tr>
<td class='shiptd3'>Total</td>";
echo "<td class='shiptd2'></td> ";
echo "<td class='shiptd3'></td> ";
echo "<td class='shiptd3'>$totalqty</td> ";
echo "<td class='shiptd3'>$totalP</td> ";
echo "</tr>";
?> 

								




									
							 
							 
								
						 

					
					</table>




				</form>


				



		</div>

 


	</body>
</html>
























