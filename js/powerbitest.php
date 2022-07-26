<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<link rel="stylesheet" href="powerbi4.css">
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
$thai_month_arr=array(
    "0"=>"",
    "1"=>"January",
    "2"=>"February",
    "3"=>"March",
    "4"=>"April",
    "5"=>"May",
    "6"=>"June", 
    "7"=>"July",
    "8"=>"August",
    "9"=>"September",
    "10"=>"October",
    "11"=>"November",
    "12"=>"December"                 
);
?>
<br>
<div >
 
  <form class="fm-bi4"method="post" action="powerbi_month4.php">
    <p >Month</p>
    <select class="drop-m"name="month_check" id="month_check">
      <?php for($i=1;$i<=12;$i++){ ?>
      <option class="drop-m-op" value="<?=sprintf("%02d",$i)?>" <?=((isset($_POST['month_check']) && $_POST['month_check']==sprintf("%02d",$i)) || (!isset($_POST['month_check']) && date("m")==sprintf("%02d",$i)))?" selected":""?> >
      <?=$thai_month_arr[$i]?>
      </option>
      <?php } ?>
    </select>

    <p >Year</p>

    <select class="drop-y" name="year_check" id="year_check">
    <?php
    $data_year=intval(date("Y",strtotime("-2 year")));
    ?>
      <?php for($i=0;$i<=2;$i++){ ?>
      <option class="drop-y-op" value="<?=$data_year+$i?>" <?=((isset($_POST['year_check']) && $_POST['year_check']==intval($data_year+$i)) || (!isset($_POST['year_check']) && date("Y")==intval($data_year+$i)))?" selected":""?> >
      <?=intval($data_year+$i)+543?>
      </option>
      <?php } ?>
    </select><br>

    <input class="sw-s" type="submit" name="showData" id="showData" value="Search" />
  </form>
   
  <br>
  <br>
 
<?php
 // ถ้าไม่มีการส่งเดือนและปีมา ให้ใช้เดือนและปีในขณะปัจจุบันนั้น เป้นตัวกำหนด
if(!isset($_POST['month_check']) && !isset($_POST['year_check'])){
    $date_data_check=date("Ym");// จัดรูปแบบปีและเดือนของวันปัจจุบันในรูปแบบ 0000-00-
    $num_month_day=date("t"); // หาจำนวนวันของเดืนอ
    $use_month_check = $date_data_check;    
    $start_date_check = $date_data_check."01";
    $end_date_check = $date_data_check.$num_month_day;
    //echo $use_month_check."<br>";
}else{ // ถ้ามีการส่งข้อมูล เดือนและปี มา ให้ใช้เดือนและปี ของค่าที่ส่งมาเป้นตำกำหนด
    $date_data_check=$_POST['year_check'].$_POST['month_check']; // จัดรูปแบบปีและเดืนอที่ส่งมาในรูปแบบ 0000-00-
    $num_month_day=date("t",strtotime($_POST['year_check'].$_POST['month_check'])); // หาจำนวนวันของเดืนอ
    $use_month_check = $date_data_check;        
    $start_date_check = $date_data_check."01";
    $end_date_check = $date_data_check.$num_month_day;
    //echo $use_month_check."<br>";

}
?>
 
 
</div>
</body>
</html>