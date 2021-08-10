<?php

class Products
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if($db->get_conn() === null){
            return null;
        }
        $this->db = $db;
    }

    public function getProducts($category){
        if($category === "all"){
            $sql = "SELECT * FROM products;";
            $result = mysqli_query($this->db->get_conn(), $sql);
            $resultCheck = mysqli_num_rows($result);
            $resultArray = array();
            if($resultCheck > 0 ){
                while($row = mysqli_fetch_assoc($result)){
                    $resultArray[] = $row;
                }
                return $resultArray;
            }
        }
        else{
            $sql = "SELECT * FROM products WHERE categoryId =" . $category .  ";";
            $result = mysqli_query($this->db->get_conn(), $sql);
            $resultCheck = mysqli_num_rows($result);
            $resultArray = array();
            if($resultCheck > 0 ){
                while($row = mysqli_fetch_assoc($result)){
                    $resultArray[] = $row;
                }
                return $resultArray;
            }
        }
    }
}
