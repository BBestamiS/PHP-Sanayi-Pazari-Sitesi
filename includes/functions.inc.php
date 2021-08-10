<?php

function emptyInputSignup($isim, $soyisim, $ePosta, $parola){
    
    if(empty($isim) || empty($soyisim)  || empty($ePosta)  || empty($parola)){
        return false;
    }else{
        return true;
    }
   
}
function emptyInputLogin($ePosta, $parola){
    
    if(empty($ePosta)  || empty($parola)){
        return false;
    }else{
        return true;
    }
   
}
function  invalidName($isim){
    if(!preg_match("/^[a-zA-ZıİöÖçÇşŞğĞüÜ\s]*$/", $isim)){
        return false;
    }else {
        return true;
    }
}
function  invalidSurName($soyisim){
    if(!preg_match("/^[a-zA-ZıİöÖçÇşŞğĞüÜ]*$/", $soyisim)){
        return false;
    }else {
        return true;
    }
}
function  invalidEmail($ePosta){
    if(!filter_var($ePosta,  FILTER_VALIDATE_EMAIL)){
        return false;
    }else {
        return true;
    }
}
function  emailExists($conn, $ePosta){
    $sql = "SELECT * FROM users WHERE users_Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $ePosta,);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else{
        return true;
    }
    mysqli_stmt_close($stmt);
}
function  createUser($conn, $isim, $soyisim, $ePosta, $parola){
    $sql = "INSERT INTO users (users_Name, users_SurName, users_Email, users_Password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($parola, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $isim, $soyisim, $ePosta, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=success");
    exit();
}

function loginUser($conn, $ePosta, $parola){
 $emailExists = emailExists($conn, $ePosta);

 if($emailExists === true){
     header("location: ../login.php?error=wronglogin");
     exit();
 }

 $pwdHashed = $emailExists["users_Password"];
 $checkPwd = password_verify($parola, $pwdHashed);

 if($checkPwd === false){
     header("location: ../login.php?error=wrongPwd");
     exit();
 }
 else if($checkPwd === true){
    session_start();
    $_SESSION["userid"] = $emailExists["users_Id"];
    $_SESSION["username"] = $emailExists["users_Name"];
    $_SESSION["admin"] = $emailExists["admin"];
    if($emailExists["admin"] !== 1){
        header("location: ../index.php");
    }
    else {
        header("location: ../admin.php");
    }
    exit();
 }
}