<?php
 session_start();
?>
<?php
if(isset($_POST['offer-button'])){
    $teklif = $_POST['offer'];
    $productId = $_POST['product-id'];
    $page = $_POST['page'];
    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';
    $db = new DBController();
    if (emptyOffer($teklif) !== true && $page == "index") {
        header("location: ../index.php?error=emptyoffer");
        exit();
    }else if(emptyOffer($teklif) !== true && $page == "detail"){
    
        header("location: ../detail.php?error=emptyoffer");
        exit();
    }
    if (invalidOffer($teklif) !== true && $page == "index") {
        header("location: ../index.php?error=invalidoffer");
        exit();
    }
    else if(invalidOffer($teklif) !== true && $page == "detail"){
        header("location: ../detail.php?error=invalidoffer");
        exit();
    }
    if ($page == "index") {
        createOffer($teklif,$productId,$_SESSION['userid'],$db->get_conn(),"index");
    }
    else if($page == "detail"){
        createOffer($teklif,$productId,$_SESSION['userid'],$db->get_conn(),"detail");
    }
    
    
}else{
    header('location: ../index.php');
    exit();
}