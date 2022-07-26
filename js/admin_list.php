<div class="head-ship" ><p>Shipping</p>
                
  <?php
      include('h.php');
      
                                //  database:
                                include('condb.php');  //เชื่อมต่อกับ database 
                                // query 
                                $query = "SELECT * FROM deliverys ORDER BY delivery_id ASC" or die("Error:" . mysqli_error());
                                //3.เก็บข้อมูลที่ query 
                                $result = mysqli_query($con, $query);
                                //4 . แสดงข้อมูลที่ query datatable
                                echo "<link rel='stylesheet' type='text/css' href='admin.css'>";
                                echo " <table class='tb-ship' >";
                                  //หัวข้อตาราง 
                                    echo "
                                      <tr class='shptr'>
                                      <td class='tdshp1'>Tracking number</td>
                                      <td class='tdshp2'>Shipping</td>
                                      <td class='tdshp3'>Orders ID</td>
                                 
                                      <td class='tdshp4'>Edit</td>
                                      <td class='tdshp5'>Delete</td>
                                    
                                    </tr>";   
                  
          
         

               
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr class='shiptr'>";
                    echo "<td class='shiptd1'>" .$row["delivery_id"] .  "</td> ";
                    echo "<td class='shiptd2'>" .$row["delivery_status"] .  "</td> ";
                    echo "<td class='shiptd3'>" .$row["order_id"] .  "</td> ";
                    //echo "<td class='shiptd3'><a href = 'order_detail_admin.php?order_id=".$row["order_id"]."' class='shiptd3'>รายละเอียด</a></td> ";
                    //แก้ไขข้อมูล
                    echo "<td class='btntd'>
                    <a href='admin.php?act=edit&ID=$row[0]&order_id=".$row["order_id"]."'  >Edit</a></td> ";
                    
                    //ลบข้อมูล
                    echo "<td class='btntd1'>
                    <a href='admin_del.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" >Delete</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>
               




 




 
