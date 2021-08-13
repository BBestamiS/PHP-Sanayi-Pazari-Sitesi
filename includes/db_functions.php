<?php

require_once 'dbh.inc.php';

require_once 'database/db_users.php';
require_once 'database/db_products.php';
require_once 'database/db_category.php';
require_once 'database/db_offers.php';


$db = new DBController();

$products = new Products($db);
function getProductOffers($productId){
    return $GLOBALS['products']->getOffers($productId);
}

function getProducts($category){
    return $GLOBALS['products']->getProducts($category);
}
function getProduct($productId){
    return $GLOBALS['products']->getProduct($productId);
}

if(isset($_POST['category'])){
    header("location: ../index.php?category=" . $_POST['setCategory']);
}
$users = new DBUsers($db);
 function getName(){
     return $GLOBALS['users']->getUsers();
 }
 function getUser($userId){    
     return $GLOBALS['users']->getUser($userId);
 }

 $category = new Category($db);

 function getCategory(){
    return $GLOBALS['category']->getCategory();
 }

 $offers = new Offers($db);

 function getOffers(){
     return $GLOBALS['offers']->getOffers();
 }