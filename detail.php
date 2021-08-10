<?php
    include_once 'header.php';
?>
<?php
$productId = $_POST["product-id"];
$categoryId = $_POST["category-id"];
$productName = $_POST["product-name"];
$offerCreateTime = $_POST["offer-create-time"];
$offerFinishedTime = $_POST["offer-finished-time"];
$productImage = $_POST["product-image"];
$productDescription = $_POST["product-description"];
$productSubDescription = $_POST["product-sub-description"];
echo $productId;
echo "<br>";
echo $categoryId;
echo "<br>";
echo $productName;
echo "<br>";
echo $offerCreateTime;
echo "<br>";
echo $offerFinishedTime;
echo "<br>";
echo $productImage;
echo "<br>";
echo $productDescription;
echo "<br>";
echo $productSubDescription;

?>
<?php
    include_once 'footer.php';
?>
