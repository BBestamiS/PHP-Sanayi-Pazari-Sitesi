<?php
    include_once 'header.php';
    session_start();
    require_once 'includes/db_functions.php';
    
?>
<?php
if(isset($_POST['detail'])){
    $_SESSION['productId']  = $_POST["product-id"];
    $_SESSION['categoryId'] = $_POST["category-id"];
    $_SESSION['productName'] = $_POST["product-name"];
    $_SESSION['offerCreateTime'] = $_POST["offer-create-time"];
    $_SESSION['offerFinishedTime'] = $_POST["offer-finished-time"];
    $_SESSION['productImage'] = $_POST["product-image"];
    $_SESSION['productDescription'] = $_POST["product-description"];
}
?>
<?php
    if(!isset($_SESSION['productId'])){
        header('location: ./index.php');
        exit();
    }
?>
    <section class="header-section">
        <article class="header-product-name-article">
            <h3 class="header-product-name"><?php echo  $_SESSION['productName'] ?></h3>
        </article>
        <article class="header-info-article">
            <div class="header-pic-div">
                <img class="header-product-img" src="<?php echo $_SESSION['productImage'] ?>" alt="product-pic">
            </div>
            <div class="product-info-line"></div>
            <div class="product-detail-info">
            <div class="header-product-info">
                <p class="product-description-header">
                Açıklama
                </p>
                <p class="header-product-description">
                    
                    <?php echo $_SESSION['productDescription'] ?>
                </p>
            </div>
            <div class="header-offer-div">
            <p class="product-description-header">
            Teklifin Başlangıç Tarihi
                </p>
                <p class="header-product-offerCreateTime">
                
                    <?php
                    $dizi = explode ("-", $_SESSION['offerCreateTime']);  
                    $dizi1 = explode (" ", $dizi[2]);
                    echo $dizi1[0] . ' ' . $dizi[1] . ' ' ;
                    echo $dizi[0];
                    ?>
                    <p class="product-description-header">
                    Teklifin Bitiş Tarihi
                </p>
                <p class="header-product-offerFinishedTime">
                    
                        <?php
                    $dizi = explode ("-", $_SESSION['offerFinishedTime']);  
                    $dizi1 = explode (" ", $dizi[2]);
                    echo $dizi1[0] . ' ' . $dizi[1] . ' ' ;
                    echo $dizi[0];
                    ?>
                </p>
            </div>
            <div class="header-offer">
            <?php
                            if (isset($_SESSION['userid']) && $_SESSION['admin'] === 0) {
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
                                            <?php
                                            if(isset($_GET['error']) && $_GET['error'] === "emptyoffer"){
                                                echo '<p class="error-p">Teklif Alanı Boş Kalamaz!</p>';
                                            } else if(isset($_GET['error']) && $_GET['error'] === "invalidoffer"){
                                                echo '<p class="error-p">Teklif Alanına Sadece Fiyat Girebilirsiniz!</p>';
                                            }
                                            ?>
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
                                <?php
                            }
                else if(!isset($_SESSION['userid'])){
                    ?>
                    <p class="offer-text">Teklif Vermek İçin Giriş Yapınız!</p>
                    <?php
                }
            ?>
            </div>
            </div>
        </article>
    </section>
    <?php
    if(isset($_SESSION['userid'])){ ?>
<section class="detail-product">
        <hr>
        <div class="detail-product-h1-div">
            <h1 class="detail-product-h1">
            Verilen Teklifler
            </h1>
        </div>
        <?php 
                foreach(getProductOffers($_SESSION['productId']) as $item) { ?>
                    <div class="detail-product-offers-div">
                        <p>Teklifin sahibi : <?php
                        echo getUser($item['userId'])->users_Name;
                        ?></p>
                        <p>Verilen Teklif : <?php echo $item['offerValue'] ?> TL</p>

                    </div>
                <?php } ?>
        <div class="detail-product-offers">

        </div>
    </section>
  <?php }
    ?>
    


<?php
    include_once 'footer.php';
?>
