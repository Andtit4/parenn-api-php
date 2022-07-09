<?php
$bdd = new PDO("mysql:host=localhost;dbname=testdb", "root", "");

include("views/_navbar.html");

$req_sel_adh = $bdd -> query("select * from products");

if (isset($_POST['add'])){
    if (!empty($_POST['name'] && $_POST['montant_product'] && $_FILES['img_product'])){
        $name = htmlspecialchars($_POST['name']);
        $montant_product = htmlspecialchars($_POST['montant_product']);
        $img_name = $_FILES['img_product']['name'];
        $tmp_name = $_FILES['img_product']['tmp_name'];
        move_uploaded_file($tmp_name, 'views/img/'.$img_name);

        $req_ins_product = $bdd -> query("insert into products (name_product, img_product, montant_product ) values ('$name', '$img_name', '$montant_product') ");
        header("Location: add.php");
    }
}

require('views/add.html');


?>