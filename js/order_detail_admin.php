<div class="head-ship" ><p>Shipping</p>
                
  <?php

      include('h.php');

                                //  database:
                                include('condb.php');  //เชื่อมต่อกับ database 
                                // query 
                                $get_id =  $_GET['order_id'];
                                $query = "select order_date,order_head.order_id,order_detail.order_id,order_detail.prd_id,order_detail.user_id,total,deliverys.order_id,deliverys.user_id,products.prd_id,prd_name,order_detail.p_qty from order_detail
                                inner join deliverys on (order_detail.order_id = deliverys.order_id)
                                inner join order_head on (order_detail.order_id = order_head.order_id)
                                inner join products  on (order_detail.prd_id = products.prd_id)
                                where order_detail.order_id =$get_id
                                ";
                                
                                
                                //3.เก็บข้อมูลที่ query 
                                $result = mysqli_query($con, $query);
                                //4 . แสดงข้อมูลที่ query datatable
                                echo "<link rel='stylesheet' type='text/css' href='admin.css'>";
                                echo " <table class='tb-ship' >";
                                  //หัวข้อตาราง 
                                    echo "  
                                      <tr class='shptr'>
                                      <tr class='shptr'>
                                      <td class='tdshp1'>user_id</td>
                                      <td class='tdshp2'>Shipping</td>
                                      <td class='tdshp5'>Orders ID</td>
                                      <td class='tdshp5'>QTY</td>
                                      <td class='tdshp5'>Order Date</td>
                                      
                                    
                                    </tr>";   
                  
          
         

               
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr class='shiptr'>";
                  echo "<td class='shiptd1'>" .$row["user_id"] .  "</td> ";
                  echo "<td class='shiptd2'>" .$row["prd_name"] .  "</td> ";
                  echo "<td class='shiptd3'>" .$row["order_id"] .  "</td> ";
                  echo "<td class='shiptd3'>" .$row["p_qty"] .  "</td> ";
                  echo "<td class='shiptd3'>" .$row["order_date"] .  "</td> ";
                   
                   
                  }
                  
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>
               




 




 
