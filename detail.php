<?php
    include_once 'header.php';
    session_start();
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

    <section class="header-section">
        <article class="header-product-name-article">
            <h3 class="header-product-name"><?php echo  $_SESSION['productName'] ?></h3>
        </article>
        <article class="header-info-article">
            <div class="header-pic-div">
                <img class="header-product-img" src="<?php echo $_SESSION['productImage'] ?>" alt="product-pic">
            </div>
            <div class="header-product-info">
                <p class="header-product-description">
                    Açıklama:
                    <?php echo $_SESSION['productDescription'] ?>
                </p>
            </div>
            <div class="header-offer-div">
                <p class="header-product-offerCreateTime">
                Teklifin Başlangıç Tarihi : 
                    <?php
                    $dizi = explode ("-", $_SESSION['offerCreateTime']);  
                    $dizi1 = explode (" ", $dizi[2]);
                    echo $dizi1[0] . ' ' . $dizi[1] . ' ' ;
                    echo $dizi[0];
                    ?>
                <p class="header-product-offerFinishedTime">
                    Teklifin Bitiş Tarihi : 
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
                if (isset($_SESSION['userid'])) {
                    ?> 
                    <form action="includes/detail.inc.php" method="POST">
                    <input type="hidden" value="detail" name="page">
                    <div class="product-offer-input">
                        <input type="text" name="offer">
                    </div>
                    <input type="hidden" name="product-id" value="<?php echo $_SESSION['productId']?>">
                    <button type="submit" name="offer-button" class="products-template-detail-button btn btn-success">Teklif Ver</button>
                </form> <?php ;
                }
                else{
                    ?>
                    <p>Teklif Vermek İçin Giriş Yapınız!</p>
                    <?php
                }
            ?>
            </div>
        </article>
    </section>
    <section class="detail-product">
        <hr>
        <div class="detail-product-h1-div">
            <h1 class="detail-product-h1">
            Verilen Teklifler
            </h1>
        </div>
        <div class="detail-product-offers">

        </div>
    </section>


<?php
    include_once 'footer.php';
?>
