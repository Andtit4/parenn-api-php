<?php
$bdd = new PDO("mysql:host=localhost;dbname=testdb", "root", "");

if (isset($_GET['id'])){
    $id = intval($_GET['id']);	
    $req_sel_product = $bdd -> query("delete from products where abb_by = '$id'");

    if ($req_sel_product == true){
        echo "<script>alert('Product deleted successfully')</script>"; 
        header("Location: ../index.php");
    }
    else{
        echo "<script>alert('An error occurred while deleting the product')</script>";
        header("Location: ../index.php");
    }
}

?>