<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hello World!</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo-icons.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon-design-system.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/main-style.css?v=<?php echo time(); ?>">
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-dark bg-default">
            <section class="logo-section">
                <h4 class="logo-h1">Sanayi</h4>
            </section>
            <section class="login-signup-section">
                <div class="login-signup-div">
                    <?php
                    
                    if(isset($_SESSION["userid"])){
                        echo '<a href="index.php" type="button" class="index-link">Ana Sayfa</a>';
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
        </nav>
    </header>
    <main class="main">