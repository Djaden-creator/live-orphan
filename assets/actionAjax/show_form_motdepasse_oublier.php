<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['modifier'])){
                   ?>
<!-- here to show the modification  -->
<small class="error">mettez votre email et obtenez la chance de modifier votre mot de passe</small>
<div class="offthis">
    <div class="row">
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="email" class="form-control mailget" placeholder="Email">
        </div>
    </div>
    <button class="btn btn-primary mt-3 wow zoomIn modifyme">modifier</button>
</div>

<?php
               }
    }
 catch(PDOException){
echo"erreur data base";
 }