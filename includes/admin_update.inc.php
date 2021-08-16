<?php

if(isset($_POST['sumbit'])){
    $createT = $_POST['createT'];
    $finishedT = $_POST['finishedT'];
    $productid = $_POST['productId'];
    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';
    $db = new DBController();
    
    if (emptyTime($createT, $finishedT) !== true) {
        header("location: ../admin.php?option=guncelle&error=emptyTime&id=".$productid);
        exit();
    }
    if (invalidTime($createT, $finishedT) !== true) {
        header("location: ../admin.php?option=guncelle&error=invalidTime&id=".$productid);
        exit();
    }
    $sql = "UPDATE products SET finishedOffer = 0, offerCreateTime = (?) , offerFinishedTime = (?) WHERE id = (?);";
    $stmt = mysqli_stmt_init($db->get_conn());
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $createT, $finishedT, $productid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../admin.php?option=guncelle');
    exit();
}else{
    header('location: ../admin.php?option=guncelle');
    exit();
}