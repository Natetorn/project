
<?php
// ปิดการแสดง error
error_reporting(0);
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
                
                
                   
           
            </div>

            <div class="manag-pobi">

          
            <html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="powerbi3.css">
</head>
<body>
<div class="lst-all-bnt">

        <button class="lst1" style="cursor:pointer" data-hover="ยอดขายทั้งหมด / ปี"
        onclick="location.href ='powerbi.php'">All Sales / Year</button>

        <button class="lst2" style="cursor:pointer" data-hover="ยอดขายทั้งหมด / เดือน"
        onclick="location.href ='powerbi4.php'">All Sales / Month</button>

        <button class="lst3" style="cursor:pointer" data-hover="จำนวนสินค้าที่ขายหมด / ปี"
        onclick="location.href ='powerbi5.php'">Number of products sold / Year</button>

        <button class="lst4" style="cursor:pointer" data-hover="จำนวนสินค้าที่ขายหมด / เดือน"
        onclick="location.href ='powerbi2.php'">Number of products sold / Month</button>



        <button class="lst5" style="cursor:pointer" data-hover="ยอดขายสินค้าทั้งหมดในวันปัจจุบัน"
        onclick="location.href ='powerbi3.php'">The recent sales of products</button>
        </div>
<?php
include ("condb.php");
include('h.php');
mysqli_query($con, "SET NAMES 'utf8' ");
 
$query = "select prd_name,products.prd_id,order_detail.prd_id,sum(total),order_date,order_head.order_id,order_detail.order_id
FROM order_detail
inner join products on (order_detail.prd_id = products.prd_id)
inner join order_head on(order_detail.order_id=order_head.order_id)
where DATE(order_date) = DATE(CURDATE())
GROUP BY order_detail.prd_id
;";
 //ต่อตัวแปร string

$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);  



 //for chart
$prd_id = array();
$prd_name = array();
$totol = array();


while($rs = mysqli_fetch_array($resultchart)){ 

  $prd_name[] = "\"".$rs['prd_name']."\""; 
  $d_subtotal[] = "\"".$rs['sum(total)']."\""; 

}
$prd_id = implode(",", $prd_name);  
$d_subtotal = implode(",", $d_subtotal);

$sql ="SELECT *  FROM products WHERE prd_name=prd_name";
$result = mysqli_query($con,$sql) or die ("Error : $sql").
mysqli_error(); 

?>
<br>
<?php
echo "<meta charset='utf-8'>";
function ThDate()
{
//วันภาษาไทย
$ThDay = array ( "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" );
//เดือนภาษาไทย
$ThMonth = array ( "January", "February", "March", "April","May", "June", "July", "August","September", "October", "November", "December" );
 
//กำหนดคุณสมบัติ
$week = date( "w" ); // ค่าวันในสัปดาห์ (0-6)
$months = date( "m" )-1; // ค่าเดือน (1-12)
$day = date( "d" ); // ค่าวันที่(1-31)
$years = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.

return "The recent sales of Products ($day  
		$ThMonth[$months] 
	    $years)";
}

 
?>
<h3 class="a-f-s-recent">
<?php echo ThDate(); // แสดงวันที่ ?>
</h3>
<br>


</table>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<hr>
<p align="center">



<canvas id="myChart" width="400px" height="100px"></canvas>


<script>
    
    
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
   
    type: 'bar',
    
    data: {
       
        labels: [<?php echo $prd_id;?>
       
        ],
    
     
        datasets: [{
            label: 'รายงานยอดขายรวมของสินค้าทั้งหมดในวันล่าสุด (จำนวนบาท)',
            data: [<?php echo $d_subtotal;?> 
            ] ,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>  

</p> 

</html>
 
 

        </div> 
    </body> 
</html>
