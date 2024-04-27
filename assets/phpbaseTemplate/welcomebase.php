<div class="page-section pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 lg-6 py-3 wow fadeInUp">
                <?php
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
                <h1>Bienvenu(e) sur notre plateforme,<?php  echo $_SESSION['name'];?></h1>
                <h5>Desormais votre username est : <u><?php  echo $rows['username'];?></u></h5>
                <span style="font-size:17px;">
                    <b><a href="logout.php">Deconnetez-vous</a> puis reconnecter en utilisant votre email et password
                        pour bien utiliser cette
                        plateforme
                    </b></span>
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