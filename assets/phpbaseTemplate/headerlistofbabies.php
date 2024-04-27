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
                            <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
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
                <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

                <form action="#">
                    <div class="input-group input-navbar">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                            aria-describedby="icon-addon1">
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
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
                        <li class="nav-item active">
                            <a class="nav-link"
                                href="../../../one/index.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="timeline.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">timeline</a>
                        </li>
                        <?php
                          if($rows['idUser']==1){
                            ?>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="listofbabies.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>">dash</a>
                        </li>
                        <?php
                          }
                        ?>

                        <li class="nav-item d-flex">
                            <i class="fas fa-user" style="position: relative;top:10px;left:5px;"></i>
                            <a class="nav-link"
                                href="profil.php?itsme=<?php echo $rows['name'];?>/<?php echo md5($rows['name']);?>"><?php echo $rows['name'];?></a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="logout.php">Logout</a>
                        </li>
                        <?php
                        
                     }
                    }else{
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../../../one/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctors.html">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="login.php">Login</a>
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