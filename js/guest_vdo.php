<?php
// ปิดการแสดง error
error_reporting(0);
?>
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
<?php
$query ="
SELECT *
FROM user Where user_id ='$user_id'";
$result = mysqli_query($con,$query)
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Ingredients</title>

        <link rel="stylesheet" href="ingredients.css">
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


        <div class="sidenav">
            <div class="profile">
                <img src="https://sv1.picz.in.th/images/2021/12/12/62HPA0.png" 
                class="pic-pro">

                <h3 class="name-pro">Guest</h3>

                <button type="button" class="btn-pro" style="cursor:pointer"
                onclick="location.href ='register.php'">Register</button>
            </div>
            <p><button class="shop" style="cursor:pointer"
                onclick="location.href ='guest.php'">Shop</button></p>
            
            <p><button class="Shop-set-ing" style="cursor:pointer"
                onclick="location.href ='guest_in.php'">Set ingredients</button></p> 
            
            <p><button class="recipes" style="cursor:pointer"
                onclick="location.href ='guest_re.php'">Recipes</button></p>

            <p><button class="sgout" style="cursor:pointer"
                       onclick="location.href ='logout.php'">Sign out</button></p>
            
            
        </div>



        



        </div>




          
          <div class="allpage">
            <div class="head-ingre">
                <h2>How to</h2>&nbsp;
                <h2><?php echo $row['vdo_name'];?></h2>
            </div><br>

            

            <div class="vdo">
                <iframe src=<?php echo $row['link'];?>
                width="400" height="300" 
                frameborder="0" 
                allowfullscreen>
                </iframe>

                <div class="cr"  style="cursor:pointer" name="" 
                onclick="location.href ='http:'">Video Credit : <?php echo $row['credit'];?></div>


            </div>


            

            

                <div class="step">
                <?php echo $row['vdo_detail'];?>
                </div>

                

            </div>

            

            


            
                 

                



  

            
            




























     
    </body>






</html>

