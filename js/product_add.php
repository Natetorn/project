<?php include('h.php')?>
<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM products" or die("Error:" . mysqli_error());
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
          Add Product
        </div>
 


            <div class="ed-upload">

            <div class="edit-pro" >

            <form  name="addproduct" action="product_add_db.php" 
            method="POST" enctype="multipart/form-data"  
            class="form-horizontal">

            

            
            <label class="chng">Add Image
            <br>

            
              
            <input type="file" name="prd_picture" id="prd_picture" class="form-control" 
            name="image" id="file"  onchange="loadFile(event)" style="display: none;" />

            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <input type="hidden" name="img2"   value="<?php echo $user_picture; ?>" />             
            </label>
            <img class="ed-pics" id="output" src="user_picture/<?php echo $row['user_picture'];?>">


            <br>  <br>



            <label class="ad-name">Name Product</label><br>
            <input class="ad-name" type="text"  
            name="prd_name" class="form-control" 
            required placeholder="Name Product" ></input>
             
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
         

         <!--  <div class="form-group">
          <div class="col-sm-9">
            <p> ประเภทสินค้า</p>
            <input type="text"  name="prd_type" 
            class="form-control" required placeholder="ประเภทสินค้า" />
          </div>
        </div> 


 -->
            
            <!--  <input class="ad-cate" type="text"  
            name="prd_type" class="form-control" 
            required placeholder="Categories" ></input>   -->
             
            <select  class="ad-cate" name="prd_type"
            type="text" class="form-control"  id="" > 
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
            <!-- <label class="ad-pce">Price</label><br> -->
            <input class="ad-pce" type="text"  id="price"
            name="price" class="form-control" 
            required placeholder="THB" ></input>
         

            <!-- <label class="ad-sck">Stock</label><br> -->


  <!--           <input class="ad-sck" type="text"  id="p_qty"
            name="p_qty" class="form-control" 
            required placeholder="THB" ></input> --> 

            <div class="in-de">
                <div class="value-button" id="decrease" 
                onclick="decreaseValue()" value="Decrease Value">-</div>
      
                <input class="num-i" type="number" id="p_qty" value="0" name="p_qty"/>
                
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
            cols="50"  rows="8"  > </textarea>

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
                </div>




      
        <!--         <script>
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



  <textarea name="prd_detail" cols="50" id="detail" 
    rows="8">
  &lt;p&gt;A sample &lt;u&gt;heavily formatted text&lt;/u&gt; using &lt;strong&gt;&lt;span style=&quot;font-family: &apos;Comic Sans MS&apos;;font-size:16px&quot;&gt;different fonts&lt;/span&gt;&lt;/strong&gt; and &lt;span style=&quot;font-size:18px;color:#00FF00;background-color: #FFFF00&quot;&gt;text colors&lt;/span&gt;. &lt;/p&gt;</textarea>
  
  -->

  
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

<head>

<div class="container">



  <div class="row">
      <form  name="addproduct" action="product_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">


          <div class="col-sm-9">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="prd_name" 
            class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>







		<div class="form-group">
          <div class="col-sm-9">
            <p> ประเภทสินค้า</p>
            <input type="text"  name="prd_type" 
            class="form-control" required placeholder="ประเภทสินค้า" />
          </div>
        </div>



        <div class="form-group">
        <textarea name="prd_detail" id="detail"></textarea>
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
          
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <input type="file" name="prd_picture" id="prd_picture" 
            class="form-control" />
          </div>
        </div>


        <div class="col-sm-12">
            <p> ราคา</p>
            <input type="text" name="price" id="price" class="form-control" />
          </div>



          <div class="col-sm-12">
            <p>จำนวนสินค้า</p>
            <input type="number" name="p_qty" id="p_qty" class="form-control" />
          </div>
        </div><br>




        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div> -->


  