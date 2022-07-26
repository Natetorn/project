

<?php include('h.php')?>
<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM videos" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<!doctype html>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<head>
<div class="container">
  <div class="row">
      <form  name="addproduct" action="productmat_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อ VDO </p>
            <input type="text"  name="vdo_name" class="form-control" required placeholder="ชื่อ vdo" />
          </div>
        </div>
        <div class="form-group">
          
          <div class="col-sm-12">
            <p> Url vdo</p>
            <input type="text name="link" id="link" class="form-control" />
          </div>
        </div>
       
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>