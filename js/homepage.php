<?php session_start()?>
<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?
session_start();
if(!session(username)) { // if นี้ใช้ตรวจสอบถ้าไม่ได้ login ให้ไปหน้า login
header ("location:loginad.php");
} else { // else คือถ้า login แล้วให้แสดง
echo $name; // นี้คือแสดงชื่อของผู้ login

}
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>For Seller Taste Dee</title>

        <link rel="stylesheet" href="homepage.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
    
    </head>

 

    <body>
        <div class="navbar-top"> 
            <div class="logo">
              <img class="lg-4sler" src="https://sv1.picz.in.th/images/2022/02/24/rx3X2I.png">
            </div>
            
             


 
        </div>
        <div class="allpage">

            <!-- <div class="search-box">
                <button class="bx-sch" type="text" name="search" placeholder="Hi!, Welcome to Your admin homepage">
            </div> -->
 


            <div class="grid-cont-homep">
              <div class="grid-item-homep"  onclick="location.href ='admin.php'">
                <img src="https://sv1.picz.in.th/images/2022/03/04/rDknzZ.jpg" alt="" width="140px" height="140px">
                Shipping

              </div>

              <div class="grid-item-homep" onclick="location.href ='member.php'">
                <img src="https://sv1.picz.in.th/images/2022/03/04/rD08TJ.jpg" alt="" width="140px" height="140px">
              Membership
              </div>

              <div class="grid-item-homep" onclick="location.href ='product.php'">
                <img src="https://sv1.picz.in.th/images/2022/03/04/rDYafS.jpg" alt="" width="140px" height="140px">
              My Products
              </div>

              <div class="grid-item-homep" onclick="location.href ='product_video.php'">
                <img src="https://sv1.picz.in.th/images/2022/03/04/rD4Xrg.jpg" alt="" width="140px" height="140px">
              My Recipes
              </div>

              <div class="grid-item-homep" onclick="location.href ='powerbilist.php'">
                <img src="https://sv1.picz.in.th/images/2022/03/04/rDNafZ.jpg" alt="" width="140px" height="140px">
              Sales Data
              </div>

              <div class="grid-item-homep" onclick="location.href ='logout.php'">
                <img src="https://sv1.picz.in.th/images/2022/03/04/rDfObD.png" alt="" width="140px" height="140px">
                Sign Out
              </div>
              


            </div>

            <div class="frm-dv">
              <img src="https://sv1.picz.in.th/images/2022/03/14/rX3Hp0.png" alt="" width="250px"   >
              <h1>Taste Dee for Seller</h1>
              <p>The bestselling of your thai dessert</p>

 

 


            </div>




 




        </div>


      </div> 
 

    </body> 
</html>






 