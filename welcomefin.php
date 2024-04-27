<?php
  ob_start();
  include('php/server.php');  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link href="csssass/welcome.css" rel="stylesheet" />
    <title>land</title>
</head>

<body>

    <!-- Navbar -->
    <!-- Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container justify-content-between">
            <!-- Left elements -->
            <div class="d-flex">
                <!-- Brand -->
                <a class="navbar-brand me-1 mb- d-flex align-items-center" href="#">
                    <img src="assets/log.png" height="70" alt="" loading="lazy" style="margin-top: 10px;" />
                </a>

                <!-- Search form -->
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <ul class="navbar-nav flex-row d-none d-md-flex">
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                        <span>A PROPOS</span>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                        <span>A PROPOS</span>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                        <span>BLOG</span>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                       <span> <b><u><?php if (isset($_SESSION['email'] )) echo $_SESSION['email']; ?></u></b></span>
                    </a>
                </li>
            </ul>
            <!-- Center elements -->

            <!-- Right elements -->
            <ul class="navbar-nav flex-row">
            <?php             
                $me=$_SESSION['id'];
                $myname=$_SESSION['username']; 
                $myemail=$_SESSION['email'];

                $sql="SELECT *FROM utilisateurs where id='$me'";               
                $result=mysqli_query($conn,$sql) or die("error");
                if (mysqli_num_rows($result) >0) {
                while ($row=mysqli_fetch_assoc($result)) {
                $id=$row['id'];
                $ministere=$row['ministere']; 
                $email=$row['email']; 
                $username=$row['username'];  
                $prenom=$row['prenom'];
                $ministere=$row['ministere']; 
                $pictures=$row['pictures'];  
                $biographie=$row['biographie'];               
                
            ?>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="logout.php">
                        <span class="login">LOGOUT</span>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="">
                        <span class="signup"><?php if (isset($username )) echo $username; ?></span>
                    </a>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-chevron-down fa-lg"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item " href="#">SA PROPOS</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">BLOG</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">BUSNESS</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">FAQ</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">CONTACT</a>
                        </li>
                    </ul>
                </li>
                <?php
               }}
                ?>
            </ul>
            <!-- Right elements -->
        </div>
    </nav>
    <!-- Navbar -->
    <br><br><br><br><br>
    <div class="container">
       <?php             
        $me=$_SESSION['id'];
        $myname=$_SESSION['username']; 
        $myemail=$_SESSION['email'];

                $sql="SELECT *FROM utilisateurs where id='$me'";               
                $result=mysqli_query($conn,$sql) or die("error");
                if (mysqli_num_rows($result) >0) {
                while ($row=mysqli_fetch_assoc($result)) {
                $id=$row['id'];
                $ministere=$row['ministere']; 
                $email=$row['email']; 
                $username=$row['username'];  
                $prenom=$row['prenom'];
                $ministere=$row['ministere']; 
                $pictures=$row['pictures'];  
                $biographie=$row['biographie'];               
                 }
                }
            ?>
            <h4 class="theme"><b><u><?php if (isset($ministere)) echo $ministere; ?>&nbsp;&nbsp;<?php if (isset($username )) echo $username; ?></u></b>,Etes vous pret a promouvoir le nom de notre seigneur Jesus christ?</h4>
         
    </div> 
    <div class="container">
        <br>
        <div class="card w-100">
            <div class="card-body text-center" id="showbutton<?php echo $me;?>">
                    <?php
                      $queryshowbutton="SELECT * from `abonner` where followerid='$me'";
                      $r=mysqli_query($conn,$queryshowbutton) or die("error");                                                                                 
                      if (mysqli_num_rows($r)>5) {
                        ?>
                        <h5 class="card-title text-danger"><a href="logout.php"><button>go</button></a>
                        </h5>
                         <p class="card-text">
                           merci vous avez suivis plus  de 9 personnes.deconnectez vous puis reconnecteez vous a nouveau 
                          </p>
                          <?php
                          }else{
                            ?>
                            <h5 class="card-title text-danger">ATTENTION!!</h5>
                    <p class="card-text">
                    vous devez suivre au minimum 10 profiles  avant d utiliser la plateform,sans cela vous ne verez aucune postes!!! 
                     
                    </p>
                            <?php
                          }
                          ?>
            </div>
        </div>

        <br> 
        <div class="card w-100">
            <div class="text-center text-danger ">
            <b id="countdownfollower<?php echo $me;?>"> 
            <u>
                comptons ensemble (<?php 
                    $querycountdowfollow=mysqli_query($conn,"SELECT * from `abonner` where followerid='$me'");
		                  echo mysqli_num_rows($querycountdowfollow);	
                     ?>) 
            </u>
                   
            </b>    
            </div>
        </div>
       
        <h4 class="theme">nous vous proposons 4 meilleurs Predication de la semaine:</h4>
    
        <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php
                       $sqluser="SELECT *FROM utilisateurs";               
                       $resultuser=mysqli_query($conn,$sqluser) or die("error");
                       if (mysqli_num_rows($resultuser) >0) {
                       while ($rows=mysqli_fetch_assoc($resultuser)) {
                           $id=$rows['id'];
                           $prenom=$rows['prenom'];
                           $nom=$rows['nom'];
                           $sexe=$rows['sexe'];
                           $email=$rows['email'];
                           $religion=$rows['religion'];
                           $ministere=$rows['ministere'];
                           $pictures=$rows['pictures'];
                           $username=$rows['username'];

                           $queryabonner=mysqli_query($conn,"select * from `abonner` where userid='$id' and followerid='$me'");
                           if (mysqli_num_rows($queryabonner)<1 ){                           
                    ?>
            <div class="col-6 col-sm-3 col-md-3"  id="hideit<?php echo $id;?>">        
                <div class="card">
                    <img src="<?php if (isset($pictures)) echo $pictures; ?>" class="card-img-top three" alt="..." />
                    <div class="card-body">
                        <small class="theme">religio:<?php if (isset($religion)) echo $religion; ?></small>
                        <span class="card-text here">
                            <small><?php if (isset($ministere)) echo $ministere; ?>:<?php if (isset($username)) echo $username; ?></small>
                            <div class="tell">
                                <?php
                                      $queryabonner=mysqli_query($conn,"select * from `abonner` where userid='".$rows['id']."' and followerid='$me'");
                                      if (mysqli_num_rows($queryabonner)>0){
                                    ?>
                                    <input type="hidden" Name="me" id="me" value="<?php echo $me;?>">
                                    <?php             
                                        $me=$_SESSION['id'];
                                        $myname=$_SESSION['username']; 
                                        $myemail=$_SESSION['email'];

                                        $sql="SELECT *FROM utilisateurs where id='$me'";               
                                        $result=mysqli_query($conn,$sql) or die("error");
                                        if (mysqli_num_rows($result) >0) {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                        $id=$row['id'];
                                        $ministere=$row['ministere']; 
                                        $email=$row['email']; 
                                        $username=$row['username'];  
                                        $prenom=$row['prenom'];
                                        $ministere=$row['ministere']; 
                                        $pictures=$row['pictures'];  
                                        $biographie=$row['biographie'];               
                
                                    ?>
                                    <input type="hidden" Name="menamese" id="menamese" value="<?php if (isset($username )) echo $username; ?>">
                                    <?php
                                     } }
                                    ?>
                                       <button Value="<?php echo $rows['id'];?>" class="Desabonner">Desabonner</button>
                                    <?php
                                         }
                                         else{
                                    ?>
                                    <input type="hidden" Name="me" id="me" value="<?php echo $me;?>">
                                    <?php             
                                          $me=$_SESSION['id'];
                                          $myname=$_SESSION['username']; 
                                          $myemail=$_SESSION['email'];

                                          $sql="SELECT *FROM utilisateurs where id='$me'";               
                                          $result=mysqli_query($conn,$sql) or die("error");
                                          if (mysqli_num_rows($result) >0) {
                                          while ($row=mysqli_fetch_assoc($result)) {
                                          $id=$row['id'];
                                          $ministere=$row['ministere']; 
                                          $email=$row['email']; 
                                          $username=$row['username'];  
                                          $prenom=$row['prenom'];
                                          $ministere=$row['ministere']; 
                                          $pictures=$row['pictures'];  
                                          $biographie=$row['biographie'];               
                
                                    ?>
                                    <input type="hidden" Name="menamese" id="menamese" value="<?php if (isset($username )) echo $username; ?>">
                                    <?php
                                     } }
                                    ?>
                                       <button Value="<?php echo $rows['id'];?>" class="Abonner">Abonner</button>
                                    <?php
                                         }
                                ?>
                            </div>                          
                        </span>
                    </div>
                </div>
            </div>
            <?php
           }}}
            ?>
        </div>
        
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
          $(document).on('click', '.Abonner', function() {
            var abonnerid = $(this).val();
            var me = $("#me").val();
            var menamese = $("#menamese").val();
            var $this = $(this);
            $this.toggleClass('Abonner');
            if ($this.hasClass('Abonner')) {
                $this.text('Abonner');
            } else {
                $this.text('Desabonner');

                $this.addClass("Desabonner");
            }
            $.ajax({
                type: 'POST',
                url: 'php/server.php',
                data: {
                    abonnerid: abonnerid,
                    me:me,
                    menamese:menamese,
                    abonner: 1
                },

                success: function() {
                    showcontent(abonnerid);
                    unshowfollower(abonnerid);
                    gobutton(me);
                    showcountdownfollower(me);
                   
                }
            });
        });
        $(document).on('click', '.Desabonner', function() {
            var abonnerid = $(this).val();
            var me = $("#me").val();
            var menamese = $("#menamese").val();
            var $this = $(this);
            $this.toggleClass('Desabonner');
            if ($this.hasClass('Desabonner')) {
                $this.text('Desabonner');
            } else {
                $this.text('Abonner');
                $this.addClass("Abonner");
            }
            $.ajax({
                type: "POST",
                url: "php/server.php",
                data: {
                    abonnerid: abonnerid,
                    me:me,
                    menamese:menamese,
                    abonner: 1,
                },
                success: function() {
                    showcontent(abonnerid);
                    unshowfollower(abonnerid);
                    gobutton(me);
                    showcountdownfollower(me);
                }
            });
        });
    });
 
    //show contents
    function showcontent(abonnerid) {
        $.ajax({
            url: "php/showcontent",
            type: "POST",
            async: false,
            data: {
                abonnerid: abonnerid,
                showcontent: 1
            },
            success: function(response) {
                $('#hideit'+ abonnerid).hide();
            }
        });
        //show content end
    }
    //show sauvegarder number
    function unshowfollower(abonnerid) {
        $.ajax({
            url: "php/unshowuserfolloer.php",
            type: "POST",
            async: false,
            data: {
                abonnerid: abonnerid,
                unshowfollower: 1
            },
            success: function(response) {
                $('#showsave' + abonnerid).html(response);

            }
        });
        //show sauvegarder end
    }
   //show the go button
   function gobutton(me) {
        $.ajax({
            url: "php/showbutton.php",
            type: "POST",
            async: false,
            data: {
                me: me,
                gobutton: 1
            },
            success: function(response) {
                $('#showbutton'+me ).html(response);

            }
        });
       //show the go button
    }
    //show countdownfollower
    function showcountdownfollower(me) {
        $.ajax({
            url: "php/countdownfolo.php",
            type: "POST",
            async: false,
            data: {
                me: me,
                showcountdownfollower: 1
            },
            success: function(response) {
                $('#countdownfollower'+me).html(response);

            }
        });
        //show countdownfollower
    }
    </script>
</body>
</html>