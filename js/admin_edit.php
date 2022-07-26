<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$delivery_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM deliverys WHERE delivery_id='$delivery_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>

<?php include('h.php');?>
<link rel='stylesheet' type='text/css' href='admin_edit.css'> 

 

<div class="ed-sh-4sell">
  Edit Shipping
</div>
 

 

<form  name="admin" action="admin_edit_db.php" method="POST" id="admin" class="ff">
      <input type="hidden" name="delivery_id" value="<?php echo $delivery_id; ?>">

          <div class="adm-edit1">
            <div class="ad-ed1"  >
              <input  class="in-ed1" name="delivery_id" 
              required  id="delivery_id" type="text" 
              value="<?=$delivery_id;?>" placeholder="delivery" 
              pattern="^[a-zA-Z0-9]+$" minlength="2"readonly   />
            </div>
          </div>




          
          <div class="adm-edit2">
            <div class="ad-ed2"  >
              <input class="in-ed2" name="delivery_status" 
              type="text" required  id="delivery_status"  
              value="<?=$delivery_status;?>" placeholder="Status to Shipping" /> 


            </div>
          </div>




         






          <div class="adm-edit3">
            <div class="ad-ed3"  >
              <input class="in-ed3" name="order_id" 
              type="text" required 
               id="order_id" value="<?=$order_id;?>"
               placeholder="รหัสสินค้า"readonly  />
            </div>
          </div>



          
  
            
            <div class="btn-ed-ship"  >
              <a href="admin.php"><button type="button" class="sh-ed-bck">back</button></a>
              <button type="submit" class="sh-ed-up" id="btn"> 
              <span class="glyphicon glyphicon-saved"></span> Update  </button>  
                  
       
          </div>
        </form>
       
                
                <?php
              
                    include('h.php');
              //ข้อมูลแต่ละ order
                                              //  database:
                                              include('condb.php');  //เชื่อมต่อกับ database 
                                              // query 
                                              $get_id =  $_GET['order_id'];
                                              $sql2 = "select username,order_date,order_head.order_id,total,order_detail.order_id,order_detail.prd_id,order_detail.user_id,total,deliverys.order_id,deliverys.user_id,products.prd_id,prd_name,order_detail.p_qty from order_detail
                                              inner join deliverys on (order_detail.order_id = deliverys.order_id)
                                              inner join order_head on (order_detail.order_id = order_head.order_id)
                                              inner join products  on (order_detail.prd_id = products.prd_id) 
                                              inner join user on (order_detail.user_id = user.user_id)
                                              where order_detail.order_id =$get_id";
                                              
                                              
                                              
                                              //3.เก็บข้อมูลที่ query 
                                              $result = mysqli_query($con, $sql2);
                                              //4 . แสดงข้อมูลที่ query datatable
                                              echo "<link rel='stylesheet' type='text/css' href='admin_edit.css'>";
                                              echo " <table class='tb-ship' >";
                                                //หัวข้อตาราง 
                                                echo "  
                                                <tr class='shptr'>
                                                <tr class='shptr'>
                                                <td class='tdshp1'>Username</td>
                                                <td class='tdshp2'>Orders ID</td>
                                                <td class='tdshp2'>Product</td>
                                                <td class='tdshp2'>Order Date</td>
                                                <td class='tdshp2'>QTY</td>
                                                <td class='tdshp5'>Price</td>
                                              
                                                
                                                
                                                
                                              
                                              </tr>";   
                        
                       
              
                             
                                while($row = mysqli_fetch_array($result)) {
                                  $totalP = $totalP+$row["total"];
                                  $totalqty = $totalqty+$row["p_qty"];
                              echo "<tr class='shiptr'>";
                              echo "<td class='shiptd3'>" .$row["username"] .  "</td> ";
                              echo "<td class='shiptd3'>" .$row["order_id"] .  "</td> ";
                              echo "<td class='shiptd2'>" .$row["prd_name"] .  "</td> ";
                              echo "<td class='shiptd3'>" .$row["order_date"] .  "</td> ";
                              echo "<td class='shiptd3'>" .$row["p_qty"] .  "</td> ";
                              echo "<td class='shiptd3'>" .$row["total"] .  "</td> ";
                                 
                                 
                                }
                                echo "<tr class='shiptr'>
                              <td class='shiptd3'>Total</td>";
                              echo "<td class='shiptd2'></td> ";
                              echo "<td class='shiptd3'></td> ";
                              echo "<td class='shiptd3'></td> ";
                              echo "<td class='shiptd3'>$totalqty</td> ";
                              echo "<td class='shiptd3'>$totalP</td> ";
                              echo "</tr>";
                              
                              echo "</table>";
                              
                           
                              //5. close connection
                              mysqli_close($con);
                              ?>
                             
              
              
              
              
               
              
              
              
              
               
              