<?php

class Offers{
    public $db = null;
    public function __construct(DBController $db)
    {
        if($db->get_conn() === null){
            return null;
        }
        $this->db = $db;
    }
    public function getOffers(){
        $sql = "SELECT * FROM offers ORDER BY productId ASC ;";
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
    public function getLowestOffers(){
        $sql = "SELECT * FROM lowestoffer;";
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
    public function getCtime(){
        $sql = "SELECT CURDATE();";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        $time = null;
        if($resultCheck > 0 ){
            $row = mysqli_fetch_row($result);
            $time = $row;
        }
        return $time;
    }
    public function deleteOffers($productid, $finishedTime){
        $sql = "SELECT CURDATE();";
        $result = mysqli_query($this->db->get_conn(), $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0 ){
        $row = mysqli_fetch_row($result);
        $dizi = explode ("-", $row[0]);  
            $dizi1 = explode (" ", $dizi[2]);
        $dizi2 = explode ("-", $finishedTime);  
            $dizi3 = explode (" ", $dizi2[2]);
        if($dizi2[0] < $dizi[0]){
            if($dizi2[1] < $dizi[1]){
                if($dizi3[0] < $dizi1[0]){
                    $sql = "UPDATE products SET finishedOffer = 1 WHERE id = (?);";
                    $stmt = mysqli_stmt_init($this->db->get_conn());
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $productid);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    $sql = "SELECT * FROM offers WHERE productId =" . $productid . " ORDER BY offerValue DESC ;";
                    $result = mysqli_query($this->db->get_conn(), $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        $offerUser = mysqli_fetch_object($result);
                        $sql = "SELECT * FROM products WHERE id =" . $productid . ";";
                        $result = mysqli_query($this->db->get_conn(), $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if($resultCheck > 0){
                            $offerProduct = mysqli_fetch_object($result);
                            $sql = "INSERT INTO lowestoffer (productName, productImage, userId, offerValue, offerCreateTime) VALUES (?, ?, ?, ?, ?);";
                            $stmt = mysqli_stmt_init($this->db->get_conn());
                            mysqli_stmt_prepare($stmt, $sql);
                            mysqli_stmt_bind_param($stmt, "ssiis", $offerProduct->productName, $offerProduct->productImage,$offerUser->userId, 
                            $offerUser->offerValue, $offerUser->offerCreateTime);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                            $sql = "DELETE FROM offers WHERE productId =" . $productid . ";";
                            $this->db->get_conn()->query($sql);
                        }
                       
                    }
                    
                }
            }
        }
        }
    }
}