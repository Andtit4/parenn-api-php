<?php
$bdd = new PDO("mysql:host=localhost;dbname=testdb", "root", "");

include("views/_navbar.html");

$req_sel_adh = $bdd -> query("select * from products");

require('views/product.html');


?>