<?php
// ปิดการแสดง error
error_reporting(0);
?>
<?php
	session_start();

	include('hder.php');

   
?>
   
<?php
//print('<pre>');
//print_r($_POST);
//print('</pre>');
$total = $_POST['total'].'00';
//echo $total;

//exit();


require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2015-11-17');
// define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
// define('OMISE_SECRET_KEY', 'SECRET_KEY');
define('OMISE_PUBLIC_KEY', 'pkey_test_5r0vtf6wetczo3yh65e');
define('OMISE_SECRET_KEY', 'skey_test_5r0vtf6wpuqjchf994c');

$charge = OmiseCharge::create(array(
  'amount' => $total,
  'currency' => 'thb',
  'card' => $_POST["omiseToken"]
));

$status = ($charge['status']);

//print('<pre>');
//print_r($charge);
//print('</pre>');

if ($status == 'successful'){
  //success
  echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

  echo '<script>
  setTimeout(function() {
   swal({
       title: "ชำระเงินสำเร็จ",
       text: "",
       type: "success"
   }, function() {
       window.location = "saveorder.php"; //หน้าที่ต้องการให้กระโดดไป
   });
}, 1000);
</script>';
}else{
  //error

}
?>
 <form name="saveorder" method="POST" action="saveorder.php">
<input type="hidden" name="user_id" value="<?php echo $user_id;?>">