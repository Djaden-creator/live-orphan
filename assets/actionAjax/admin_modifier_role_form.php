<?php
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['modifier'])){
           $idsession=$_POST['idsession'];
           $sql="SELECT * FROM users WHERE idUser=$idsession";
           $stmt = $pdo->query($sql);
           $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
           if($child){
               foreach($child as $rows){
                   ?>
<select name="sex" class="custom-select myrole">
    <option value="">choose role</option>
    <option value="administrateur">administrateur</option>
    <option value="moderateurs">moderateur</option>
    <option value="secretaire">secretaire</option>
    <option value="utilisateur">utilisateur</option>
</select>
<div class="d-flex">
    <button class="btn-success mt-1 changeroleupdate" value="<?php echo $idsession; ?>">Update role</button>
    <button class="btn-danger mt-1 ml-1 changeroleclose" value="<?php echo $idsession; ?>">close </button>
</div>



<?php
               }
           }else{
               echo"vous ne pouvez pas faire une demane pour le moment";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }
 catch(PDOException){
echo"erreur data base";
 }