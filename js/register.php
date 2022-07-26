<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php 

    session_start();

    require_once "condb.php";

    if (isset($_POST['submit'])) {
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $user_tel =$_POST['user_tel'];
       


        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {
            echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Username นี้มีอยู่แล้ว !! ",  
                            text: "กรุณาสมัครใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
        } else {
            $passwordenc = ($password);

            $user_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($con, $user_check);
            $user = mysqli_fetch_assoc($result);
            
            if ($user['email'] === $email) {
                echo '<script>
                setTimeout(function() {
                 swal({
                     title: "Email นี้มีอยู่แล้ว !! ",  
                     text: "กรุณาสมัครใหม่อีกครั้ง",
                     type: "warning"
                 }, function() {
                     window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
                 });
               }, 1000);
         </script>';
            } else {
            $query = "INSERT INTO user (username, email, password, address, user_tel,userlevel,user_picture)
                        VALUE ('$username',  '$email','$passwordenc', '$address', '$user_tel','Member','firstpj.jpg')";
            $result = mysqli_query($con, $query);

         
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
           
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["userlevel"] = $row["userlevel"];

            // print_r($_SESSION);
            // exit;


            if($_SESSION["userlevel"] !='Member'){
                Header("Location: homepage.php");
            }else if
                ($_SESSION["userlevel"] !='Admin')
                Header("Location: show_product.php");
        }

    }
 
    }}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Sign up</title>

        <link rel="stylesheet" href="register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
       
        


    
    </head>
    <body>
            <div class="grid-container">
                <div class="pichid">
                    <img src="https://sv1.picz.in.th/images/2021/12/08/6oUxNk.jpg" alt="6oUxNk.jpg" border="0" />
                </div> 
                <section class="first">
                    <div class="first-logo" >
                        <h3> Create Account
                        </h3>
                     </div>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="sign-up">

        <label for="username"></label>
        <input type="text" name="username" 
        placeholder="Your Username" class="name" required >
       

        <label for="user_tel"></label>
        <input  type="tel"  maxlength="10" name="user_tel" 
        placeholder="Your Phone Number" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="tel"required>
      
        

        <label for="address"></label>
        <input type="address" name="address" 
        placeholder="Your Address " class="ad"required>
        


        <label for="email"></label>
        <input type="email" name="email" 
        placeholder="Your Email" class="em"required>
       
        
        <label for="password"></label>
        <input type="password" name="password" id="password" 
        placeholder="Your Password" class="pass"required>
            <p class="show">
                <input class="show-p" type="checkbox" onclick="myFunction()">
                Show Password
            </p> 
        
        
        
         
 


        <input type="submit" value="Sign up" name="submit"style="cursor:pointer"class="btn-sgup" onclick="myFunction()"></input>
        <script>
function myFunction() {
  alert("สมัครสมาชิกสำเร็จ");
}
</script><br>
        <input type="button" value="Back" style="cursor:pointer"
            onclick="location.href ='index.php'" class="btn-sgin">
       
         
   
      </div>
  </div>
  
  <div class="picfirst">
                <img src="https://sv1.picz.in.th/images/2021/12/08/6oUBbq.jpg" alt="6oUBbq.jpg" border="0" />
                    </div> <span>

  <script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
           
<style>
 
</style>
</body>
</html>
                     