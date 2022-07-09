<?php
header('Access-Control-Allow-Origin: *');
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "testdb"; 
$id = '';

$con = mysqli_connect($host, $user, $password,$dbname);

//$input = json_decode(file_get_contents('php://input'),true);
$sql = "SELECT img_product FROM products";
$result = $con->query($sql);
echo json_encode($result);



?>