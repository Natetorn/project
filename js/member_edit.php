<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$user_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM user WHERE user_id='$user_id' ";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM user " or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>




<!doctype html>  
<html>
    <head>
<link rel='stylesheet' type='text/css' href='memberadd.css'> 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
</head>
       
<script type="text/javascript" src="ckeditor/ckeditor.js">
 
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

<body>



                      
                      <div class="ed-mem-4sell">
                        Add Member
                      </div>

                      <div class="ed-upload">
                        
                      <div class="edit-pro">


                        <form name="adduser" action="member_edit_db.php" 
                        method="POST" enctype="multipart/form-data"  
                        class="form-horizontal" >


                        
                        <img class="ed-pics" id="output" src="user_picture/<?php echo $row['user_picture'];?>">
                        <br>

                        <label class="chng">Edit Image

                        <input type="file" name="user_picture" id="user_picture" class="form-control" 
                        name="image" id="file"  onchange="loadFile(event)" style="display: none;" />

                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                        <input type="hidden" name="img2"   value="<?php echo $user_picture; ?>" />             
                        </label>
                        
                        <br> 


                        

                        <label class="ed-name1">Name</label><br>
                        <input class="ed-name1" type="text"  
                        name="username" class="form-control" 
                        required placeholder="ชื่อผู้ใช้" 
                        / 
                        value="<?php echo $username; ?>" readonly>
                        <br>

                        <label class="ed-Ph-nm">Phone Number</label><br>
                        <input class="ed-Ph-nm"  
                        class="form-control"  
                        type="tel"  maxlength=10 name="user_tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                        required placeholder="Phone" value="<?php echo $user_tel;?>"
                        ></input>
                        <br>

                        <label class="ed-address">Address</label><br>
                        <input class="ed-address" type="text"  
                        name="address" class="form-control" 
                        required placeholder="address"/ 
                        value="<?php echo $address;?>"></input>
                        <br>

                        
                        

                        
                  

                        <label class="ed-email1">Email</label><br>
                        <input class="ed-email1" type="email"  
                        name="email" class="form-control" 
                        required placeholder="email"/ 
                        value="<?php echo $email;?>" readonly></input>
                        <br>


                  
              
                    
                        <label class="ed-pass">Password</label><br>
                        <input class="ed-pass"  type="password" id="password"
                        name="password" class="form-control" 
                        required placeholder="รหัสผ่าน"/ 
                        value="<?php echo $password;?>"></input><br>
                        <p class="show">
                                    <input class="show-p" type="checkbox" onclick="myFunction()">
                                    Show Password
                                </p>  
                          
                        
                      
                      
                    

                        

                  
                        <button class="ed-save" type="submit" class="btn btn-success" name="btnadd"  > Save </button>
                        <button class="ed-cancel" type="button" class="btn btn-success" 
                        name="btnadd"   
                        onclick="location.href ='member.php'" style="cursor:pointer"  > cancel </button>
                  
                  

                        
                      </div>
                    </div>

                       







                        
                        </form>





                      </div>









                      </div>





<!-- 

<div class="container">
  <div class="row">
      <form  name="adduser" action="member_edit_db.php" 
      method="POST" enctype="multipart/form-data"  
      class="form-horizontal">



        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อผู้ใช้</p>
            <input type="text"  name="username" class="form-control" required placeholder="ชื่อผู้ใช้" / value="<?php echo $username; ?>">
          </div>
        </div>
         <div class="form-group">
		 <div class="form-group">
          <div class="col-sm-9">
            <p> รหัสผ่าน </p>
            <input type="password"  name="password" class="form-control" required placeholder="รหัสผ่าน"/ value="<?php echo $password;?>"></input>
          </div>
        </div>
      
          
    
        <div class="form-group">
          <div class="col-sm-9">
            <p> อีเมล์ </p>
            <input type="text"  name="email" class="form-control" required placeholder="email"/ value="<?php echo $email;?>"></input>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-9">
            <p> ที่อยู่ </p>
            <input type="text"  name="address" class="form-control" required placeholder="address"/ value="<?php echo $address;?>"></input>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> เบอร์โทรศัพท์ </p>
            <input type="tel"  name="user_tel" class="form-control" required placeholder="user_tel"/ value="<?php echo $user_tel;?>"></input>
          </div>
        </div>
		
       <br>
        <div class="form-group">
          <div class="col-sm-12">
             <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
             <input type="hidden" name="img2" value="<?php echo $user_picture; ?>" />
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>
 -->




 </body>
</html>