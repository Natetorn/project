<?php
include('condb.php');
$query ="
SELECT prd_name,price,prd_picture
FROM product ORDER BY prd_id DESC";
$result = mysqli_query($con,$query)
?>
<!DOCTYPE html>
<html>
<head>
<?php include('h.php');?>

     
<?php
// ปิดการแสดง error
error_reporting(0);
?>
</head>
  <body>
   <div class="container">
     <div class="row">
       <div class="col-xs-12 col-md-12">
         <h3> Product <h3>
<div>
<?php while($row = mysqli_fetch_array($result)) {?>

         <div class="col-xs-12 col-md-3" style="margin-bottom:20px;">
           <img src="prd_picture/<?php echo $row["prd_picture"];?>" width="100%">
           <p align="center"><?php echo $row["prd_name"];?></p>
           <p align="center">
             <a href="#" class="btn btn-primary">READ MORE</a>
</div>
<?php }?>
</div>



</body>
</head>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
        
    </head>
<body>
  <div align="center">
  <img src="https://sv1.picz.in.th/images/2021/11/02/u264uW.png" alt="u264uW.png" width="420" style="padding: 8%;" >
  <img src="https://sv1.picz.in.th/images/2021/11/02/u26Uhu.png" alt="u26Uhu.png"  align="left" style="width:830px;height: 750px;">
</body>
<body>
  <div>
      <div class="row">
          <div class="jumbotron col-sm-6 bg-light m-auto pt-3 pb-4 text-white bg-dark">
              <h2 class="text-center"></h2>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter your username" required>
        <br>
        
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
        
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" placeholder="Enter your Address" required>
        <br>
      
        
 <br><br>

        <button type="submit" name="submit"  class="btn btn-success">Sign Up</button><br><br>
        <a href="loginad.php"><button type="button" class="btn btn-danger">Sign In</button></a>
         
   
      </div>
  </div>
</body>
</html>
                     