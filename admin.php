<?php
include_once 'header.php';
require_once 'includes/db_functions.php';
?>

<?php
if(!isset($_GET['option'])){?>
    <article class="admin-panel-article">
    <div class="option-screen">
    <div class="option-screen1">
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
    <div class="option-screen2">
        <div class="first-option">
            <form method="GET">
            <input type="hidden" name="option" value="guncelle">
            <button type="submit" name="submit" class="second-option-button btn">Zamanı Geçen Ürünü Güncelle</button>
            </form>
        </div>
        <div class="second-option">
            <form method="GET">
            <input type="hidden" name="option" value="fiyat">
            <button type="submit" name="submit" class="second-option-button btn">En Düşük Fiyatı Veren Müşteri Listesi</button>
            </form>
        </div>
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
if($_GET['option'] === "guncelle"){?>
    <article class="admin-teklif-panel-article">
    <p class="admin-teklif-header-p">
                Aşağıdaki Ürünlerin Son Teklif Tarihi Bitmiştir. Yeniden Yayınlamak İstiyorsanız Tarihi Güncelleyin!
            </p>
    <?php 
    $tmp = 1;
                foreach(getFinishedProduct() as $item) { ?>
 <form action="includes/detail_update.inc.php" method="POST">
        <div class="admin-teklif-screen">
            
            <div class="admin-teklif-screen1">
                <div class="admin-no-and-pic">
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
                            echo $item['productImage'];
                            ?>" alt="product">
                    </div>
                </div>
           
                <div class="admin-teklif-urun-div">
                    <p class="admin-teklif-urun-p">
                        Ürün Adı:
                        <?php
                        echo $item['productName'];
                        ?>
                    </p>
                   
                </div>
                <div class="admin-new-time-and-submit">
                <div class="new-offer-time">
                    <div class="admin-teklif-tarihi-div">
                        <label for="time">Yeni Oluşturulma Tarihi:</label>
                        <input type="date" id="time" name="createT">
                    </div>
                    <div class="admin-teklif-tarihi-div">
                        <label for="time1">Yeni Bitiş Tarihi:</label>
                        <input type="date" id="time1" name="finishedT">
                        <input type="hidden" value="<?php echo $item['id']?>" name="productId">

                    </div>
                </div>
                
                <input type="submit" name="sumbit" class="btn">
                </div>
            </div>
                
        </div>
                </form>
        <?php } ?>
    </article>
<?php
}
?>
<?php
if($_GET['option'] === "fiyat"){?>
    <article class="admin-teklif-panel-article">
    <p class="admin-teklif-header-p">
                Teklif Tarihi Bitmiş Ürünlere Verilen En Düşük Fiyatlar!
            </p>
    <?php 
    $tmp = 1;
                foreach(getLowestOffers() as $item) { ?>
        <div class="admin-teklif-screen">
            
            <div class="admin-teklif-screen1">
            <div class="admin-no-and-pic">
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
                        echo $item['productImage'];
                        ?>" alt="product">
                </div>
                </div>
                <div class="admin-teklif-urun-div">
                    <p class="admin-teklif-urun-p">
                        Ürün Adı:
                        <?php
                        echo $item['productName'];
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
                    $dizi = explode ("-", $item['offerCreateTime']);  
                    $dizi1 = explode (" ", $dizi[2]);
                    echo $dizi1[0] . ' ' . $dizi[1] . ' ' ;
                    echo $dizi[0];
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