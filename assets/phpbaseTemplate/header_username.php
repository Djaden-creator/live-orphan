<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="djaden,">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../css/maicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="../css/bootstrap.css">

    <link rel="stylesheet" href="../vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../vendor/animate/animate.css">

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
                     if(isset($_SESSION['name'])){
                        $sql="SELECT * FROM users WHERE name='".$_SESSION['name']."'";
                        $stmt = $pdo->query($sql);
                        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($child as $rows){
                        ?>
                            <a href=""><span class="mai-person text-primary"><?php echo $rows['name'];?></span></a>
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
                <a class="navbar-brand" href="../../../one/index.php"><span class="text-primary">Live</span>-Orphan</a>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="../pagesPhp/donate.php">Donate</a>
                    </li>
                </ul>

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
                            <a class="nav-link" href="../../../one/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="timeline.php">timeline</a>
                        </li>
                        <?php
                          if($rows['role']=='administrateur' ||$rows['role']=='moderateur'){
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="listofbabies.php">dash</a>
                        </li>
                        <?php
                          }
                        ?>
                        <li class="nav-item d-flex">
                            <i class="fas fa-user" style="position: relative;top:10px;left:5px;"></i>
                            <a class="nav-link" href="profil.php"><?php echo $rows['name'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="logout.php">Logout</a>
                        </li>
                        <?php
                        
                     }
                    }else{
                        ?>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="../pagesPhp/logout.php">Logout</a>
                        </li>
                        <?php
                     }
                }
                catch(PDOException){
                   echo"no connection to the data base";
                }
                    
                ?>

                    </ul>
                </div>
                <!-- .navbar-collapse -->
            </div>
            <!-- .container -->
        </nav>
    </header>