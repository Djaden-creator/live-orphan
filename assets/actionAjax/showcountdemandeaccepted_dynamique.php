<?php
//count record for visitor in the search bar of timeline page
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['action'])){

        $iddemande=$_POST['iddemande'];
        $usersessionid=$_POST['usersessionid'];
        
        $sql="SELECT COUNT(*) FROM adoption where iduser='$usersessionid'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        if($count){
          ?>
il vous reste que <strong> <?php echo $count; ?> </strong><i class="material-icons text-info mr-2"> demande(s) en
    total</i>
<?php 
                  }else{
                      ?>
en totalisté Vous avez <?php echo $count; ?> <i class="material-icons text-info mr-2"> demande(s) restante(s) </i>
<?php
                  }
                 ?>
<?php
 }
}
 catch(PDOException){
echo"erreur data base";
 }