<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$vdo_id = $_REQUEST["vdo_id"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM videos WHERE vdo_id='$vdo_id' ";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM video " or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Ingredients</title>

        <link rel="stylesheet" href="showvideo.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
    
    </head>

 

    <body>
      <!--   <div class="navbar-top"> 
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
            
        </div> -->

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




        



        </div>




          
          <div class="allpage">
            <div class="head-sh">How to
                <?php echo $row['vdo_name'];?>
            </div><br>

            

            <div class="vdo">
                <iframe src=<?php echo $row['link'];?>
               
                frameborder="0" 
                allowfullscreen>
                </iframe>

                <div class="cr"  style="cursor:pointer" name="" 
                onclick="location.href ='http:'">Video Credit : <?php echo $row['credit'];?></div>



                <p><button class="sgout" style="cursor:pointer"
                       onclick="location.href ='show_product_recieps.php'">Back</button></p>
            </div>


            

            

                <div class="step">
                <?php echo $row['vdo_detail'];?>
                </div>

                

            </div>

            

            


            
                 

                



  

            
            




























     
    </body>






</html>

