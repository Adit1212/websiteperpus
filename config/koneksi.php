<?php
include 'function.php';
date_default_timezone_set('Asia/Jakarta');

$dbhost ='localhost';
$dbuser ='root';
$dbpass ='';
$dbname ='new_aditperpus';
$db_dsn = "mysql:dbname=$dbname;host=$dbhost";
try {
  $db = new PDO($db_dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
  echo 'Connection failed: '.$e->getMessage();
}
$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$base_url='http://localhost/aditperpus/';
$setting= mysqli_query($con,"SELECT * FROM setting "); $setapp= mysqli_fetch_array($setting);
?>
