<?php
    include_once 'header.php';
    require_once 'includes/db_functions.php';
?>

    <section class="main-section">
        <section class="main-info-section">
            <div class="main-info-div">
                <p class="main-info-p-first">
                    <?php
                    if(!isset($_SESSION['userid']) || $_SESSION['admin'] === 0){
                        echo "Sanayi Ürünlerine <br> Teklif Verebileceğiniz,";
                    }else{
                        echo "Ürünlerin Detaylarını <br> Görebilirsin.";
                    }
                    ?>
                </p>
                <div class="main-info-line"></div>
                <p class="main-info-p-second">
                <?php
                    if(!isset($_SESSION['userid']) || $_SESSION['admin'] === 0){
                        echo "Farklı Bir Platform..";
                    }else{
                        echo "Hoşgeldin <br>" . $_SESSION['username'] . ",";
                        
                    }
                    ?>
                
                </p>
            </div>
            <div class="main-info-pic"></div>
        </section>
        <div class="main-div row">
            <section class="products-category-section">
                <h1 class="category-section-header">
                    Kategoriye Göre Sırala
</h1>
                <?php 
                foreach(getCategory() as $item) { ?>
                <div class="category-div">
                    <form action="includes/db_functions.php" method="POST">
                    <?php 
                        echo '<input type="hidden" name="setCategory" value="' . $item['id'] . '">';
                    ?>
                    <button type="submit" name="category" class="btn products-category-btn">
                    <?php echo $item['category'] ?>
                    </button>
                </form>
                    </div>
                <?php } ?>

                <?php
                if (isset($_GET['category'])) {
                   echo '<a href="index.php" type="button" class="btn products-category-btn all-product-btn">Hepsini Göster</a>';
                }
                ?>
                
            </section>
            <section class="products-section">
            <div class="main-h1-div text-center  col-12">
                <h1 class="main-h1 ">Ürünler</h1>
            </div>
            <?php 
            if(isset($_GET['category'])){
                foreach(getProducts($_GET['category']) as $item) { ?>
                    <div class="products-template">
                        <div class="products-template-div">
                            <h3 class="products-template-h3">
                                <?php
                                echo $item['productName']
                                ?>
                            </h3>
                            <img src="<?php echo $item['productImage'] ?>" alt="toyota" class="products-template-img">
                            <form action="detail.php" method="POST">
                                <?php 
                                echo '<input type="hidden" name="product-id" value="' . $item['id'] . '">
                                <input type="hidden" name="category-id" value="' . $item['categoryId'] . '">
                                <input type="hidden" name="product-name" value="' . $item['productName'] . '">
                                <input type="hidden" name="offer-create-time" value="' . $item['offerCreateTime'] . '">
                                <input type="hidden" name="offer-finished-time" value="' . $item['offerFinishedTime'] . '">
                                <input type="hidden" name="product-image" value="' . $item['productImage'] . '">
                                <input type="hidden" name="product-description" value="' . $item['productDescription'] . '">';
                                ?>
                                <button type="submit" name="detail" class="products-template-detail-button btn btn-success">Detay</button>
                            </form>
                            <?php
                            if (isset($_SESSION['userid']) && $_SESSION['admin'] === 0) {
                                 ?> 
                                <form action="includes/detail.inc.php" method="POST">
                                <input type="hidden" name="page" value="index" >
                                <input class="product-offer-input" type="text" name="offer" placeholder="...">
                                <input type="hidden" name="product-id" value="<?php echo $item['id']?>">
                                <button type="submit" name="offer-button" class="products-template-detail-button btn btn-success">Teklif Ver</button>
                            </form> <?php ;
                            }
                            ?>
                          <p class="header-product-offerFinishedTime">
                    Teklifin Bitiş Tarihi : 
                        <?php
                    $dizi = explode ("-", $item['offerFinishedTime']);  
                    $dizi1 = explode (" ", $dizi[2]);
                    echo $dizi1[0] . ' ' . $dizi[1] . ' ' ;
                    echo $dizi[0];
                    ?>
                </p>
                        </div>
                    </div> <?php } 
            }
            else{
                foreach(getProducts("all") as $item) { ?>
                    <div class="products-template">
                        <div class="products-template-div">
                            <h3 class="products-template-h3">
                                <?php
                                echo $item['productName']
                                ?>
                            </h3>
                            <img src="<?php echo $item['productImage'] ?>" alt="toyota" class="products-template-img">
                            <form action="detail.php" method="POST">
                            <?php 
                                echo '<input type="hidden" name="product-id" value="' . $item['id'] . '">
                                <input type="hidden" name="category-id" value="' . $item['categoryId'] . '">
                                <input type="hidden" name="product-name" value="' . $item['productName'] . '">
                                <input type="hidden" name="offer-create-time" value="' . $item['offerCreateTime'] . '">
                                <input type="hidden" name="offer-finished-time" value="' . $item['offerFinishedTime'] . '">
                                <input type="hidden" name="product-image" value="' . $item['productImage'] . '">
                                <input type="hidden" name="product-description" value="' . $item['productDescription'] . '">';
                                ?>
                                <button type="submit" name="detail" class="products-template-detail-button btn btn-success">Detay</button>
                            </form>
                            <?php
                            if (isset($_SESSION['userid']) && $_SESSION['admin'] === 0) {
                                 ?> 
                                <form class="product-offer-form" action="includes/detail.inc.php" method="POST">
                                <input type="hidden" name="page" value="index" >
                                <input class="product-offer-input" type="text" name="offer" placeholder="...">
                                <input type="hidden" name="product-id" value="<?php echo $item['id']?>">
                                <button type="submit" name="offer-button" class="products-template-detail-button btn btn-success">Teklif Ver</button>
                            </form> <?php ;
                            }
                            ?>
                            <p class="header-product-offerFinishedTime">
                    Teklifin Bitiş Tarihi : 
                        <?php
                    $dizi = explode ("-", $item['offerFinishedTime']);  
                    $dizi1 = explode (" ", $dizi[2]);
                    echo $dizi1[0] . ' ' . $dizi[1] . ' ' ;
                    echo $dizi[0];
                    ?>
                </p>

                        </div>
                    </div> <?php } 
            }
               ?>
            </section>
            
        </div>
    </section>

<?php
    include_once 'footer.php';
?>

