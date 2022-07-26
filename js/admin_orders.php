<?php
      include('h.php');
                //database:
                include('condb.php');  //เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query
                $query = "SELECT * FROM order ORDER BY orders_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query 
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query
                echo ' <table align="center" width="50%" border="1">';
                  //หัวข้อตาราง 
                    echo "
                      <tr>
                      <td>รหัสผู้ใช้</td>
                      <td>รหัสการสั่งซื้อ</td>
                      <td>วันที่สั่งซื้อ</td>
                      <td>จำนวนสินค้า</td>
                      <td>ราคารวม</td>
                      
                    
                     
                    </tr>";
                
                  while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>" .$row["user_id"] .  "</td> ";
                    echo "<td>" .$row["orders_id"] .  "</td> ";
                    echo "<td>" .$row["orders_date"] .  "</td> ";
                    echo "<td>" .$row["orders_amount"] .  "</td> ";
                    echo "<td>" .$row["total_price"] .  "</td> ";
                    
                    
                   
                    //ลบข้อมูล
                    echo "<td><a href='admin_del_order.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>