<?php
// ปิดการแสดง error
error_reporting(0);
?>

<?php

include('condb.php');
$query ="
SELECT *
FROM order_detail ";

$query2 ="
SELECT *
FROM products ";
$result = mysqli_query($con,$query)
?>
<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php include("h.php");?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Shop Taste dee</title>

        <link rel="stylesheet" href="show_product.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
    
    </head>

 

    <body>
        <div class="navbar-top"> 
            <div class="logo">Taste Dee</div>
            
            <div class="search-box">
                <input class="bx-sch" type="text" name="search" placeholder="Search Thai Dessert">
            </div>

            <div class="category-dropdown">
                <button class="cate-dd">Category</button>
                <div class="dd-content">
                    <a href="#">Egg</a>
                    <a href="#">Coconut milk</a>
                    <a href="#">Sticky rice</a>
                    <a href="#">Boiled</a>
                    <a href="#">Steamed</a>
                </div>  
            </div>

            <div class="cart">
                <input class="add-cart" type="button" name="cart" 
                style="cursor:pointer" onclick="location.href ='cart2.php'" >   
            </div>
            
        </div>

        <div class="grid-container">

<?php while($row = mysqli_fetch_array($result)) {?>
    
    <div class="grid-item">
        <img src="prd_picture/<?php echo $row["prd_picture"];?>"
        alt="mango" width="250px" height="250px">

        <h6><?php echo $row["total"];?> 
            <?php echo $row["prd_id"];?>
            <?php echo $row["user_id"];?>
    </h6>
    <?php }?>


        



        </div>




        



                

                
            
            
            </div>
        
        
        
        
        
        </div>

            

            


            
                 

                



  

            
            




























     
    </body>






</html>

