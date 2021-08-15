<?php
include_once 'header.php';
require_once 'includes/db_functions.php';
?>

<?php
if(!isset($_GET['option'])){?>
    <article class="admin-panel-article">
    <div class="option-screen">
        <div class="first-option">
            <form method="GET">
            <input type="hidden" name="option" value="urun">
            <button type="submit" name="submit" class="first-option-button btn">Ürünleri Görüntüle</button>
            </form>
        </div>
        <div class="second-option">
            <form method="GET">
            <input type="hidden" name="option" value="teklif">
            <button type="submit" name="submit" class="second-option-button btn">Tüm Teklifleri Görüntüle</button>
            </form>
        </div>
    </div>
</article>
<?php
}
?>
<?php
if($_GET['option'] === "urun"){
    header('location: ./index.php');
    exit();
}
?>
<?php
if($_GET['option'] === "teklif"){?>
    <article class="admin-teklif-panel-article">
    <p class="admin-teklif-header-p">
                Verilmiş Tüm Teklifler Aşağıda Listelenmiştir!
            </p>
    <?php 
    $tmp = 1;
                foreach(getOffers() as $item) { ?>
        <div class="admin-teklif-screen">
            
            <div class="admin-teklif-screen1">
            <div class="admin-teklif-no-div">
                    <p class="admin-teklif-no-p">
                        <?php
                        echo $tmp;
                        $tmp++;
                        ?>
                    </p>
                   
                </div>
            <div class="admin-teklif-resim-div">
                    <img class="admin-teklif-resim-img" src="<?php
                        echo getProduct($item['productId'])->productImage;
                        ?>" alt="product">
                </div>
                <div class="admin-teklif-urun-div">
                    <p class="admin-teklif-urun-p">
                        Ürün Adı:
                        <?php
                        echo getProduct($item['productId'])->productName;
                        ?>
                    </p>
                   
                </div>
                <div class="admin-teklif-kullanici-div">
                    <p class="admin-teklif-kullanici-p">
                        Teklif Sahibi:
                        <?php
                        echo getUser($item['userId'])->users_Name;
                        ?>
                    </p>
                </div>
                <div class="admin-teklif-deger-div">
                    <p class="admin-teklif-deger-p">
                        Teklif Değeri:
                        <?php
                        echo $item['offerValue'];
                        ?>
                    </p>
                </div>
                <div class="admin-teklif-tarihi-div">
                    <p class="admin-teklif-tarihi-p">
                        Teklif Tarihi:
                        <?php
                        echo $item['offerCreateTime'];
                        ?>
                    </p>
                </div>
               
            </div>
                
        </div>
        <?php } ?>
    </article>
<?php
}
?>

<?php
include_once 'footer.php';
?>