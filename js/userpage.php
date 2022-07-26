<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php 
session_start();

//print_r($_SESSION);

include('condb.php');
include('hder.php');

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

?>



<!DOCTYPE html>
<html>
    <head>

   
        
                    <h3 class="name-pro"><?php echo $username;?></h3>
                  

                    <?php 
                  
                    $act = (isset($_GET['act'])? $_GET['act'] : '');
                    if($act=='edit'){
                        include('user_form_edit.php');
                    }

                    ?>
    
                    

     
    </body>






</html>

