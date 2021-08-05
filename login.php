<?php
    include_once 'header.php';
    session_start();
?>
<?php
if(isset($_SESSION["userid"])){
    header('location: ./index.php');
    exit();
}else{
    echo '<section class="login-section justify-content-center d-flex">
    <div class="login-div">
        <form action="includes/login.inc.php" method="post">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="E-Posta Adresi" name="ePosta">
                    </div>
                    
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleFormControlInput1"
                            placeholder="Parola" name="parola">
                    </div>
                </div>
                <div class="form-button d-flex justify-content-center col-12">
                    <button type="submit" class="btn btn-success" name="submit">Giriş Yap</button>
                </div>';
                
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "wronglogin"){
                            echo "<p>Kullanıcı Kaydı Bulunmamakta!</p>";
                        }
                        else if ($_GET["error"] == "emptyinput") {
                            echo "<p>Boş Alanları Doldurunuz!</p>";
                        }
                        else if ($_GET["error"] == "wrongPwd") {
                            echo "<p>Hatalı Şifre!</p>";
                        }
                        else if ($_GET["error"] == "invalidEmail") {
                            echo "<p>Geçerli Bir E-posta Adresi Giriniz!</p>";
                        }
                    }
                
           echo ' </div>

        </form>
    </div>
</section> ';



}

?>
        
<?php
include_once 'footer.php'
?>