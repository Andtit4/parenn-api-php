<?php
$bdd = new PDO("mysql:host=localhost;dbname=testdb", "root", "");

if (isset($_GET['id'])){
    $id = intval($_GET['id']);	
    $option = intval($_GET['option']);

    if ($option == 1){
        $req_sel_adherent = $bdd -> query("delete from adherent where id = '$id'");
        header("Location: ../adherents.php");
    }
    if ($option == 2){
        $req_sel_user = $bdd -> query("delete from user where id = '$id'");
        header("Location: ../index.php");
    }
    if ($option == 3){
        $req_del_product = $bdd -> query("delete from products where id_product = '$id'");
        header("Location: ../products.php");
    }

}

?>