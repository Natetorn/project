<?php
include('condb.php');
$search = $_GET['search'];
$query ="
SELECT * FROM `products` WHERE `prd_name` LIKE '%search%' ORDER BY 'prd_id' DESC";
$result = mysqli_query($con,$query)
?>

<?php include("h.php");?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Shop Taste dee</title>

        <link rel="stylesheet" href="show_product.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
    
    </head>

 
         

            <div class="category-dropdown">
                <button class="cate-dd">Category</button>
                <div class="dd-content">
                    <a href="#">Egg</a>
                    <a href="#">Coconut milk</a>
                    <a href="#">Sticky rice</a>
                    <a href="#">Boiled</a>
                    <a href="#">Steamed</a>
                </div>  
            </div>

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

                <button type="button" class="btn-pro" style="cursor:pointer"
                onclick="location.href ='userpage.php?act=edit'">Edit Profile</button>
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

        <body>
       
       <div class="navbar-top"> 
          
          <div class="logo">Taste Dee</div>
        <form class="navbar-form navbar-left" method="get">
          <div class="search-box">
              <input class="bx-sch" type="text" name="search" placeholder="Search Thai Dessert" value="">
              <button type ="submit" name="act" value='q' class="btn btn-success">ค้นหา </button>     
          </div>
   </form>

        



        </div>




          
        <div class="allpage">
            <div class="head-sh" >
                <h1>Shop</h1>
           
            </div>
            <div class="grid-container">

            <?php while($row = mysqli_fetch_array($result)) {?>
                
                <div class="grid-item">
                    <img src="prd_picture/<?php echo $row["prd_picture"];?>"
                    alt="mango" width="250px" height="250px">

                    <h6><?php echo $row["prd_name"];?> 
                        (<?php echo $row["p_qty"];?>)
                </h6>
           

                    <p class="price">   <?php echo $row["price"];?> THB </p>
                    <?php if($row['p_qty'] > 0){ ?>
                    <button class="btn-add"  
                       onclick="location.href ='cart2.php?prd_id=<?php echo $row['prd_id'];?>&act=add' "onclick="myFunction()"role="button">Add
                       <?php }else{

                    echo '<button class="btn btn-danger" disabled> Sold out </button>';
                    }?>

                    <script>
                    function myFunction() {
                    alert("นำเข้าตะกร้าสินค้าสำเร็จ");
                    }
                    </script>
             </button>
                </div>
                <?php }?>
                  





                

                
            
            
            </div>
        
        
        
        
        
        </div>

            

            


            
                 

                



  

            
            




























     
    </body>






</html>

