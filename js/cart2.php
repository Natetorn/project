
<?php
// ปิดการแสดง error
error_reporting(0);
?>

<?php
	session_start();

	include('hder.php');

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

?>

<?php
include('condb.php');

$query ="
SELECT *
FROM products ORDER BY prd_id";
$result = mysqli_query($con,$query)
?>

<?php
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






<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
		<title>Shopping Cart</title>

		<link rel="stylesheet" href="shopping cart.css">
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

            <!-- <div class="category-dropdown">
                <button class="cate-dd">Category</button>
                <div class="dd-content">
                    <a href="#">Egg</a>
                    <a href="#">Coconut milk</a>
                    <a href="#">Sticky rice</a>
                    <a href="#">Boiled</a>
                    <a href="#">Steamed</a>
                </div>  
            </div>

			
 -->



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
					width="30px" height="30px"  onclick="window.location='show_product.php' ;">
         
		 	<h1>Shopping Cart</h1>
				 
								
            </div>


			<form class="form-cart" id="frmcart" name="frmcart" method="post" action="?act=update">
			

					<table class="tb-cart"   >
					 
							<!-- <td colspan="5" bgcolor="#CCCCCC">
							<b>ตะกร้าสินค้า</span> -->
						 
					 

					<!--	<tr>
							<td align="center" width="150px" bgcolor="#EAEAEA">Order</td>
							<td align="center" width="150px" bgcolor="#EAEAEA">Price</td>
							<td align="center" width="150px" bgcolor="#EAEAEA">Amount</td>
							<td align="center" width="150px" bgcolor="#EAEAEA">Total(THB)</td>
							<td align="center" width="150px" bgcolor="#EAEAEA">Delete</td>
						</tr>
					-->

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
										$p_qty = $row["p_qty"];



								echo "<tr class='ord-tr'>";

								echo "<td class='hidden-xs' >" . @$i += 1 . "</td>";
								
								echo "<td class='pic-td' >"
								. "<img src='prd_picture/".$row['prd_picture']."'   
								class='pic-m-td'   >";
										
								echo "<td class='ns-td'>"
								. $row['prd_name'];

								echo "<td class='prc-td'>"
								.number_format($row["price"],2)
								." THB"  ;

								echo "<td class='amo-td' >";
								echo "<input type='number' name='amount[$prd_id]' value='$qty' 
								class='form-control' min='1' max='$p_qty' /></td>";

								echo "<td class='num-td'>".number_format($sum,2)
								." THB"  ;
								
									//remove product
									echo "<td class='del-td'>
										<a href='cart2.php?prd_id=$prd_id&act=remove' 
										class='del-a btn-xs'>Delete</a>
									</td>";
								echo "</tr>";
								
							}
				 

						}
								?>
								
								<div class="nav-bt">
									<?php
									echo "<tr class=\"nav-tt\">"; 
							 
									echo "<td class=\"tt-bar\" colspan='3' ><b>Total</b></td>";
									echo "<td class=\"tt-all\"  >"."<b>".number_format($total,2)
									." THB"  
									."</b>"."</td>";
									
									echo "</tr> ";
									?>

								<div class="btn-bottom">
								<?php if(!empty($_SESSION['cart'])) { ?>

									<input class="btn-sub" type="submit" name="button" 
									id="button"  value="Update Order" />
									
									<?php } ?>
									<!-- if($act =='update') -->
									<?php if($act =='update'){ ?>
									<input class="btn-b-all" type="button" name="Submit2" 
									value="Buy All" onclick="window.location='confirm.php' ;" />
									<?php }else{?>
										<input class="btn-b-all1" type="button" name="Submit2" 
									value="Buy All" />
									<?php
					
									} ?> 
									
									
								</div>


								</div>
						
								
							 
								
						 

					
					</table>




				</form>


				



		</div>


		<!-- <div class="navbar-bottom"> 
				 
			/*			
	 
				echo "<tr>";  
				echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
				echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
				echo "<td align='left' bgcolor='#CEE7FF'></td>";
				echo "</tr> ";

			 

			<
			<input type="submit" name="button" id="button" value="ปรับปรุง" />
			<input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
			

		</div> -->


	</body>
</html>