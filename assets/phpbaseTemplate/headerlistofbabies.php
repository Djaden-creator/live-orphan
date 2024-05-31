<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="../css/tableBabies.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/maicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="../css/bootstrap.css">

    <link rel="stylesheet" href="../vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../vendor/animate/animate.css">

    <link rel="stylesheet" href="../css/theme.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
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
                                href="../pagesPhp/profil.php?itsme=<?php echo md5($rows['idUser']);?>/<?php echo md5($_SESSION['name']);?>"><span
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
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
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

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <?php
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
                               if($rows['idUser']==1){
                                ?>
                <a class="navbar-brand"
                    href="../../../one/index.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">Live</span>-Orphan</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="../pagesPhp/allmessage.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">
                            <?php
                                require_once'../functions/messageClass.php';
                                $clmessage= new message();
                                $clmessage->countMess();
                                ?></a>
                    </li>
                </ul>
                <?php
                               }else{
                                ?>
                <a class="navbar-brand"
                    href="../../../one/index.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">Live</span>-Orphan</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="https://donate.stripe.com/test_aEU6oR1ah143fHa6oo">Donate</a>
                    </li>
                </ul>

                <?php
                               }
                            }
                        }
                        } catch(PDOException $e){
                            echo"no connection from the database";
                       }
                               
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <?php
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
                        <li class="nav-item active">
                            <a class="nav-link"
                                href="../../../one/index.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="../pagesPhp/timeline.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">SHOP</a>
                        </li>
                        <?php
                          if($rows['idUser']==1){
                            ?>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="../pagesPhp/listofbabies.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">DASHBOAD</a>
                        </li>
                        <?php
                          }else{
                            ?>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="../pagesPhp/messageUser_space.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">
                                <span class="mai-chatbubble"
                                    style="background-color:brown;padding:5px 5px;border-radius: 15px;font-size:12px;color:white;">
                                    <?php
                                require_once'../functions/messageClass.php';
                                $clmessage= new message();
                                $clmessage->countMessforUser();
                                ?>
                                </span></a>
                        </li>
                        <?php
                          }
                        ?>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-primary ml-lg-3 dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ACTION-MENU
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="../pagesPhp/logout.php"><span
                                                class="mai-log-out"></span>Logout</a></li>
                                    <li><a class="dropdown-item"
                                            href="../pagesPhp/contact.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>"><span
                                                class="mai-chatbox"></span> Contact-us</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="../pagesPhp/profil.php?itsme=<?php echo md5($rows['idUser']);?>/<?php echo md5($_SESSION['name']);?>"><span
                                                class="mai-person"></span> My Space</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="../pagesPhp/logoutIndex.php"><span
                                                class="mai-log-out"></span>Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                            
                         }
                        }
                        else{
                            ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html/about.html">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html/blog.html">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="html/contact.html">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="../pagesPhp/login.php">SIGN UP</a>
                        </li>
                        <?php
                         }}
                         catch(PDOException $e){
                              echo"no connection from the database";
                         }
                    ?>

                    </ul>
                </div>
                <!-- .navbar-collapse -->
            </div>
            <!-- .container -->
        </nav>
    </header>