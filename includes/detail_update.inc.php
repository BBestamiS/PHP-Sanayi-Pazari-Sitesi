<?php

if(isset($_POST['sumbit'])){
    $createT = $_POST['createT'];
    $finishedT = $_POST['finishedT'];
    $productid = $_POST['productId'];
    require_once 'functions.inc.php';
    require_once 'dbh.inc.php';
    $db = new DBController();
    $sql = "UPDATE products SET finishedOffer = 0, offerCreateTime = (?) , offerFinishedTime = (?) WHERE id = (?);";
    $stmt = mysqli_stmt_init($db->get_conn());
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $createT, $finishedT, $productid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if (emptyTime($createT, $finishedT) !== true) {
        header("location: ../admin.php?option=guncelle&error=emptyTime");
        exit();
    }
    header('location: ../admin.php?option=guncelle');
    exit();
}else{
    header('location: ../admin.php?option=guncelle');
    exit();
}



$dizi = explode ("-", getCtime()[0]);  
$dizi1 = explode (" ", $dizi[2]);
$dizi2 = explode ("-", $_SESSION['offerCreateTime']);  
$dizi3 = explode (" ", $dizi2[2]);
if($dizi2[0] <= $dizi[0]){
if($dizi2[1] <= $dizi[1]){
    if($dizi3[0] <= $dizi1[0]){?>
         <form action="includes/detail.inc.php" method="POST">
            <input type="hidden" value="detail" name="page">
            <input class="product-offer-input" type="text" name="offer" placeholder="Fiyat Giriniz">
            <input type="hidden" name="product-id" value="<?php echo $_SESSION['productId']?>">
            <button type="submit" name="offer-button" class="products-template-detail-button btn btn-success">Teklif Ver</button>
        </form>    
        <?php }
        else{
            echo "<p class='detail-offer-section-info''>Teklifinizi Başlangıç Ve Bitiş Tarihleri Arasında Verebilirsiniz!</p>";
        }
        }
        else{
            echo "<p class='detail-offer-section-info''>Teklifinizi Başlangıç Ve Bitiş Tarihleri Arasında Verebilirsiniz!</p>";
        }
    }
    else{
        echo "<p class='detail-offer-section-info''>Teklifinizi Başlangıç Ve Bitiş Tarihleri Arasında Verebilirsiniz!</p>";
    }
 ?> 