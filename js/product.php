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

        <link rel="stylesheet" href="product.css">
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

            <div class="manag-my-pro">

            

        

        
       
       
            <?php
          $act = $_GET['act'];
         if($act == 'add'){ 
           include('product_add.php');
         }elseif ($act == 'edit') {
          include('product_edit.php');
         }else{
          include('product_list.php');
    }
    ?>













        </div> 
    </body> 
</html>





 