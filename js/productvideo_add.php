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

<link rel='stylesheet' type='text/css' href='product_add.css'> 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
<script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>
 

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>


<div class="ed-addpro-4sell">
          Add Recipes
        </div>

        <div class="ed-upload">
        <div class="edit-pro" >

        <form  name="addvideo" action="productvideo_add_db.php" 
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

            
            <label class="ad-name">Name Video</label><br>
            <input class="ad-name" type="text"  id="vdo_name"
            name="vdo_name"  class="form-control" 
            required placeholder="Name Video" ></input>
             
            <br>

             
            <label class="ad-name">Link Video</label><br>
            <input class="ad-name"   id="link" 
            name="link"  class="form-control" 
            required placeholder="https://" ></input>
             
     


            <br>

            <label class="ad-name">Credit</label><br>
            <input class="ad-name" type="text" name="credit" 
            id="credit" class="form-control" 
            required placeholder="Credit " ></input>
             
            <br>

      

            
          <label class="ad-dt">How to Thai dessert</label><br> 
          <div class="text-a">
          <textarea  name="vdo_detail" id="detail"
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
  </script>  <br>  
 
                  <button class="ed-save" type="submit" class="btn btn-success" name="btnadd"  > Save </button>

                  <button class="ed-cancel" type="button" class="btn btn-success"  
                  name="btncan " onclick="location.href ='product_video.php'" > Cancel </button>





    
    
    </form> 
   </div> 
  </div>


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
      <form  name="addvideo" action="productvideo_add_db.php" 
      method="POST" enctype="multipart/form-data"  
      class="form-horizontal">




        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อ VDO </p>
            <input type="text"  name="vdo_name" id="vdo_name"class="form-control" required placeholder="ชื่อ vdo" />
          </div>
        </div>


        <div class="form-group">
          
          <div class="col-sm-12">
            <p> Url vdo</p>
            <input type="text" name="link" id="link" 
            class="form-control" />
          </div>
        </div>


        <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <input type="file" name="prd_picture" 
            id="prd_picture" class="form-control" />
          </div>



        </div>
        <div class="form-group">


        <p> วิธีการทำ</p>
        <textarea name="vdo_detail" id="detail"></textarea>
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


        <div class="col-sm-12">
            <p> Credit </p>
            <input type="text" name="credit" 
            id="credit" class="form-control" />
          </div>





        </div>
       <br>
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>
   -->