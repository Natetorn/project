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

	<link rel="stylesheet" href="well_done.css">
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

  <img class="m1" src="https://sv1.picz.in.th/images/2022/03/13/rVetB0.png"
    alt="mango" width=" 220px " height="220px">

    <h6>Order Successful</h6>
    <p>Thank you :) </p>

    <img class="m2" src="https://sv1.picz.in.th/images/2022/03/13/rVeEqN.png"
    alt="mango" width=" 60px " height="60px">
  
  

   
    
</div>
   
</div>

    
      





    

    


</div>

 

     </div>   








































   
        
        
        
        
      

            

            


            
                 

                



  

            
            




























     
    </body>






</html>
