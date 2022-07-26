<?php
 //print('<pre>');
//print_r($_POST);
//print('</pre>');
$date_data_check=$_POST['year_check'].$_POST['month_check'];
function DateThai()
{
$strYear = $_POST['year_check']+543;
$strMonth = $_POST['month_check'];
$a = (int)$_POST['month_check'];

$strMonthCut = Array("","January","February","March","April","May.","June","July","August","September","October","November","December");
$strMonthThai=$strMonthCut[$a];
return "$strMonthThai $strYear";
}
$test = DateThai();
?>
<!DOCTYPE html>
<html>
<head>
<?php include('h.php');?>




<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scal=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Shop Taste dee</title>

        <link rel="stylesheet" href="powerbi.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
      
       
    
    </head>

 

    <body>
        <div class="navbar-top"> 
            <div class="logo">
              <img class="lg-4sler" src="https://sv1.picz.in.th/images/2022/02/24/rx3X2I.png">
            </div>
            
             


 
        </div>




        <div class="sidenav">

            <button class="home" style="cursor:pointer"
                onclick="location.href ='homepage.php'">Home</button><br>
             

            <button class="shipping" style="cursor:pointer"
                onclick="location.href ='admin.php'">Shipping</button><br>
            
            <button class="membr" style="cursor:pointer"
                onclick="location.href ='member.php'">Membership</button><br>

            
            <button class="my-prod" style="cursor:pointer"
                onclick="location.href ='product.php'">My Products</button><br>
            
            <button class="res4ler" style="cursor:pointer"
                onclick="location.href ='product_video.php'">My Recipes</button><br>

            <button class="salein4" style="cursor:pointer"
                onclick="location.href ='powerbilist.php'">Sales Info</button><br>


            <button class="sgout" style="cursor:pointer"
                onclick="location.href ='logout.php'">Sign out</button>
            
        </div>



        



        </div>




          
        <div class="allpage">
            <div class="head-ship" >
                <?php include('list.php');?>
                <div class="lst-all-bnt-4">

                    <button class="lst1-4" style="cursor:pointer"  data-hover="ยอดขายทั้งหมด / ปี"
                    onclick="location.href ='powerbi.php'">All Sales / Year</button>

                    <button class="lst2-4" style="cursor:pointer"  data-hover="ยอดขายทั้งหมด / เดือน"
                    onclick="location.href ='powerbi4.php'">All Sales / Month</button>

                    <button class="lst3-4" style="cursor:pointer"  data-hover="จำนวนสินค้าที่ขายหมด / ปี"
                    onclick="location.href ='powerbi5.php'">Number of products sold / Year</button>

                    <button class="lst4-4" style="cursor:pointer"  data-hover="จำนวนสินค้าที่ขายหมด / เดือน"
                    onclick="location.href ='powerbi2.php'">Number of products sold / Month</button>



                    <button class="lst5-4" style="cursor:pointer"  data-hover="ยอดขายสินค้าทั้งหมดในวันปัจจุบัน"
                    onclick="location.href ='powerbi3.php'">The recent sales of products</button>
                    </div>

                
                
                   
           
            </div>

            <div class="manag-pobi">

          
            <html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<?php
//เชื่อมต่อฐานข้อมูล
include ("condb.php");
include('h.php');
 // คิวรี่ข้อมูลจากตาราง
 $query3 = 
"select prd_name,products.prd_id,order_detail.prd_id,sum(order_detail.p_qty),order_date,order_head.order_id,order_detail.order_id FROM order_detail
inner join products on (order_detail.prd_id = products.prd_id)
inner join order_head on(order_detail.order_id=order_head.order_id)
where
EXTRACT(YEAR_MONTH FROM order_date) = $date_data_check
GROUP BY order_detail.prd_id
 ;";

 $result1 = mysqli_query($con, $query3);
 $query4 ="
 SELECT prd_name
 FROM products  where prd_name = prd_id";
 $result = mysqli_query($con, $query4); 

    //นำข้อมูลที่ได้จากคิวรี่มากำหนดรูปแบบข้อมุลให้ถูกโครงสร้างของกราฟที่ใช้ *อ่าน docs เพิ่มเติม
    $datax = array();
    $prd_name = array();
    foreach ($result1 as $k) {
      $datax[] = "['".$k['prd_name']."'".", ".$k['sum(order_detail.p_qty)']."]";
      
    }

    //cut last commar
    $datax = implode(",", $datax);
    //แสดงข้อมูลก่อนนำไปแสดงบนกราฟ 
    //echo $datax; //ถ้าอยากเอาออก ก็ใส่ double slash ข้างหน้าครับ
?>
<br>
<h3 class="a-f-s-numfm">
Number of Products sold for <?php echo $test;?>
</h3>
<html>
  <head>
    <!-- เรียก js มาใช้งาน -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Summary per product_type'],
          <?php echo $datax;?>
        ]);

        var options = {
          title: 'จำนวนสินค้าที่ขายไปทั้งหมด (จำนวนชิ้น)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div class="p-chrt"  id="piechart" ></div>
  </body>
</html>





<?php mysqli_close($con);
    
                
?>
