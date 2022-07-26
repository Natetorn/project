<?php 

    session_start();

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>For Seller</title>

        <link rel="stylesheet" href="4 seller.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        


    
    </head>





    <body>
            <div class="grid-container">
               

                <section class="first">
                    <div class="first-logo" >
                        <h3> Taste Dee<br>
                             For Seller

                        </h3>
</div>
                         

               </section>

               <div class="picfirst">
                    <img src="https://sv1.picz.in.th/images/2021/12/08/6oCYkv.jpg" alt="6oCYkv.jpg" border="0" />
                </div> 

                <div class="pichid">
                    <img src="https://sv1.picz.in.th/images/2021/12/08/6oUxNk.jpg" alt="6oUxNk.jpg" border="0" />
                </div> 
    
</body>






<?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>


    <form action="login.php" method="post">

                <div class="em-dv">
                  <label for="username"></label>
                  <input type="text" name="username" id="username" 
                  class="em" placeholder="Email" rquired >
                </div> 

                

                <div class="pass-dv">
                  <label for="password"></label>
                  <input type="password" name="password" id="password" 
                  class="pass" placeholder="Password" required> <br><br>
                    <p class="show">
                        <input class="show-p" type="checkbox" onclick="myFunction()">
                         Show Password
                    </p>  
                    
                
                </div>
            
            
                <div class="btn-sign-all">

                <input type="submit" value="Sign in" style="cursor:pointer"
            class="btn-sgin"onclick="myFunction1()">
            <script>
            function myFunction1() {
                 alert("เข้าสู่ระบบ");
                }
            </script><br>

                <input class="btn-sgup" type="button" value="back" style="cursor:pointer" 
                    onclick="location.href ='index.php'"  >
                </div>
            
    </form>    
                           

                

                
            
            

    
    



            </div>


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
           
                   
                         
 

             <!--   -->
                
</body>







    
</html>

    
 
 

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>