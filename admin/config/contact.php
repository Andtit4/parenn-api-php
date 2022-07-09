<?php
$bdd = new PDO("mysql:host=localhost;dbname=testdb", "root", "");

// include("../views/_navbar.html");

$req_sel_users = $bdd->query("SELECT * FROM user");

if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    $req_sel_adherent = $bdd->query("SELECT * FROM adherent where id = '$id'");
    $adh_info = $req_sel_adherent -> fetch();

    if (isset($_POST['send'])){
        $destinataire = "lirsitogo2021@gmail.com";
        $objet        = "Alice parle à Bob";
        $content      = "<b>Salut Bob !</b>";

        $headers  = "";
        $headers .= "From: noreply.com\n";
        $headers .= "MIME-version: 1.0\n";
        $headers .= "Content-type: text/html; charset=utf-8\n";

        $result = mail($destinataire, $objet, $content, $headers);

        if( !$result ){
            echo "L'envoi du mail a échoué";
        }

    }
}

// $user_info = $req_sel_users->fetch();


require("../views/contact.html");


?>