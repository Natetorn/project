<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php 
session_start();

//print_r($_SESSION);

include('hder.php');

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

?>

<?php
include('condb.php');
$txt = '';
 if (isset($_GET['search'])){
    $txt = $_GET['search'];
 }
$query ="
SELECT *
FROM videos where vdo_name LIKE '%$txt%' ORDER BY vdo_id";
$result = mysqli_query($con,$query)
?>
<?php
// ปิดการแสดง error
error_reporting(0);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Recipes</title>

        <link rel="stylesheet" href="show_product_recipes.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
    
    </head>

 

    <body>
        <div class="navbar-top"> 
            <div class="logo">Taste Dee</div>
            
            <form class="sch-f" name="search" method="GET" action="show_product_recieps.php">
            <div class="search-box">
                <input value=""  class="bx-sch" type="text" name="search" placeholder="Search Thai Dessert">
            </div>
            <button  class="bnt-sch">search</button>
            </form>
   
            <button type="button" class="btn-deli" style="cursor:pointer"
                onclick="location.href ='delivery_user.php'">Your Orders</button>

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




          
        <div class="allpage"> <!--เริ่มใส่ข้อมู,จากตรงนี้เท่านั้น ในเฟรมข้อมูล-->
            <div class="head-rec" >
                <h1>Recipes</h1>
           
            </div>
          
            <div class="grid-container">
            <?php while($row = mysqli_fetch_array($result)) {?>
                <div class="grid-item">
                <img src="prd_picture/<?php echo $row["prd_picture"];?>"
                    alt="mango" width="250px" height="250px">

                    <h6><?php echo $row["vdo_name"];?></h6>

                    <button class="btn-let" style="cursor:pointer"
                       onclick="location.href ='showvideo.php?vdo_id=<?php echo $row['vdo_id'];?>'">Let's go!</button>
           
                </div>
                <?php }?>
                  

            </div>












               
              </div>
        
        
        
        
        
        
        </div>

            

            


            
                 

                



  

            
            




























     
    </body>






</html>


