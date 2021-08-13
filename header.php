<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sanayi</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo-icons.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    

    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon-design-system.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/main-style.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="navbar-div">
                <section class="logo-section">
                <img  class="logo-img" src="assets/img/logo.png" alt="logo">
            </section>
            <section class="login-signup-section">
                <div class="login-signup-div">
                    <?php
                    
                    if(isset($_SESSION["userid"]) && $_SESSION['admin'] === 0){
                        echo '<a href="index.php" type="button" class="index-link">Ana Sayfa</a>';
                        echo '<a href="includes/logout.inc.php" type="button" class="logout-link">Çıkış Yap</a>';
                    }
                    else if(isset($_SESSION["userid"]) && $_SESSION['admin'] === 1){
                        echo '<a href="admin.php" type="button" class="index-link">Admin</a>';
                        echo '<a href="includes/logout.inc.php" type="button" class="logout-link">Çıkış Yap</a>';
                    }
                    else{
                        echo '<a href="index.php" type="button" class="index-link">Ana Sayfa</a>';
                        echo '<a href="login.php" type="button" class="login-link">Giriş Yap</a>';
                        echo '<a href="signup.php" type="button" class="signup-link">Kayıt Ol</a>';
                    }
                    ?>
                    
                </div>
            </section>
            </div>
            
        </nav>
    </header>
    <main class="main">