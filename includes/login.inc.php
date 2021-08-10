<?php

if(isset($_POST["submit"])){
    $ePosta = $_POST["ePosta"];
    $parola = $_POST["parola"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $db = new DBController();


    if (emptyInputLogin($ePosta, $parola) !== true) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($ePosta) !== true) {
        header("location: ../login.php?error=invalidEmail");
        exit();
    }
    loginUser($db->get_conn(), $ePosta, $parola);
}else{
    header("location: ../login.php");
    exit();
}