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
		<title>Payment</title>

	<link rel="stylesheet" href="payment.css">
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

            <!-- <div class="category-dropdown">
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
              
              <!--<a href="show_product.php" class="btn btn-primary">   </a>-->
            </div>

            <div class="grid-container">


  <div class="grid-item"> 

  <img src="https://sv1.picz.in.th/images/2022/03/13/rV8bAu.png"
    alt="mango" width=" 260px " height="260px">

    <h6>Comfirm</h6>
    <p>When you paid you can be canceled or modified.</p>

    <form class="f-pay" name="checkoutForm" method="POST" action="checkout.php">
    
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
 'ราคารวม '.$total;

                " THB"  ;
            }}
?>
  <script type="text/javascript" src="https://cdn.omise.co/omise.js" 
     
    data-key="pkey_test_5r0vtf6wetczo3yh65e"
    data-image="http://bit.ly/customer_image"
    data-frame-label="Thai Dessert of Taste Dee"
    data-button-label = "Payment Now" 
    className = "omise-checkout-button"
    data-submit-label="Pay"
    data-location="no"
    data-amount="<?php echo $total;?>00"
    data-currency="thb"
    >
  </script>
   
  <!-- <input type="hidden" name="omiseToken">
  <input type="hidden" name="omisesource"> -->
  <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
  <input type="hidden" name="total" value="<?php echo $total;?>">
</form>


<!-- data-key="YOUR_PUBLIC_KEY" -->
</body>
</html>
    <!--<BUTton class="payment"  onclick="location.href ='well_done.php'">Payment Now</BUTton><br>!-->
    <BUTton class="pay-can" name="action" onclick="location.href ='cart2.php'" 
    type="submit" value="Cancel">Cancel</BUTton>

</div>
   
</div>

    
      





    

    


</div>

 

     </div>   








































   
        
        
        
        
      

            

            


            
                 

                



  

            
            




























     
    </body>






</html>
