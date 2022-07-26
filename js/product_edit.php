<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$prd_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM products WHERE prd_id='$prd_id' ";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM products " or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>



<!doctype html>
<link rel='stylesheet' type='text/css' href='product_add.css'> 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
<script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>
     




<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<div class="ed-addpro-4sell">
          Edit Product
        </div>



        <div class="ed-upload">

        <div class="edit-pro" >

        <form  name="addproduct" action="product_edit_db.php" 
            method="POST" enctype="multipart/form-data"  
            class="form-horizontal">

           



        
            <label class="chng">Edit Image
            <br>
       
            <input type="file" name="prd_picture" id="prd_picture" class="form-control" 
            name="image" id="file"  onchange="loadFile(event)" style="display: none;" />

            <input type="hidden" name="prd_id" value="<?php echo $prd_id; ?>" />
            <input type="hidden" name="img2"   value="<?php echo $prd_picture; ?>" />             
            </label>
            <img class="ed-pics" id="output" src="prd_picture/<?php echo $row['prd_picture'];?>">


            <br>  <br>
          
          
          
           

            <label class="ad-name">Name Product</label><br>
            <input class="ad-name" type="text"  
            name="prd_name" class="form-control" 
            required placeholder="Name Product" / value="<?php echo $prd_name; ?>" ></input>
             
            <br>

            
            <label class="ad-cate">Categories
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Price  
          
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; 
            
            Stock
          </label><br>

              
          <select  class="ad-cate" name="prd_type"
            type="text" class="form-control"  id="" / value="<?php echo $prd_type;?>"> 
              <option class="op" value="Egg">Select Category</option>
         
              <option class="op" value="Egg">Egg</option>
              <option class="op" value="Coconut milk">Coconut milk</option>
              <option class="op" value="Sticky rice">Sticky rice</option>
              <option class="op" value="Boiled">Boiled</option>
              <option class="op" value="Steamed">Steamed</option>

              <option class="op" value="วัตถุดิบ">• Set ingredient •</option>
            </select>  


            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; 
        
            <input class="ad-pce" type="text"  id="price"
            name="price" class="form-control" 
            required placeholder="THB" / value="<?php echo $price;?>"></input>
 

            <div class="in-de">
                <div class="value-button" id="decrease" 
                onclick="decreaseValue()" value="Decrease Value">-</div>
      
                <input class="num-i" type="number" id="p_qty" / value="<?php echo $p_qty;?>" name="p_qty"/>
                
                <div class="value-button" id="increase" 
            onclick="increaseValue()" value="Increase Value">+</div>
            </div>
            <script>
              function increaseValue() {
              var value = parseInt(document.getElementById('p_qty').value, 10);
              value = isNaN(value) ? 0 : value;
              value++;
              document.getElementById('p_qty').value = value;
            }

            function decreaseValue() {
              var value = parseInt(document.getElementById('p_qty').value, 10);
              value = isNaN(value) ? 0 : value;
              value < 1 ? value = 1 : '';
              value--;
              document.getElementById('p_qty').value = value;
            }
            </script>
             
            <br>

    
          <label class="ad-dt">Detail</label><br> 
          <div class="text-a">
          <textarea  name="prd_detail" id="detail" 
            cols="50"  rows="8" / value="<?php echo $prd_detail;?>" > </textarea>

                <script>
                  /*    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('detail');
                    function CKupdate() {
                        for (instance in CKEDITOR.instances)
                            CKEDITOR.instances[instance].updateElement();
                    } */ 


                    // ACF is enabled by default regardless whether toolbar configuration is provided or not.
    // By having a smaller number of features enabled in the toolbar it should be easier to understand how ACF works.
    CKEDITOR.config.toolbar = [{
        name: 'basicstyles',
        items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
      },
      {
        name: 'paragraph',
        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
      } 
    ];
    // Disable paste filter to avoid confusion on browsers on which it is enabled by default and may affect results.
    // Read more in https://ckeditor.com/docs/ckeditor4/latest/guide/dev_advanced_content_filter-section-filtering-pasted-and-dropped-content
    CKEDITOR.config.pasteFilter = null;

    CKEDITOR.config.height = 250;
     
    
    // Auto Grow has nothing to do with ACF.
    // However, to make users comfortable while pasting content into a tiny editing area, we would let the editor grow.
    CKEDITOR.config.extraPlugins = 'autogrow';
    CKEDITOR.config.autoGrow_maxHeight = 300;
    CKEDITOR.config.autoGrow_minHeight = 250;


                    
                </script> 
                                
                  <script>
                    CKEDITOR.replace('detail', {
                      removeButtons: 'PasteFromWord'
                    });
                  </script>



                    
                <br>  

                


                            
                <button class="ed-save" type="submit" class="btn btn-success" name="btnadd"  > Save </button>

                <button class="ed-cancel" type="button" class="btn btn-success" 
                name="btncan " onclick="location.href ='product.php'" > Cancel </button>



 
        
        
        
         </div>

        </div>

        
        </form>




       
<script>
var loadFile = function(event) {
var image = document.getElementById('output');
image.src = URL.createObjectURL(event.target.files[0]);
};
</script>













<!-- 

<div class="container">
  <div class="row">
      <form  name="addproduct" action="product_edit_db.php" 
      method="POST" enctype="multipart/form-data"  
      class="form-horizontal">


        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="prd_name" class="form-control" 
            required placeholder="ชื่อสินค้า" / value="<?php echo $prd_name; ?>">
          </div>
        </div>

        
         <div class="form-group">
		 <div class="form-group">
          <div class="col-sm-9">
            <p> ประเภทสินค้า</p>
            <input type="text"  name="prd_type" class="form-control" required placeholder="price"/ value="<?php echo $prd_type;?>"></input>
          </div>
        </div>
      
            <div class="form-group">
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <img src="prd_picture/<?php echo $row['prd_picture'];?>" width="100px">
            <br>
            <br>
            <input type="file" name="prd_picture" id="prd_picture" class="form-control">
          </div>
        </div>



        <div class="form-group">
        <p> รายละเอียดสินค้า</p>
        <textarea name="prd_detail" id="detail" / value="<?php echo $prd_detail;?>"></textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('detail');
                    function CKupdate() {
                        for (instance in CKEDITOR.instances)
                            CKEDITOR.instances[instance].updateElement();
                    }
                </script>
        </div>

        <div class="form-group">
          <div class="col-sm-9">
            <p> ราคา </p>
            <input type="text"  name="price" class="form-control" required placeholder="price"/ value="<?php echo $price;?>"></input>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> จำนวนสินค้า </p>
            <input type="number"  name="p_qty" class="form-control" required placeholder="p_qty"/ value="<?php echo $p_qty;?>"></input>
          </div>
        </div>
		
       <br>
        <div class="form-group">
          <div class="col-sm-12">
             <input type="hidden" name="prd_id" value="<?php echo $prd_id; ?>" />
             <input type="hidden" name="img2" value="<?php echo $prd_picture; ?>" />
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div> -->