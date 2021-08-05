<?php

if(isset($_POST["submit"])){
    $ePosta = $_POST["ePosta"];
    $parola = $_POST["parola"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($ePosta, $parola) !== true) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($ePosta) !== true) {
        header("location: ../login.php?error=invalidEmail");
        exit();
    }
    loginUser($conn, $ePosta, $parola);
}else{
    header("location: ../login.php");
    exit();
}