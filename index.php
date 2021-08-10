<?php
    include_once 'header.php';
    require_once 'includes/db_functions.php';
?>

    <section class="main-section">
        <div class="main-div row">
            <section class="products-category-section">
                <?php 
                foreach(getCategory() as $item) { ?>
                <div class="category-div">
                    <form action="includes/db_functions.php" method="POST">
                    <?php 
                        echo '<input type="hidden" name="setCategory" value="' . $item['id'] . '">';
                    ?>
                    <button type="submit" name="category" class="btn ">
                    <?php echo $item['category'] ?>
                    </button>
                </form>
                    </div>
                <?php } ?>

                <?php
                if (isset($_GET['category'])) {
                   echo '<a href="index.php" type="button" class="btn">Hepsini Göster</a>';
                }
                ?>
                
            </section>
            <section class="products-section">
            <div class="main-h1-div text-center  col-12">
                <h1 class="main-h1 ">Ana Sayfa</h1>
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
                                <input type="hidden" name="product-description" value="' . $item['productDescription'] . '">
                                <input type="hidden" name="product-sub-description" value="' . $item['productSubDescription'] . '">';
                                ?>
                                <button type="submit" class="products-template-detail-button btn btn-success">Detay</button>
                            </form>
                            <?php
                            if (isset($_SESSION['userid'])) {
                                echo ' <form action="detail.php" method="POST">
                                <div class="product-offer-input">
                                <input type="text" name="product-id" >
                                </div>
                                <button type="submit" class="products-template-detail-button btn btn-success">Teklif Ver</button>
                            </form>';
                            }
                            ?>
                           <p class="product-finished-time">
                                Teklifin Bitiş Tarihi
                                <?php
                                echo $item['offerFinishedTime'];
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
                                <input type="hidden" name="product-description" value="' . $item['productDescription'] . '">
                                <input type="hidden" name="product-sub-description" value="' . $item['productSubDescription'] . '">';
                                ?>
                                <button type="submit" class="products-template-detail-button btn btn-success">Detay</button>
                            </form>
                            <?php
                            if (isset($_SESSION['userid'])) {
                                echo ' <form action="detail.php" method="POST">
                                <div class="product-offer-input">
                                <input type="text" name="product-id" >
                                </div>
                                <button type="submit" class="products-template-detail-button btn btn-success">Teklif Ver</button>
                            </form>';
                            }
                            ?>
                            <p class="product-finished-time">
                                Teklifin Bitiş Tarihi
                                <?php
                                echo $item['offerFinishedTime'];
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

