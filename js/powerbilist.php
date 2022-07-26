<!DOCTYPE html>
<html>
<head>
<?php include('h.php');?>
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
        <title>Shop Taste dee</title>

        <link rel="stylesheet" href="powerbi.css">
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




        <div class="sidenav">
             
            <button class="home" style="cursor:pointer"  
                onclick="location.href ='homepage.php'">Home</button><br>

            <button class="shipping" style="cursor:pointer"
                onclick="location.href ='admin.php'">Shipping</button><br>
            
            <button class="membr" style="cursor:pointer"
                onclick="location.href ='member.php'">Membership</button><br>

            
            <button class="my-prod" style="cursor:pointer"
                onclick="location.href ='product.php'">My Products</button><br>
            
            <button class="res4ler" style="cursor:pointer"
                onclick="location.href ='product_video.php'">My Recipes</button><br>

            <button class="salein4" style="cursor:pointer"
                onclick="location.href ='powerbilist.php'">Sales Info</button><br>


            <button class="sgout" style="cursor:pointer"
                onclick="location.href ='logout.php'">Sign out</button>
            
            
            
            


        </div>

        

        



        </div>




          
        <div class="allpage">
            <div class="head-ship" > 
                <div class="ship-box"> 
                     
                     
                   
                </div>
                
                
                   
           
            </div>

            <div class="manag-mem">

            <?php include('list.php');
            ?>
            
 

<div class="lst-all-bnt">

<button class="lst1" style="cursor:pointer" data-hover="ยอดขายทั้งหมด / ปี"
onclick="location.href ='powerbi.php'">All Sales / Year</button>

<button class="lst2" style="cursor:pointer" data-hover="ยอดขายทั้งหมด / เดือน"
onclick="location.href ='powerbi4.php'">All Sales / Month</button>

<button class="lst3" style="cursor:pointer" data-hover="จำนวนสินค้าที่ขายหมด / ปี"
onclick="location.href ='powerbi5.php'">Number of products sold / Year</button>

<button class="lst4" style="cursor:pointer" data-hover="จำนวนสินค้าที่ขายหมด / เดือน"
onclick="location.href ='powerbi2.php'">Number of products sold / Month</button>



<button class="lst5" style="cursor:pointer" data-hover="ยอดขายสินค้าทั้งหมดในวันปัจจุบัน"
onclick="location.href ='powerbi3.php'">The recent sales of products</button>
</div>
            
            
    
   











        </div> 
    </body> 
</html>













































 

