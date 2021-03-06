<?php


if (isset($_POST["submit"])) {
    $isim = $_POST["isim"];
    $soyisim = $_POST["soyisim"];
    $ePosta = $_POST["ePosta"];
    $parola = $_POST["parola"];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $db = new DBController();

    if (emptyInputSignup($isim, $soyisim, $ePosta, $parola) !== true) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidName($isim) !== true) {
        header("location: ../signup.php?error=invalidName");
        exit();
    }
    if (invalidSurName($soyisim) !== true) {
        header("location: ../signup.php?error=invalidSurName");
        exit();
    }
    if (invalidEmail($ePosta) !== true) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (emailExists($db->get_conn(), $ePosta) !== true){
        header("location: ../signup.php?error=epostataken");
        exit();
    }
    createUser($db->get_conn(), $isim, $soyisim, $ePosta, $parola);
}