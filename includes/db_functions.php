<?php

require_once 'dbh.inc.php';

require_once 'database/db_users.php';
require_once 'database/db_products.php';
require_once 'database/db_category.php';


$db = new DBController();

$products = new Products($db);

function getProducts($category){
    return $GLOBALS['products']->getProducts($category);
}

if(isset($_POST['category'])){
    header("location: ../index.php?category=" . $_POST['setCategory']);
}
$users = new DBUsers($db);
 function getName(){
     return $GLOBALS['users']->getUsers();
 }

 $category = new Category($db);

 function getCategory(){
    return $GLOBALS['category']->getCategory();
 }