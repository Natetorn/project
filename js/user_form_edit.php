<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title> Edit Profile</title>

        <link rel="stylesheet" href="user_form_edit.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
    
    </head>
    <script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
 
    <body>
        <div class="navbar-top"  > 
            <div class="logo">Taste Dee</div>
            
            <form class="sch-f" name="search" method="GET" action="show_product.php">
            <div class="search-box">
                <input value=""  class="bx-sch" type="text" name="search" placeholder="Search Thai Dessert">
            </div>    
            <button  class="bnt-sch">search</button>
            
            </form>

            <button type="button" class="btn-deli" style="cursor:pointer"
                onclick="location.href ='delivery_user.php'">Your Orders</button>

           <!--  <div class="category-dropdown">
                <button class="cate-dd">Category</button>
                <div class="dd-content">
                    <a href="#">Egg</a>
                    <a href="#">Coconut milk</a>
                    <a href="#">Sticky rice</a>
                    <a href="#">Boiled</a>
                    <a href="#">Steamed</a>
                </div>  
            </div> -->

            <div class="cart">
                <input class="add-cart" type="button" name="cart" 
                style="cursor:pointer" onclick="location.href ='cart2.php'" >   
            </div>
            
        </div>


        <div class="sidenav">
            <div class="profile"><br>
                <img src="user_picture/<?php echo $row["user_picture"];?>" 
                class="pic-pro"  > 
                
                <h3 class="name-pro"><?php echo $row['username'];?></h3>

                
            </div>

            <button class="shop" style="cursor:pointer"
                onclick="location.href ='show_product.php'">Shop</button><br>
            
            <button class="Shop-set-ing" style="cursor:pointer"
                onclick="location.href ='show_productmat.php'">Set ingredients</button><br>
            
            <button class="recipes" style="cursor:pointer"
                onclick="location.href ='show_product_recieps.php'">Recipes</button><br>

            <button class="sgout" style="cursor:pointer"
                       onclick="location.href ='logout.php'">Sign out</button>
            
        </div>



        



        </div>

        <div class="allpage">
            <div class="head-editpro">
                <h1>Edit Profile</h1>
            </div><br>

            
            
            <div class="ed-upload">

            <div class="edit-pro" >

            <form  name="adduser" action="user_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal" >

       


            
            <img class="ed-pics" id="output" src="user_picture/<?php echo $row['user_picture'];?>">
            <br>

            <label class="chng"> Change
                
            <input type="file" name="user_picture" id="user_picture" class="form-control" 
            name="image" id="file"  onchange="loadFile(event)" style="display: none;" />

            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <input type="hidden" name="img2"   value="<?php echo $user_picture; ?>" />             
            </label>
            
            <br> 



            <label class="ed-name">Name</label><br> 
            <input class="ed-name" type="text"  
            name="username" class="form-control" 
            required placeholder="ชื่อผู้ใช้" 
            readonly="readonly" / 
            value="<?php echo $username; ?>">
            <br>

            <label class="ed-Ph-nm">Phone Number</label><br>  
            <input class="ed-Ph-nm"  
            class="form-control"  
            type="tel"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" name="user_tel"  
            required placeholder="Phone" value="<?php echo $user_tel;?>"
            ></input>
            <br>

            <label class="ed-address">Address</label><br>
            <input class="ed-address" type="text"  
            name="address" class="form-control" 
            required placeholder="address"/ 
            value="<?php echo $address;?>"></input>
            <br>

            
            

            
       

            <label class="ed-email">Email</label><br>
            <input class="ed-email" type="email"  
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
            onclick="location.href ='show_product.php'" style="cursor:pointer"  > cancel </button>
       
       

            
          </div>
        </div>
      </form>
    </div>
  </div>
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

 
 


</body>
</html>