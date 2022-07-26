<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php 

    session_start();

    if (isset($_POST['username'])) {

        include('condb.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

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
    
        
          



        }else{
          echo "<script>";
              echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
              echo "window.history.back()";
          echo "</script>";

        }

}else{


        echo "<script>";
              echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
              echo "window.history.back()";
          echo "</script>";

}
?>