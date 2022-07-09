<?php
$bdd = new PDO("mysql:host=localhost;dbname=testdb", "root", "");

include("views/_navbar.html");

$req_sel_users = $bdd->query("SELECT * FROM user");

// $user_info = $req_sel_users->fetch();


require("views/index.html");


?>