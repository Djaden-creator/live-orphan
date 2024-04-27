<div class="page-section pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 lg-6 py-3 wow fadeInUp">
                <?php
                require_once'../functions/userClass.php';
                $userclass= new User();
                $userclass->chooseUsernameone();
                $userclass->chooseUsernametwo();
                $userclass->chooseUsernamethree();
                $dsn = 'mysql:host=localhost;dbname=orphelinat';
                $username = 'root';
                $password = getenv('');
               
                try{
                    $pdo = new PDO($dsn, $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  if(isset($_SESSION['name'])){

                    $query ="SELECT * FROM users WHERE name='".$_SESSION['name']."'";
                    $stmt = $pdo->query($query);
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($users){
                    foreach($users as $rows){
                        ?>
                <h1>Bienvenu(e),<?php  echo $_SESSION['name'];?></h1>
                <span style="font-size:17px;"><b>Choisissez votre Username</b></span>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php  echo $rows['idUser'];?>">
                    <input type="hidden" name="one" value="User<?php  echo $rows['idUser'];?>">
                    <input type="hidden" name="two"
                        value="Compteuser<?php  echo $rows['idUser'];?><?php  echo $rows['idUser'];?>user<?php  echo $rows['idUser'];?>">
                    <input type="hidden" name="three"
                        value="User<?php  echo $rows['idUser'];?><?php  echo $rows['idUser'];?><?php  echo $rows['idUser'];?>">
                    <button class="btn btn-info" type="submit"
                        name="sendone">User<?php  echo $rows['idUser'];?></button>
                    <button class="btn btn-info" type="submit"
                        name="sendtwo">Compteuser<?php  echo $rows['idUser'];?><?php  echo $rows['idUser'];?>user<?php  echo $rows['idUser'];?></button>
                    <button class="btn btn-info" type="submit"
                        name="sendthree">User<?php  echo $rows['idUser'];?><?php  echo $rows['idUser'];?><?php  echo $rows['idUser'];?></button>
                </form>
                <form action="" method="post">
                    <div class="d-flex" style="column-gap:5px;padding:10px;">
                        <input type="hidden" name="four" value="<?php  echo $rows['idUser'];?>">
                        <input type="text" name="myusername" placeholder="custom username">
                        <button type="submit" name="customname">valider</button>
                    </div>
                </form>
                <div style="padding:10px;">
                    <span><?php $userclass->customUsername();?></span>
                </div>
                <?php
                    }
                  }
                }
                }catch(PDOException $e){
                    echo"error",$e->getMessage();
                }
                   
                ?>

            </div>
        </div>
    </div>
</div>
<!-- .banner-home -->