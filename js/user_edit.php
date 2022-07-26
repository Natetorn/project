<?php 
session_start();
//echo'<pre>';
//print_r($_SESSION);
//echo '<pre>';
include('condb.php');

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$userlevel = $_SESSION['userlevel'];

$sql ="SELECT *  FROM user WHERE user_id=user_id";
$result = mysqli_query($con,$sql) or die ("Error : $sql").
mysqli_error();
$row = mysqli_fetch_array($result);
extract($row);

$user_picture = $row ['user_picture'];
$username = $row ['username'];
//echo'<pre>';
//print_r($row);
//echo '<pre>';



?>
