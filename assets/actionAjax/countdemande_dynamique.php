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
        
        $sql="SELECT COUNT(*) FROM adoption WHERE idUser=$usersessionid  AND decision='encours' or decision='en avance'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        if($count){
           ?>
Vous avez <?php echo $count; ?><i class="material-icons text-info mr-2">demande(s) encours</i>
<?php
        }else{
            ?>
Vous avez <?php echo $count; ?><i class="material-icons text-info mr-2">demande(s) encours</i>
<?php
        }
       ?>
<?php
 }
}
 catch(PDOException){
echo"erreur data base";
 }