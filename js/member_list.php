<div class="head-ship" ><p>Membership</p>
                <div class="ship-box"> 
                    <img class="img-ship" src="https://sv1.picz.in.th/images/2022/03/06/rAX2Ze.png" 
                    width="30px" height="30px" onclick="location.href ='member.php?act=add'" alt="">
              
                </div> 
<?php
       
       include('h.php');
       
                 //  database:
                 include('condb.php');  //เชื่อมต่อกับ database 
                 // query 
                 $query = "SELECT * FROM user ORDER BY user_id ASC" or die("Error:" . mysqli_error());
                 //3.เก็บข้อมูลที่ query 
                 $result = mysqli_query($con, $query);
                 //4 . แสดงข้อมูลที่ query datatable
                 echo "<link rel='stylesheet' type='text/css' href='member.css'>";
                 echo " <table class='tb-mem' >";
                   //หัวข้อตาราง 
                     echo "
                       <tr  class='memtr'  >
                       <td class='tdmem1'>Member ID</td>
                       <td class='tdmem'> Name</td>
                       <td class='tdmem3'> Email</td>
                       <td class='tdmem'> Address</td>
                       <td class='tdmem'> Image</td>
                       <td class='tdmem'> Edit</td>
                       <td class='tdmem2'>Delete</td>
                       
                     
                     </tr>";
                 
                   while($row = mysqli_fetch_array($result)) {
                   echo "<tr class='usetr'>";
                     echo "<td class='usetd1' >" .$row["user_id"] .  "</td> ";
                     echo "<td class='usetd2'>" .$row["username"] .  "</td> ";
                     echo "<td class='usetd3'>" .$row["email"] .  "</td> ";
                     echo "<td class='usetd4'>" .$row["address"] .  "</td> ";
 
                     echo "<td class='imgtd'>"."<img src='user_picture/".$row["user_picture"]."' width='30' height='30' style='border-radius: 10px' >"."</td>";
                     //แก้ไขข้อมูล
                     echo "<td class='btntd'>
                     <a href='member.php?act=edit&ID=$row[0]' >Edit</a>
                     </td> ";
                     
                     //ลบข้อมูล
                     echo "<td class='btntd1'>
                     <a href='member_del.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>Delete</a></td> ";
                   echo "</tr>";
                   }
                 echo "</table>";
                 //5. close connection
                 mysqli_close($con);
                 ?>
                