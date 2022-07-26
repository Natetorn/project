<?php
// ปิดการแสดง error
error_reporting(0);
?>
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

                <div class="lst-all-bnt-2">

                    <button class="lst1-2" style="cursor:pointer" data-hover="ยอดขายทั้งหมด / ปี"
                    onclick="location.href ='powerbi.php'">All Sales / Year</button>

                    <button class="lst2-2" style="cursor:pointer" data-hover="ยอดขายทั้งหมด / เดือน"
                    onclick="location.href ='powerbi4.php'">All Sales / Month</button>

                    <button class="lst3-2" style="cursor:pointer" data-hover="จำนวนสินค้าที่ขายหมด / ปี"
                    onclick="location.href ='powerbi5.php'">Number of products sold / Year</button>
 
                    <button class="lst4-2" style="cursor:pointer" data-hover="จำนวนสินค้าที่ขายหมด / เดือน"
                    onclick="location.href ='powerbi2.php'">Number of products sold / Month</button>



                    <button class="lst5-2" style="cursor:pointer" data-hover="ยอดขายสินค้าทั้งหมดในวันปัจจุบัน"
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
include ("condb.php");
include('h.php');
mysqli_query($con, "SET NAMES 'utf8' ");
 
$query = 
"select prd_name,products.prd_id,order_detail.prd_id,sum(total),order_date,order_head.order_id,order_detail.order_id FROM order_detail
inner join products on (order_detail.prd_id = products.prd_id)
inner join order_head on(order_detail.order_id=order_head.order_id)
where
EXTRACT(YEAR_MONTH   FROM order_date) = $date_data_check 
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
<h3 class="a-f-s-m">
All Sales of <?php echo $test;?>
</h3>



  

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
            label: 'รายงานยอดขายรวมของสินค้าทั้งหมดในวันปัจจุบัน (จำนวนบาท)',
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
