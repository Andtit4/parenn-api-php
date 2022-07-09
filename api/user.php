<?php
header('Access-Control-Allow-Origin: *');
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "testdb"; 
$id = '';

$con = mysqli_connect($host, $user, $password,$dbname);

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);

if (isset($_GET['options'])){
  $email = htmlspecialchars($_POST['email_connect']);
  $pass = htmlspecialchars($_POST['password_connect']);
  $option = htmlspecialchars($_GET['options']);

  if ($option == 'connect'){
    $sql = "SELECT * FROM user WHERE email = '$email' AND pass= '$pass'";
    $result = $db->query($sql);

  }
  
  if ($option == 'productImage'){
    $sql = "SELECT img_product FROM products";
    $result = $db->query($sql);
  }
}

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


switch ($method) {
    case 'GET':
      $id = $_GET['id'];
      $sql = "select * from user".($id?" where id=$id":''); 
      $result = $con->query($sql);
      break;

    case 'POST':
      $name = $_POST["name"];
      $email = $_POST["email"];
      $pass = $_POST["pass"];

      $sql = "insert into user (name, email, pass) values ('$name', '$email', '$pass')";
    
      break;
}

// run SQL statement
$result = mysqli_query($con,$sql);

// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error($con));
}

if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
  } elseif ($method == 'POST') {
    $email = $_POST["email"];
    $sql_catch = "select * from user where email = '$email'";
    $result_sql_catch = $con -> query($sql_catch);
    $nb_user = $result_sql_catch -> rowCount();
    if ($nb_user == 0) {
        $result = $con ->query($sql);
    } 
    else {
      $error = "Adresse déjà utilisée";
      echo json_decode($error);
    }
    echo json_encode($result);
  } else {
    echo mysqli_affected_rows($con);
  }

$con->close();