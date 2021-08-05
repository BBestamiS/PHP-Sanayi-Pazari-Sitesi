<?php
    include_once 'header.php';
    session_start();
?>
<?php
if(isset($_SESSION["userid"])){
    header("location: ./index.php");
    exit();
}else{
echo '
        <section class="login-section justify-content-center d-flex">
            <div class="login-div">
                <form action="includes/signup.inc.php" method="post">
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Adınız.." name="isim">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Soyadınız.." name="soyisim">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="E-Posta Adresi.." name="ePosta">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Parola.." name="parola">
                            </div>
                        </div>
                        <div class="form-button d-flex justify-content-center col-9">
                            <button type="submit" class="btn btn-success" name="submit">Kayıt Ol</button>
                        </div>';
                        
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                             echo "<p>Tüm Alanları Eksiksiz Doldurun!</p>";
                            }
                            else if ($_GET["error"] == "invalidName") {
                                echo "<p>Geçerli Bir İsim Giriniz!</p>";
                            }
                            else if ($_GET["error"] == "invalidSurName") {
                                echo "<p>Geçerli Bir Soyad Giriniz</p>";
                            }
                            else if ($_GET["error"] == "invalidEmail") {
                                echo "<p>Geçerli E-Mail Giriniz!</p>";
                            }
                            else if ($_GET["error"] == "epostataken") {
                                echo "<p>Kaydınız Bulunmakta!</p>";
                            }
                            else if ($_GET["error"] == "success") {
                                echo "<p>Kaydınız Başarıyla Alındı.</p>";
                            }
                        }
                        
                   echo '
                    </div>

                </form>
            </div>
        </section>';
                    }
?>

<?php
include_once 'footer.php'
?>