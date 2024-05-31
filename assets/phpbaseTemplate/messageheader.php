<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="assets/css/maicons.css">
    <link rel="stylesheet" href="../css/maicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="../vendor/animate/animate.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="../css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <?php
                            session_start();
                    $dsn = 'mysql:host=localhost;dbname=orphelinat';
                    $username = 'root';
                    $password = getenv('');
                try{
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     if(isset($_SESSION['idUser'])){
                        $sql="SELECT * FROM users WHERE idUser=".$_SESSION['idUser']."";
                        $stmt = $pdo->query($sql);
                        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($child as $rows){
                                ?>
                            <a
                                href="profil.php?itsme=<?php echo md5($rows['idUser']);?>/<?php echo md5($_SESSION['name']);?>"><span
                                    class="mai-person text-primary"><?php echo $_SESSION['name'];?></span></a>
                            <span class="divider">|</span>
                            <a href=""><span class="mai-mail text-primary"><?php echo $rows['email']; ?></span></a>
                            <?php
                         }
                        }
                    }
                         catch(PDOException $e){
                              echo"no connection from the database";
                         }
                    ?>
                        </div>
                    </div>

                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="../../index.php"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .topbar -->
    </header>