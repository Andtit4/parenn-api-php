<?php
$data = json_decode(file_get_contents("php://input"));
$request = $data->request;
if($request == 1){
    $username = $data->username;
    $password = $data->password;    
    if($username=='test'&&$password=='test'){    
        $response[] = array('status'=>1);
    }else{    
      $response[] = array('status'=>0);
    }
    echo json_encode($response);
    exit;
}
    
?>