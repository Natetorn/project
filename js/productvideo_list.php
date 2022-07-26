<div class="head-ship" ><p>My Recipes</p>
                <div class="ship-box"> 
                    <img class="img-ship" src="https://sv1.picz.in.th/images/2022/03/06/rAX2Ze.png" 
                    width="30px" height="30px" onclick="location.href ='product_video.php?act=add'" alt="">
                    
                </div>
                
                
                

<?php
include('h.php');
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM videos as p";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo "<link rel='stylesheet' type='text/css' href='product_video.css'>";
echo " <table class='tb-v-pro'>";
  //หัวข้อตาราง
    echo "<tr class='vprotr'>
      <td class='tdvpro1' >Video ID</td>
      <td class='tdvpro2' >Video Name</td>
      
      
      <td class='tdvpro5' >Edit</td>
      <td class='tdvpro6' >Delete</td>
     
      
    </tr>";


  while($row = mysqli_fetch_array($result)) {
  echo "<tr class='vtr'>";
    echo "<td class='vtd1'>" .$row["vdo_id"] .  "</td> ";
    echo "<td class='vtd2'>" .$row["vdo_name"] .  "</td> ";
     
     
 
    //แก้ไขข้อมูล
    echo "<td class='btntd'>
    <a href='product_video.php?act=edit&ID=$row[0]' >Edit</a></td> ";
    
    //ลบข้อมูล
    echo "<td class='btntd1'>
    <a href='productvideo_del.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\"  >Delete</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>