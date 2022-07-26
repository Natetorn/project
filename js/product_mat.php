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
      <?php include('navbar.php');?>
      <p></p>
         <div class="row">
              <div class="col-md-3">
             <?php include('menu_left.php');?>
         </div>
      <div class="col-md-9">
        <a href="product_mat.php?act=add" class="btn-info btn-sm">เพิ่ม</a>
       <p></p>

      <div class="col-md-10">
      
       
        <?php
          $act = $_GET['act'];
         if($act == 'add'){ 
           include('productmat_add.php');
         }elseif ($act == 'edit') {
          include('productmat_edit.php');
         }else{
          include('productmat_list.php');
    }
    ?>
    
      </div>
      
  </div>
  </body>

</html>