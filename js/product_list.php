<div class="head-ship" ><p>My Products</p>
                <div class="ship-box"> 
                    <img class="img-ship" src="https://sv1.picz.in.th/images/2022/03/06/rAX2Ze.png" 
                    width="30px" height="30px" onclick="location.href ='product.php?act=add'" alt="">
                   
                </div>
                
                
                   
           
            </div>
<?php
include('h.php');
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM products as p";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo "<link rel='stylesheet' type='text/css' href='product.css'>";
echo  " <table class='tb-m-pro'> ";
  //หัวข้อตาราง
    echo "<tr class='mprotr'>
      <td  class='tdmpro1' >Products ID</td>
      <td  class='tdmpro2' >Products Name</td>
      <td  class='tdmpro3' >Price</td>
     
      <td  class='tdmpro5' >Categories</td>
      <td  class='tdmpro6' >Stock</td>
      <td  class='tdmpro7' >Image</td>
      <td  class='tdmpro8' >Edit</td>
      <td  class='tdmpro9' >delete</td>
      
    </tr>";


  while($row = mysqli_fetch_array($result)) {
  echo "<tr class='protr'>";
    echo "<td class='protd1'>" .$row["prd_id"] .  "</td> ";
    echo "<td class='protd2'>" .$row["prd_name"] .  "</td> ";
    echo "<td class='protd3'>" .$row["price"] .  "</td> ";
   
    echo "<td class='protd5'>" .$row["prd_type"] .  "</td> ";
    echo "<td class='protd6'>" .$row["p_qty"] .  "</td> ";
    echo "<td class='imgtd' >"."<img src='prd_picture/".$row["prd_picture"]."' width='30' height='30' style='border-radius: 10px'>"."</td>";
    //แก้ไขข้อมูล
    echo "<td class='btntd'>
    <a href='product.php?act=edit&ID=$row[0]' >Edit</a></td> ";
    
    //ลบข้อมูล
    echo "<td class='btntd1'>
    <a href='product_del.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>Delete</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>