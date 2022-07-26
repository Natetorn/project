<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php 
session_start();
include("hder.php")

//print_r($_SESSION);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scal=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
		<title>Confirm Order</title>

		<link rel="stylesheet" href="confirm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
	</head>

 



	<body>

 
        <div class="navbar-top"> 
            <div class="logo">Taste Dee</div>
            <form class="sch-f" name="search" method="GET" action="show_product.php">
            <div class="search-box">
                <input value=""  class="bx-sch" type="text" name="search" placeholder="Search Thai Dessert">
            </div>    
            <button  class="bnt-sch">search</button>
            
            </form>

           <!--  <div class="category-dropdown">
                <button class="cate-dd">Category</button>
                <div class="dd-content">
                    <a href="#">Egg</a>
                    <a href="#">Coconut milk</a>
                    <a href="#">Sticky rice</a>
                    <a href="#">Boiled</a>
                    <a href="#">Steamed</a>
                </div>  
            </div> -->

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
            <div class="head-c-or">
              <h1>Confirm Order</h1>
              <!--<a href="show_product.php" class="btn btn-primary">   </a>-->
            </div>



        <form class="form-horizontal" method="post" action="saveorder.php">

        <div class="all-dress">

            <div class="or-by"> 
              <p>Delivery Address
                
              <!--<button class="ed-dress" style="cursor:pointer"
              onclick="location.href ='userpage.php?act=edit'">Edit
              </button></p> -->
              
            </div>
            <div class="tll-p"> 
            <input type="่hidden"  name="user_id" 
              class="add-us-a" required placeholder="user_id"/ value="<?php echo $user_id;?>" readonly></input>
            </div>
            <div class="tll-p"> 
            <input type="tel"  name="user_tel" 
              class="add-us-a" required placeholder="user_tel"/ value="<?php echo $user_tel;?>" readonly></input>
            </div>

            <div class="us-l"> 
            <input type="text"  name="username" 
              class="add-us-a" required placeholder="username"/ value="<?php echo $username;?>"readonly></input>
            </div>

            <div class="add-us">
              <input type="text"  name="address" 
              class="add-us-a" required placeholder="address"/ value="<?php echo $address;?>"readonly></input>
            </div>

            

            <div class="em-us">  
            <input type="text"  name="email" 
              class="add-us-a" required placeholder="email"/ value="<?php echo $email;?>"readonly></input>
    
            </div>

             
            
             

        </div>

        <table class=" table-striped">
            
        
            <tr class="tr-hide">
              <td bgcolor="#EAEAEA" width="5%" class="hidden-xs" align="center">#</td>
              <td bgcolor="#EAEAEA" width="5%" class="hidden-xs">img</td>
              <td bgcolor="#EAEAEA" width="50%">ขื่อสินค้า</td>
              <td align="center" bgcolor="#EAEAEA" width="10%">ราคา</td>
              <td align="center" bgcolor="#EAEAEA" width="10%">จำนวน</td>
              <td align="center" bgcolor="#EAEAEA" width="10%">รวม(บาท)</td>
            </tr>


            <?php
            $total=0;
            if(!empty($_SESSION['cart']))
            {
            include("condb.php");
            foreach($_SESSION['cart'] as $prd_id=>$qty)
            {
            $sql = "SELECT * FROM products WHERE prd_id=$prd_id";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($query);
            $sum = $row['price'] * $qty; //
            $total += $sum;



            echo "<tr>";
              echo "<td class='hidden-xs' align='center'>" . @$i += 1 . "</td>";
            
              echo "<td >" 
              . "<img src='prd_picture/".$row['prd_picture']."'   class='visible-xs'>"
              . "<td  class='ns-td'>" .$row["prd_name"] ."</td>"; 
              

 
              
              echo "<td class='amo-td' >"."X" ;
              
                echo "<input type='number' name='amount[$prd_id]' value='$qty' 
                class='form-control' readonly /></td>";

                echo "<td class='num-td' >".number_format($sum,2)
                ." THB"  ;
                
              echo "</tr>";
              
              }
               

              
              
              }
              ?>
            
              
            </table>

            <div class="tal-all">
              <p class="pp">Order<?php echo "<b class='num'> " .number_format($total,2)   ."</b>"; ?></p>
                
              <p class="pptt">Total Payment<?php echo "<b class='num-ttp'> " .number_format($total,2)   ."</b>"; ?></p>
              
                
            </div>

           

            




            

            <div class="btn-can-by">

                 
                <button type="button" class="btn-can"  onclick="location.href ='cart2.php'" > Cancel</button>

                <input  name="user_id" type="hidden" id="user_id"/>
                <button type="button" class="btn-sub" id="btn"  onclick="location.href ='payment.php'" >
                Confirm</button>
            </div>

            
   
   
   
 
   
  
 

 






        </form>

        <?php include 'footer.php';?>


     </div>   








































   
        
        
        
        
      

            

            


            
                 

                



  

            
            




























     
    </body>






</html>
