<?php include('h.php')?>
<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM user" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>




<!doctype html>
<link rel='stylesheet' type='text/css' href='memberadd.css'> 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
<script type="text/javascript" src="ckeditor/ckeditor.js">
 
</script>

 
 
<div class="ed-mem-4sell">
  Add Member
</div>
 


            <div class="ed-upload">

            <div class="edit-pro" >
 
            <form  name="adduser" action="memberadd_db.php" 
            method="POST" enctype="multipart/form-data"  
            class="form-horizontal">

       


            
            <img class="ed-pics" id="output" src="user_picture/<?php echo $row['user_picture'];?>">
            <br>

            <label class="chng">Add Image
              
            <input type="file" name="user_picture" id="user_picture" class="form-control" 
            name="image" id="file"  onchange="loadFile(event)" style="display: none;" />

            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <input type="hidden" name="img2"   value="<?php echo $user_picture; ?>" />             
            </label>
            
            <br> 
 

            <label class="ed-name">Name</label><br>
            <input class="ed-name" type="text"  
            name="username" class="form-control" 
            required placeholder="Name" ></input>
             
            <br>

            <label class="ed-email">Email</label><br>
            <input class="ed-email" type="email"  
            name="email" class="form-control" 
            required placeholder="Email" ></input>
            <br>


       
   
        
            <label class="ed-pass">Password</label><br>
            <input class="ed-pass"  type="password" id="password"
            name="password" class="form-control"
            required placeholder="Password" ></input><br>

            <p class="show">
                        <input class="show-p" type="checkbox" onclick="myFunction()">
                         Show Password
                    </p>  
               
             
             
          
            <label class="ed-address">Address</label><br>
            <input class="ed-address" type="text"  
            name="address" class="form-control" 
            required placeholder="Address" ></input>
            <br>

            <label class="ed-Ph-nm">Phone Number</label><br>
            <input class="ed-Ph-nm"  
            class="form-control"  
            type="tel"  maxlength=10  name="user_tel"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
            required placeholder="Phone"
            ></input>
            <br>
     

            
            <label class="ed-satat">Status</label><br>
            <input class="ed-stat" type="text"  
            name="userlevel" class="form-control" id="userlevel" 
            required placeholder="Status"></input>
            <br>

 
             

       
            <button class="ed-save" type="submit" class="btn btn-success" name="btnadd"  > Save </button>

            <button class="ed-cancel" type="button" class="btn btn-success" 
            name="btncan " onclick="location.href ='member.php'" > Cancel </button>
       

            
          </div>
        </div>
      </form>
            


 <script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>








 